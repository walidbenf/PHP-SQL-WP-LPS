<?php

namespace controller;

class ControllerAssociation{

	private $db;
	public function __construct(){

		$e = new Error; //gestion des erreurs. Pas besoin d'ecrire: controller\Error car le fichier se trouve déjà à l'intérieur

		$this->db = new \model\AssociationModel;

	}
	//-------------------------------------------------
	public function redirect($location){

		header('Location: ' . $location);
	}

	//-------------------------------------------------
	public function handleRequest(){

		$op = isset( $_GET['op'] ) ? $_GET['op'] : NULL;

		try{
			if( !$op || $op == 'list'){
				$this->listContacts();
			}
			elseif( $op == 'new' ){
				$this->saveContact();
			}
			elseif( $op == 'delete' ){
				$this->deleteContact();
			}
			elseif( $op == 'show'){
				$this->showContact();
			}


			elseif( $op == 'update'){
				$this->updateContact();
			}
			else{
				$this->showError("Page not found", "Page for operation ". $op ." was not found." );
			}
		}
		catch(Exception $e){

			$this->showError("Application error", $e->getMessage() );
		}
	}
	//-------------------------------------------------
	public function listContacts(){

		$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : NULL;

		$associations = $this->db->selectAll($orderby);

		include 'view/contactsAssociation.php';
	}
	//-------------------------------------------------
	public function saveContact(){

		$title = 'Add new association';

		$conducteur ='';
		$vehicule ='';


		if( $_POST) {

			$conducteur = isset($_POST['conducteur']) ? $_POST['conducteur'] : NULL;
			$vehicule = isset($_POST['vehicule']) ? $_POST['vehicule'] : NULL;


			try{

				$res = $this->db->insert();
				$this->redirect('association.php');
				return;
			}
			catch(Exception $e){
				echo 'erreur !!';
			}
		}
		include 'view/contact-formAssociation.php';
	}

	//-------------------------------------------------
	public function deleteContact(){

		$id = isset($_GET['id']) ? $_GET['id'] : NULL;

		if( !$id ){

			throw new Exception('Internal error.');
		}
		$res = $this->db->delete($id);

		$this->redirect('association.php');
	}

	//-------------------------------------------------
	public function showContact(){

		$id = isset($_GET['id']) ? $_GET['id'] : NULL;

		if( ! $id ){

			throw new Exception('Internal error.');
		}
		$association = $this->db->select($id);

		include 'view/contactAssociation.php';
	}



	public function updateContact(){

		$id = isset($_GET['id']) ? $_GET['id'] : NULL;
		if( ! $id ){
			throw new Exception('Internal error.');
		}
		$association = $this->db->select($id);



		$conducteur ='';
		$vehicule ='';


		if( $_POST) {

			$prenom = isset($_POST['conducteur']) ? $_POST['conducteur'] : NULL;
			$nom = isset($_POST['vehicule']) ? $_POST['vehicule'] : NULL;


			try{

				$res = $this->db->update($id);
				$this->redirect('association.php');
			}
			catch(Exception $e){
				echo 'erreur !!';
			}
		}
		include 'view/modif-contactAssociation.php';
	}
}
