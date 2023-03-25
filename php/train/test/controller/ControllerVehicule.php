<?php

namespace controller;

class ControllerVehicule{

    private $db;
    public function __construct()
    {

        $e = new Error; //gestion des erreurs. Pas besoin d'ecrire: controller\Error car le fichier se trouve déjà à l'intérieur

        $this->db = new \model\VehiculeModel;
    }
    //-------------------------------------------------
    public function redirect($location)
    {

        header('Location: ' . $location);
    }

    //-------------------------------------------------
    public function handleRequest()
    {

        $veh = isset($_GET['veh']) ? $_GET['veh'] : NULL;

        try {
            if (!$veh || $veh == 'list') {
                $this->listVehicules();
            } elseif ($veh == 'new') {
                $this->saveVehicule();
            } elseif ($veh == 'delete') {
                $this->deleteVehicule();
            } elseif ($veh == 'show') {
                $this->showVehicule();
            }
            elseif ($veh == 'update') {
                $this->updateVehicule();
            } else {
                $this->showError("Page not found", "Page for veheration " . $veh . " was not found.");
            }
        } catch (Exception $e) {

            $this->showError("Application error", $e->getMessage());
        }
    }
    //-------------------------------------------------
    public function listVehicules()
    {

        $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : NULL;

        $vehicules = $this->db->selectAll($orderby);

        include 'view/contactsVehicule.php';
    }
    //-------------------------------------------------
    public function saveVehicule()
    {

        $title = 'Add new Vehicule';

        $marque = '';
        $modele = '';
        $couleur = '';
        $immatriculation = '';
        $date_embauche = '';
        $salaire = '';

        if ($_POST) {

            $marque = isset($_POST['marque']) ? $_POST['marque'] : NULL;
            $modele = isset($_POST['modele']) ? $_POST['modele'] : NULL;
            $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : NULL;
            $immatriculation = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : NULL;

            try {

                $res = $this->db->insert();
                $this->redirect('vehicule.php');
                return;
            } catch (Exception $e) {
                echo 'erreur !!';
            }
        }
        include 'view/contact-formVehicule.php';
    }

    //-------------------------------------------------
    public function deleteVehicule()
    {

        $id = isset($_GET['id']) ? $_GET['id'] : NULL;

        if (!$id) {

            throw new Exception('Internal error.');
        }
        $res = $this->db->delete($id);

        $this->redirect('vehicule.php');
    }

    //-------------------------------------------------
    public function showVehicule()
    {

        $id = isset($_GET['id']) ? $_GET['id'] : NULL;

        if (!$id) {

            throw new Exception('Internal error.');
        }
        $vehicule = $this->db->select($id);

        include 'view/contactVehicule.php';
    }

    public function updateVehicule()
    {

        $id = isset($_GET['id']) ? $_GET['id'] : NULL;
        if (!$id) {
            throw new Exception('Internal error.');
        }
        $vehicule = $this->db->select($id);



        $marque = '';
        $modele = '';
        $couleur = '';
        $immatriculation = '';
        $date_embauche = '';
        $salaire = '';


        if ($_POST) {

            $marque = isset($_POST['marque']) ? $_POST['marque'] : NULL;
            $modele = isset($_POST['modele']) ? $_POST['modele'] : NULL;
            $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : NULL;
            $immatriculation = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : NULL;

            try {

                $res = $this->db->update($id);
                $this->redirect('vehicule.php');
            } catch (Exception $e) {
                echo 'erreur !!';
            }
        }
        include 'view/modif-contactVehicule.php';
    }
}
