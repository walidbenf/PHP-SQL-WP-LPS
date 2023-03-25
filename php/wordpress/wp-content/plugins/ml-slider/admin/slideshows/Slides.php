<?php

if (!defined('ABSPATH')) die('No direct access.');

/** 
 * Class to handle individual slides
 */
class MetaSlider_Slides {
	
	/**
	 * The id of the slideshow 
	 * 
	 * @var string
	 */
    protected $slideshow_id;

	/**
	 * Theme instance
	 * 
	 * @var object
	 * @see get_instance()
	 */
	protected static $instance = null;

	/**
	 * Constructor
	 */
	public function __construct() {}

	/**
	 * Used to access the instance
	 */
	public static function get_instance() {
		if (null === self::$instance) self::$instance = new self();
		return self::$instance;
	}

	/**
	 * Method to get all slides assigned to the slideshow
	 * Can be called statically to get the entire collection of slides
	 */
	public static function all() {}

	/**
	 * Method to create slides, single or multiple
	 * 
	 * @param string $slideshow_id - The id of the slideshow
	 * @param array  $data		   - The data for the slide
	 * @see make_image_slide_data()
	 * 
	 * @return WP_Error|array - The array of ids that were uploaded
	 */
	public function create($slideshow_id, $data) {
		if (!class_exists('MetaImageSlide')) {
			require_once(METASLIDER_PATH . 'inc/slide/metaslide.image.class.php');
		}

		// Copied from metaslide.image.class.php
		// TODO refactor and place in this class
		$slide = new MetaImageSlide;

		// This uploads the images then creates the slides
		$slide_ids = $slide->create_slides(
			$slideshow_id, $data
		);

		// If there were errors creating slides, we can still attempt to crop
		foreach ($slide_ids as $slide_id) {
			$slide->resize_slide($slide_id, $slideshow_id);
		}
		return $slide_ids;
	}

	/**
	 * Method to import image slides from an image or a theme (using default images)
	 * 
	 * @param string $slideshow_id - The id of the slideshow
	 * @param string $theme_id 	   - The folder name of a theme
	 * @param array  $images 	   - Images to upload, if any
	 * 
	 * @return WP_Error|array - The array of ids that were uploaded
	 */
	public function import($slideshow_id, $theme_id = null, $images = array()) {

		// If we are provided images, they should be formatted already
		$images = !empty($images) ? $images : $this->get_theme_images($theme_id);
		if (is_wp_error($images)) return $images;
			
		// Get an array or sucessful image ids
		$image_ids = $this->upload_images($images);
	
		// After import we need to create the slide. Currently only image slides
		// TODO: support other slide types, or a way to convert image to layer 
		return $this->create($slideshow_id, array_map(array($this, 'make_image_slide_data'), $image_ids));

	}

	/**
	 * Adds the type and image id to an array
	 *
	 * @param  int $image_id Image ID
	 * @return array
	 */
	public function make_image_slide_data($image_id) {
		return array(
			'type' => 'image',
			'id'   => absint($image_id)
		);
	}

	/**
	 * Method to import images from a theme
	 *
	 * @param array|null $theme_id - the name of a theme
	 * 
	 * @return array - a formatted image array
	 */
	public function get_theme_images($theme_id) {

		// To use local images, the folder must exist
		if (!file_exists($theme_image_directory = METASLIDER_THEMES_PATH . 'images/')) {
			return new WP_Error('images_not_found', __('We could not find any images to import.', 'ml-slider'), array('status' => 404));
		}

		// Check for the manifest, and load theme specific images for a theme (if a theme is set)
		if (empty($images) && !is_null($theme_id) && file_exists(METASLIDER_THEMES_PATH . 'manifest.php')) {
			$themes = (include METASLIDER_THEMES_PATH . 'manifest.php');

			// Check if the theme is available and has images set
			foreach ($themes as $theme) {
				if (!empty($theme['images']) && $theme_id === $theme['folder']) {
					$images = $theme['images'];
				}
			}
		}

        // Get list of images in the folder
		$all_images = array_filter(scandir($theme_image_directory), array($this, 'filter_images'));

        // If images are specified, make sure they exist and use them. if not, use 4 at random
		$images = !empty($images) ? $this->pluck_images($images, $all_images) : array_rand(array_flip($all_images), 4);

		$images_formatted = array();
		foreach ($images as $filedata) {
			$data = array();

			// Only process strings or arrays
			if (!is_string($filedata) && !is_array($filedata)) continue;

			// If a string, convert it to an array with the string as the key (filename)
			if (is_string($filedata)) {
				$data[$filedata] = array();
				$filename = $filedata;
			}

			// If it was an array, the filename needs to become the key
			if (!empty($filedata['filename'])) {
				$filename = $filedata['filename'];
				unset($filedata['filename']);
				$data = $filedata;
			}

			// Set the local images dir as the source
			$data['source'] = trailingslashit($theme_image_directory) . $filename;
			
			/*
			It should look like this, possibly without the meta data
			$images_formatted[$filename] = array(
				'source' => $tmp_name,
				'caption' => '',
				'title' => '',
				'description' => '',
				'alt' => ''
			);
			*/
			$images_formatted[$filename] = $data;
		}

		return $images_formatted;
	}

	/**
	 * Method to import images from a theme
	 *
	 * @param array $images - The full path to the local image or an array that includes the path
	 */
	private function upload_images($images) {

		$successful_uploads = array();
		foreach ($images as $filename => $image) {
			if ($image_id = $this->upload_image($filename, $image['source'], $image)) {
				array_push($successful_uploads, $image_id);
			}
		}
		return $successful_uploads;
	}

	/**
     * Method to upload a single image, you should provide a local location on the server
     *
     * @param string $filename  - The preferred name of the file
     * @param string $source    - The current location of the file without the file name
     * @param array  $meta_data - Extra data like caption, description, etc
	 * 
	 * @return int|boolean - returns the ID of the new image, or false
     */
	private function upload_image($filename, $source, $meta_data = array()) {
		if (!function_exists('media_handle_upload')) {
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/media.php');
		}

		if (file_exists($source)) {
			$wp_upload_dir = wp_upload_dir();

			// Create a new filename if needed
			$filename = wp_unique_filename(trailingslashit($wp_upload_dir['path']), $filename);

			// Get the file path of the target destination
			$destination = trailingslashit($wp_upload_dir['path']) . $filename;

			// We want these both return true
			if (copy($source, $destination)) {
				if ((bool) $image_id = $this->attach_image_to_media_library($destination, $meta_data)) {
					return $image_id;
				}
			}

			// TODO: we might want to provide a specific error message if an image 
			// fails to upload.
			return false;
		}

		// If we make it this far then the file doesn't exit
		return false;
	}

	/**
     * Method to use filter out non-images
     *
     * @param string $string - a filename scanned from the images dir
	 * 
	 * @return boolean
     */
	private function filter_images($string) {

		// TODO: allow all image types (this is currently used in the themes folder only)
		return preg_match('/jpg$/i', $string);
	}

	/**
     * Method to use filter out images that might not exist
     *
     * @param array $images_to_use - Images defined in the manifest
     * @param array $images 	   - Images from the images folder
	 * 
	 * @return array
     */
	private function pluck_images($images_to_use, $images) {

		// For the filename/caption scenario
		if (!empty($images_to_use[0]) && is_array($images_to_use[0])) {

			// Just return the multi-dimentional array and handle the filecheck later
			return $images_to_use;
		}

		// Return the images specified by the filename or four random
		$images_that_exist = array_intersect($images_to_use, $images);
		return (!empty($images_that_exist)) ? $images_that_exist : array_rand(array_flip($images), 4);
	}

	/**
     * Method to add a file to the media library
     *
     * @param string $filename   - The full path to the image dir in the media library
     * @param array  $image_data - Optional data to attach / override to the image
	 * 
	 * @return int
     */
	private function attach_image_to_media_library($filename, $image_data = array()) {

		$filetype = wp_check_filetype(basename($filename), null);
		$wp_upload_dir = wp_upload_dir();

		$attachment = array(
			'guid'           => $wp_upload_dir['url'] . '/' . basename($filename),
			'post_mime_type' => $filetype['type'],
			'post_title'     => preg_replace('/\.[^.]+$/', '', basename($filename)),
			'post_content'   => '',
			'post_excerpt'   => '',
			'post_status'    => 'publish'
		);

		// Add the caption, title and description if set. This used human-friendly words
		// instead of WP specific to make it more simple for theme developers
		if (!empty($image_data['caption'])) {
			$image_data['post_excerpt'] = $image_data['caption'];
			unset($image_data['caption']);
		}
		if (!empty($image_data['title'])) {
			$image_data['post_title'] = $image_data['title'];
			unset($image_data['title']);
		}
		if (!empty($image_data['description'])) {
			$image_data['post_content'] = $image_data['description'];
			unset($image_data['description']);
		}

		// Merge the theme data with the defaults
		$data = array_merge($attachment, $image_data);

		// Insert the attachment
		$attach_id = wp_insert_attachment($data, $filename);

		// Generate the metadata for the attachment, and update the database record
		$attach_data = wp_generate_attachment_metadata($attach_id, $filename);
		wp_update_attachment_metadata($attach_id, $attach_data);

		// The theme can set the alt tag too if needed
		if ($attach_id && !empty($image_data['alt'])) {
			update_post_meta($attach_id, '_wp_attachment_image_alt', $image_data['alt']);
		}

		return $attach_id;
	}

	/**
     * Method to disassociate slides from a slideshow and mark them as trashed
	 * TODO: Maybe we can save old slides for later use?
     *
     * @param int $slideshow_id - the id of the slideshow
	 * 
	 * @return int
     */
	public function delete_from_slideshow($slideshow_id) {
		$args = array(
			'force_no_custom_order' => true,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_type' => array('ml-slide'),
			'post_status' => array('publish'),
			'lang' => '', // polylang, ingore language filter
			'suppress_filters' => 1, // wpml, ignore language filter
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'ml-slider',
					'field' => 'slug',
					'terms' => $slideshow_id
				)
			)
		);

		// I believe if this fails there's no real harm done
		// because slides don't really need to be linked to their parent slideshow
		$query = new WP_Query($args);
		while ($query->have_posts()) {
			$query->next_post();
			wp_trash_post($query->post->ID);
		}

		return $slideshow_id;
	}
}
