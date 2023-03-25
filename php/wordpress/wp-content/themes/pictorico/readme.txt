=== Pictorico ===
Contributors: automattic
Tested up to: 4.5
Stable tag: 4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Pictorico is based on Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc.

== Description ==

A single-column, grid-based theme with large featured images and a post slider, perfect for a photoblogging or travel site.

== Bundled Licenses ==

 * jQuery FlexSlider v2.2.0 (http://www.woothemes.com/flexslider/)
- Copyright 2016 WooThemes
- Free to use under the GPLv2 license.
- http://www.gnu.org/licenses/gpl-2.0.html
- Contributing author: Tyler Smith (@mbmufffin)

* Photos in the screenshot are from unsplash.com and licensed Creative Commons 0 (CC0)

== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Where can I add widgets? =

Pictorico includes up to four widget areas in the footer. Configure these areas by going to Appearance â†’ Widgets in your Dashboard.

= Does Pictorico use Featured Images? =

If a Featured Image at least 1180px wide is set for a post, it will display above the post in the header area, replacing any Custom Header image that may be set.

= How do I set up the slider? =

To set up Pictorico's post slider:

1. Download and activate Jetpack (http://jetpack.me)
2. Navigate to Appearance â†’ Customize â†’ Featured Content.
3. Enter the name of a tag.
4. Click the blue Save button at the bottom.
5. Create a post with a featured image that's at least 1180px wide.
6. Give the post the tag you declared under Appearance â†’ Customize â†’ Featured Content.

= Quick Specs (all measurements in pixels) =

1. The main column width is 885.
2. The footer widget area widths vary depending on the number of active areas.
3. Featured Images work best at a minimum of 1200 wide and 590 high.

== Changelog ==

= 3 March 2018 =
* Use wp_kses_post rather than wp_filter_post_kses.

= 18 October 2017 =
* Make sure teaxonomy description has some vertical space around on mobile devices.

= 25 August 2017 =
* Replace line of smarter featured image code that was not compatible with PHP 5.3.x, for backwards compatibility.

= 28 June 2017 =
* Add hover/focus state to links in the widget area.

= 8 June 2017 =
* Add JavaScript resize event for video widget aspect-ratio issue. Update list styles for text widget.

= 20 April 2017 =
* Add Smarter Featured Images support.

= 12 April 2017 =
* Check for post parent before outputting next, previous, and image attachment information to prevent fatals.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 9 February 2017 =
* Check for is_wp_error() in cases when using get_the_tag_list() to avoid potential fatal errors.

= 18 January 2017 =
* Add translation of Headstart annotation

= 17 January 2017 =
* Add new grid-layout tag to stylesheet.
* Remove portfolio tag from non-portfolio CPT themes.

= 13 January 2017 =
* Update description in style.css to remove "portfolio" references

= 24 November 2016 =
* Add support for Content Options - Featured Images

= 19 October 2016 =
* Use CSS selector for Content Options
* Fix padding when date is hidden

= 26 August 2016 =
* Add Featured Content to Headstart annotations.

= 26 July 2016 =
* Add support for Content Options

= 7 July 2016 =
* Let WordPress manage the document title by adding theme support

= 24 June 2016 =
* Update Headstart featured image URLs.

= 23 June 2016 =
* Update Headstart featured image URLs and reduce the total number of images to four from eight (one visual row).

= 9 June 2016 =
* Add missing semicolon
* Update Portfolio Featured Image function so it has the same style as Portfolio Title and Portfolio Content functions
* Update Portfolio CPT with new theme option

= 8 June 2016 =
* Add support for Portfolio CPT new feature

= 24 May 2016 =
* Ensure menus and pages widgets display post hierarchy.

= 12 May 2016 =
* Add new classic-menu tag.

= 10 May 2016 =
* Adding hash mark to hexidecimal value for mark, ins backgrounds.

= 5 May 2016 =
* Move annotations into the `inc` directory.

= 4 May 2016 =
* Move existing annotations into their respective theme directories.

= 22 April 2016 =
* Add featured-content-with-pages tag to style.css and readme.txt.

= 24 February 2016 =
* Ensure site title is click-able whether the mobile menu is open or closed.

= 8 February 2016 =
* Changing theme author to Automattic - to ensure that all our in-house themes have the same author.

= 31 August 2015 =
* Update readme.txt to be in sync with theme

= 20 August 2015 =
* Add text domain and/or remove domain path. (O-S)

= 31 July 2015 =
* Remove `.screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 15 July 2015 =
* Always use https when loading Google Fonts.

= 17 June 2015 =
* Set IS wrapper to false to fix IS bug where posts flash/disappear after page 3.

= 6 May 2015 =
* Fully remove example.html from Genericons folders.
* Remove index.html file from Genericions.

= 4 March 2015 =
* Remove widont filter around entry titles on home/archive pages.

= 17 December 2014 =
* Allow tablets to access submenu items in the site navigation.

= 27 October 2014 =
* Improve display of multi-column galleries.

= 24 September 2014 =
* Use correct class for the blog home styles (.blog) to avoid breaking static page on front display in RTL.

= 18 August 2014 =
* Multiples changes.
* Update Headings line-height to respect vertical rhythm
* Pictorico; Increase h1 element line-height.

= 5 August 2014 =
* Update version # and author name; update readme.txt; add image.php template so image attachments are displayed larger.
* Set a large left position on screen-reader-text to avoid overflow of right-aligned elements on narrow screens.

= 4 August 2014 =
* Don't allow child items of the current parent to inherit the parent's color;

= 24 July 2014 =
* change theme/author URIs and footer links to `wordpress.com/themes`.

= 21 July 2014 =
* Update featured images sizes in readme

= 15 July 2014 =
* Update readme.txt with the changes in 1.0.6.

= 8 July 2014 =
* Use correct class for the blog home styles (.blog) to avoid breaking static page on front display.

= 3 July 2014 =
* Editor styles added. Fix #2518 -- Captions will be left aligned like on the front end

= 10 June 2014 =
* Correct version numbers for new downloads.
* Version bump to 1.03 for new downloads.
* Fix real-time preview for Customizer header color.

= 5 June 2014 =
* Ready for re-submission to WP.org

= 4 June 2014 =
* Style unfinished pages, 404 and no search result page.

= 30 May 2014 =
* Text and link update footer credit.

= 15 May 2014 =
* Reduce font size for infinite footer to make it less obtrusive.

= 9 May 2014 =
* Clear post and paging navigation and remove overflow so it's visible on archive page.

= 7 May 2014 =
* Remove unnecessary layouts folder; add readme.txt; add necessary .bypostauthor class to style.css for .org

= 2 May 2014 =
* Reverse conditional for header image so it doesn't show a blank space if no header image is assigned and the slider is not visible.

= 1 May 2014 =
* Add language files
* Minor change to comment reply title cancel link styles
* Change outdent class to pull
* Allow custom header image to appear on home page/archives/search if one is set
* Fix/style comment navigation; ensure custom header admin matches front end
* Adjust font sizes to be smaller on mobile devices; clean up infinite footer styles; move entry meta outside entry-content; only display footer sidebar area if sidebars are active
* Collapse entries without featured images on mobile view
* Improvements to footer display for mobile devices

= 30 April 2014 =
* Improvements for widget areas in Android mobile
* Fix short title display on mobile view
* Ensure footer credits don't run into the sides on mobile view
* Add a wrapper class to the slider to allow it to stay centered and resize on window resize
* Improvements to slider positioning on first load

= 28 April 2014 =
* Minor improvements to slider and RTL styles
* Display
* First pass at RTL styles
* Ensure theme does not horizontally scroll when there are lots of child menu items

= 25 April 2014 =
* Add spacing between posts and infinite loader
* Additional header mobile improvements; add screenshot
* First pass at description for style.css
* Add tags to style.css
* Improvements to header layout for mobile devices
* Set slideshow to false; minor tweak to slider mobile styles

= 24 April 2014 =
* Improvements to slider mobile styles
* Users can outdent images or blockquotes with a class of outdent, rather than doing this by default. Solves the problem of small, center-aligned images appearing to the left.
* Begin mobile styles for slider
* Fix slider position on first load; make home images larger to account for small screen dimensions; make links in flexslider wite
* Adjustments to make single post titles more readable on small screens
* Add a new breakpoint to reduce the number of columns to one for better readability on small screens
* Adustments to infinite scroll wrapper settings; make colored default backgrounds for posts more random; add hover styles to Older Posts button
* Add hover styles to main and site navigation areas
* Load 8 posts per page for infinite scroll to align with the four-column grid
* Update home content template to include post format link within entry header
* Add sliding effect to post meta on hover for home page/archives

= 18 April 2014 =
* Minor
* Add link to post format archive on single view
* Minor tweak to custom header appearance in admin
* Implement custom header images
* Improvements to mobile menu styles
* Improvements to mobile menu styles, entry format icons opacity
* Fixes/style updates for infinite scroll; fixes for mobile entry styles, including upping the featured image size to match the breakpoints
* Add aligned blockquote styles
* Add aligned image styles
* Improvements to mobile header styles, rearranging elements
* Add screen-reader-text class around menu toggle text
* Minor style improvements
* Improvements to header mobile styles
* Rename JS file
* Add WordPress.com-specific stylesheet
* Update script and style handle prefixes; improvements to mobile header styles; add support for featured content to portfolios and pages
* Update $themecolors array to match theme
* Update hentry header height; use background featured images with background-size rather than IMG tags; update post thumbnail size
* Initial pass at mobile styles; update thumbnail namespaces to match theme namej

= 17 April 2014 =
* Use px values for Genericons for IE; add background color to slides
* Adjust slider width and height to new dimensions to better match mock-ups
* Adjustments to slider navigation styles
* Add genericons icon to post navigation meta-nav elements
* Make standard seperator a bullet
* Center smaller featured images
* Set proper content width
* Adjustments to header to better match mock-up
* Adjustments to featured image sizes and spacing to better match mock-ups
* Adjustments to column widths, spacing, to better match mock-up
* Adjustments to header area search/site title/navigation; simplify header entry meta on single post view; add Sticky icon
* Initial commit to repo
