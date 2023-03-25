<?php
/**
*	Manage the table conducteur

*/

class ModelConducteur{

var $tableName;
var $element;
var $list = array();

/**
* Constructor
*/
public function __construct($link){
	$this->conducteur = '`conducteur`';
	$this->link = $link;
}
public function getDb(){

    if( !$this->db ){

        try{

            $xml = simplexml_load_file('app/config.xml');
            $this->table = $xml->table;

            try{
                $this->db = new \PDO("mysql:dbname=". $xml->db . ";host=". $xml->host, $xml->user, $xml->password, array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION) );
            }
            catch(\PDOException $e){

                die("Problème de connexion bdd : " . $e->getMessage() );
            }


        }
        catch(Exception $e){

            die("Problème de fichier de configuration xml !");
        }
    }
    return $this->db;
}
/**
* Add a row in conducteur
* @param array data
*/
function add($data){

 	$query = "INSERT INTO $this->conducteur  (id_conducteur, prenom, nom)
		VALUES (
			:id_conducteur,
			:prenom,
			:nom)";
	$q = $this->link->prepare($query);


	if ($q->execute(array(':id_association' => $data['id_association'], ':id_vehicule' => $data['id_vehicule'], ':id_conducteur' => $data['id_conducteur'], ':id_conducteur' => $data['id_conducteur'], ':prenom' => $data['prenom'], ':nom' => $data['nom'], ':id_vehicule' => $data['id_vehicule'], ':marque' => $data['marque'], ':modele' => $data['modele'], ':couleur' => $data['couleur'], ':immatriculation' => $data['immatriculation']))){
		return ($this->link->lastInsertId());
	}
	else{
		return(0);
	}
}



/**
* Update a row in conducteur
* @param array data
*/
function update($data){

 	$query = "UPDATE $this->conducteur SET
		`id_conducteur` = :id_conducteur,
		`prenom` = :prenom,
		`nom` = :nom,
	WHERE id = :id ";

	$q = $this->link->prepare($query);


	if ($q->execute(array(':id_conducteur' => $data['id_conducteur'], ':prenom' => $data['prenom'], ':nom' => $data['nom'] ))){
		return (1);
	}
	else{
		return(0);
	}
}



/**
* Delete a row in conducteur
* @param Int id
*/
function del($id){

	$query = "DELETE FROM $this->conducteur WHERE id = :id";
	$q = $this->link->prepare($query);

	if ($q->execute(array(':id' => $id ))){
		return (1);
	}
	else{
	 return(0);
	}
}




/**
* Get a row in conducteur
* @param Int id
*/
function get($id){

	$query = "SELECT  `id_association`,  `id_vehicule`,  `id_conducteur`,  `id_conducteur`,  `prenom`,  `nom`,  `id_vehicule`,  `marque`,  `modele`,  `couleur`,  `immatriculation`
 		FROM $this->conducteur
 		WHERE id = :id";
	$q = $this->link->prepare($query);

	if ($q->execute(array(':id' => $id))){
		if($row = $q->fetch(PDO::FETCH_ASSOC)){
			$this->element['id_conducteur'] = $row['id_conducteur'];
			$this->element['prenom'] = $row['prenom'];
			$this->element['nom'] = $row['nom'];
			return(1);
		}
		else{
			return(0);
		}
	}
	else{
		return(0);
	}
}





/**
* Get a list of row in conducteur
* @param Int limitFrom
* @param Int limitNumber
* @param char orderBy
* @param Int order
*/
function getList($limitFrom, $limitNumber, $orderBy='', $order='DESC'){

	$query = "SELECT   `id_conducteur`,  `prenom`,  `nom`
		 FROM $this->conducteur ";
	if($orderBy){
		$query .= "ORDER BY :orderBy :order ";
	}

	if($limitNumber){
		$query .= "LIMIT :limitFrom, :limitNumber ";
	}

	$q = $this->link->prepare($query);

	if($limitNumber){
		$q->bindValue(':limitFrom', intval($limitFrom), PDO::PARAM_INT);
		$q->bindValue(':limitNumber', intval($limitNumber), PDO::PARAM_INT);
	}
	if($orderBy){
		$q->bindValue(':order', $order);
		$q->bindValue(':orderBy', $orderBy);
	}
	if ($q->execute($bind)){
		$i=0;
		while($row = $q->fetch(PDO::FETCH_ASSOC)){
			$this->list[$i]['id_conducteur'] = $row['id_conducteur'];
			$this->list[$i]['prenom'] = $row['prenom'];
			$this->list[$i]['nom'] = $row['nom'];
			$i++;
		}
		return($i);
	}
	else{
		return(0);
	}
}





/**
* Count row in conducteur
*/
function count(){

	$query = "SELECT COUNT(*) AS nbRows
		 FROM $this->conducteur";
	$q = $this->link->prepare($query);

	if ($results = $q->execute()){
		if($row = $result->fetch(PDO::FETCH_ASSOC)){
			return($row[nbRows]);
		}
	}
	else{
		return(0);
	}
}



}

?>
