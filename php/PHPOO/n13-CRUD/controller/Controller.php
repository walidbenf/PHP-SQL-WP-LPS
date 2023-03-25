<?php

namespace controller;

class Controller{

    public $db;
    public function __construct(){

        $e = new Error; // gestion des erreurs. Pas besoin d'écrire : controller\Error car le fichier se trouve déjà à l'intérieur

        $this->db = new \model\EntityRepository;
    }
    //---------------------------------------------------------------------------------//
    public function redirect($location){

        header('Location : '.$location);
    }
    //---------------------------------------------------------------------------------//
    public function handleRequest(){

        $op = isset($_GET['op']) ? $_GET['op'] : Null;

        try{

            if( !$op || $op == 'list'){
                $this->listExperiences();
            }
            elseif( $op == 'new'){

                $this->saveExperience();
            }
            elseif( $op == 'delete'){

                $this->deleteExperience();
            }
            elseif( $op == 'show'){

                $this->showExperience();
            }
            elseif($op == 'update'){

                $this->updateExperience();
            }
            else{

                $this->showError( "Page not found", 'Page for operation'. $op .'was not found.');
            }
        }
        catch(Exception $e){

            $this->showError("Application erro", $e->getMessage() );
        }
    }
    //---------------------------------------------------------------------------------//
    public function listExperiences(){

        $orderby = isset( $_GET['orderby'])?$_GET['orderby'] : NULL;
        $experiences = $this->db->selectAll($orderby);

        include 'view/experiences.php';
    }
    //---------------------------------------------------------------------------------//
    public function saveExperience(){

		$title = 'Add new experience';

		$entreprise = '';
		$poste = '';
		$date = '';
		$tache = '';

		if( $_POST ){

			$entreprise = isset( $_POST['entreprise']) ? $_POST['entreprise'] : NULL;
			$poste = isset( $_POST['poste']) ? $_POST['poste'] : NULL;
			$date = isset( $_POST['date']) ? $_POST['date'] : NULL;
			$tache = isset( $_POST['tache']) ? $_POST['tache'] : NULL;

			try{
				$res = $this->db->insert();
				$this->redirect('index.php');
				return;
			}
			catch(Exception $e){
				echo 'Error !';
			}
		}
		include 'view/experience-form.php';
	}
    //---------------------------------------------------------------------------------//
    public function deleteExperience(){

        $id = isset($_GET['id']) ? $_GET['id'] : NULL;

        if (!$id) {

            throw new Exception('Internal error.');
        }
        $res = $this->db->delete($id);

        $this->redirect('index.php');
    }
    //---------------------------------------------------------------------------------//
    public function showExperience(){

        $id = isset($_GET['id']) ? $_GET['id'] : NULL;

        if(!$id){

            throw new Exception('Internal error.');
        }
        $experience = $this->db->select($id);

		include 'view/experience.php';
    }
//---------------------------------------------------------------------------------//

    public function updateExperience(){

        $id = isset($_GET['id']) ? $_GET['id'] : NULL;

        if(!$id){

            throw new Exception('Internal error.');
        }
        $experience = $this->db->select($id);

        $title = 'Add new experience';

        $entreprise = '';
    		$poste = '';
    		$date = '';
    		$tache = '';

		if( $_POST ){

      $entreprise = isset( $_POST['entreprise']) ? $_POST['entreprise'] : NULL;
			$poste = isset( $_POST['poste']) ? $_POST['poste'] : NULL;
			$date = isset( $_POST['date']) ? $_POST['date'] : NULL;
			$tache = isset( $_POST['tache']) ? $_POST['tache'] : NULL;

			try{
				$res = $this->db->update($id);
				$this->redirect('index.php');
				return;
			}
			catch(Exception $e){
				echo 'Error !';
			}
        }


		include 'view/editexperience.php';

    }
}
