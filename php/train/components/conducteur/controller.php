<!DOCTYPE html>
<html>
<head>
<title>conducteur</title>
<!-- Bootstrap -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<div class="container">

<h1>conducteur</h1>
<?php
ini_set('display_errors','On');
error_reporting(E_ALL^E_WARNING^E_NOTICE);

define('ITEMS_PER_PAGE', 15);
define('THIS_DIR', rtrim(dirname(__FILE__), '/\\'));

// DB parameters
$host = 'localhost';
$user = 'root';
$psw = '';
$dbName = 'vtc';

$db = mysqli_connect( "$host", "$user", "$psw",  "$dbName");
$db = new PDO('mysql:host='.$host.'; dbname='.$dbName, $user, $psw);


require_once(THIS_DIR.'/model.conducteur.php');
require_once(THIS_DIR.'/view.conducteur.php');

$HTMLConducteur = new ViewConducteur();
$dataConducteur = new ModelConducteur($db);




$page = $_GET['page'];
if($page == 0) $page=1;


$postData['id_conducteur'] = intval($_POST['id_conducteur']);
$postData['prenom'] = $_POST['prenom'];
$postData['nom'] = $_POST['nom'];


$fieldsNames= array('id_conducteur','prenom','nom');

$orderBy='';
if(in_array($_GET['orderBy'], $fieldsNames)){
	$orderBy = $_GET['orderBy'];
}

$order='asc';
if($_GET['order']){
	$order = $_GET['order'];
}

$task = addslashes($_GET['task']);
if($task == 'edit' && $_POST){
	$id = intval($_POST['id']);
}
else{
	$id = intval($_GET['id']);
}

$HTMLConducteur->menu();

switch ($task) {


	//-----------------------------------------------------------------------------------------
	// Display details
	//-----------------------------------------------------------------------------------------
	case 'view':
		// Display selected trainings
		$dataConducteur->get($id);
		$HTMLConducteur->displayDetails($dataConducteur->element);
		break;

	//-----------------------------------------------------------------------------------------
	// Edit
	//-----------------------------------------------------------------------------------------
	case 'edit':
		// get calendar date for this training
		// Get training infos
		if($_POST){
			$dataConducteur->update($postData);
		}

		$dataConducteur->get($id);
		$HTMLConducteur->form($dataConducteur->element);

		break;

	//-----------------------------------------------------------------------------------------
	// Add
	//-----------------------------------------------------------------------------------------
	case 'add':
		if($_POST){
			if($dataConducteur->add($postData)){
				echo 'Done!';
			}
			else{
				echo 'Error!';
			}
		}
		else{
			$HTMLConducteur->form($dataConducteur->element);
		}

		break;


	//-----------------------------------------------------------------------------------------
	// Delete
	//-----------------------------------------------------------------------------------------
	case 'del':
		if($id){
			if($dataConducteur->del($id)){
				echo 'Done!';
			}
			else{
				echo 'Error!';
			}
		}
		else{
			echo 'Error!';
		}


	//-----------------------------------------------------------------------------------------
	// List
	//-----------------------------------------------------------------------------------------
	default:
		// Display items list
		$invertedOrder = 'asc';
		if($order == 'asc') $invertedOrder = 'desc';


		$nbItems = $dataConducteur->getList(($page * ITEMS_PER_PAGE)-ITEMS_PER_PAGE , ITEMS_PER_PAGE, $orderBy, $order );
		$HTMLConducteur->displayList($dataConducteur->list, '?option=conducteur&', $orderBy, $invertedOrder );

		$nbPages = ceil($nbItems/ITEMS_PER_PAGE);
		$HTMLConducteur->pagination($nbPages, $page, "?option=conducteur&orderBy=$orderBy&order=$order&");
		break;
}
?>
		</div>
	</body>
</html>
