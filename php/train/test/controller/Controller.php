<?php

namespace controller;

class Controller{

	private $db;
	public function __construct(){

		$e = new Error; //gestion des erreurs. Pas besoin d'ecrire: controller\Error car le fichier se trouve déjà à l'intérieur

		$this->db = new \model\ConducteurModel;

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

		$contacts = $this->db->selectAll($orderby);

		include 'view/contactsConducteur.php';
	}
	//-------------------------------------------------
	public function saveContact(){

		$title = 'Add new contact';

		$prenom ='';
		$nom ='';


		if( $_POST) {

			$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
			$nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;


			try{

				$res = $this->db->insert();
				$this->redirect('conducteur.php');
				return;
			}
			catch(Exception $e){
				echo 'erreur !!';
			}
		}
		include 'view/contact-formConducteur.php';
	}

	//-------------------------------------------------
	public function deleteContact(){

		$id = isset($_GET['id']) ? $_GET['id'] : NULL;

		if( !$id ){

			throw new Exception('Internal error.');
		}
		$res = $this->db->delete($id);

		$this->redirect('conducteur.php');
	}

	//-------------------------------------------------
	public function showContact(){

		$id = isset($_GET['id']) ? $_GET['id'] : NULL;

		if( ! $id ){

			throw new Exception('Internal error.');
		}
		$contact = $this->db->select($id);

		include 'view/contactConducteur.php';
	}



	public function updateContact(){

		$id = isset($_GET['id']) ? $_GET['id'] : NULL;
		if( ! $id ){
			throw new Exception('Internal error.');
		}
		$contact = $this->db->select($id);



		$prenom ='';
		$nom ='';

		if( $_POST) {

			$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
			$nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;


			try{

				$res = $this->db->update($id);
				$this->redirect('conducteur.php');
			}
			catch(Exception $e){
				echo 'erreur !!';
			}
		}
		include 'view/modif-contactConducteur.php';
	}
}
