<?php
namespace model;

class EntityRepository{

    private $db;
    private $table;
    public function __construct(){}

    public function getDb(){

        if( !$this->db ){

            try{

                $xml = simplexml_load_file('app/config.xml');
                $this->table = $xml->table;

                try{
                    $this->db = new \PDO("mysql:dbname=". $xml->db . ";host=". $xml->host, $xml->user, $xml->password, array(\PDO::ATTR_ERRMODE=> \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') );
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
    //---------------------------------------------------------------------------------//
    public function selectAll(){

        $q = $this->getDb()->query('SELECT * FROM '.$this->table);

        $r = $q->fetchAll(\PDO::FETCH_OBJ);

        if(!$r){
            return false;
        }
        else{
            return $r;
        }
    }
    //---------------------------------------------------------------------------------//
    public function select( $id ){

        $q = $this->getDb()->query('SELECT * FROM '. $this->table . ' WHERE id_'. $this->table . ' = ' . (int) $id );

        $r = $q->fetch(\PDO::FETCH_OBJ);

        if( !$r ){

            return false;
        }
        else{

            return $r;
        }
    }
    //---------------------------------------------------------------------------------//
    public function delete( $id ){

        $q = $this->getDb()->query('DELETE FROM '. $this->table . ' WHERE id_'. $this->table . ' = ' . (int) $id);

    }
    //---------------------------------------------------------------------------------//
    public function insert(){

		$q = $this->getDb()->query('INSERT INTO ' .$this->table . '(' . implode(',', array_keys($_POST) ) . ') VALUES (' . "'" . implode("','", $_POST) . "'" . ') ');

		return $this->getDb()->lastInsertId();
    }
    //---------------------------------------------------------------------------------//
    public function update($id)
  	{
  		if( $_POST ){

   		$c = array_combine(array_keys($_POST), $_POST);
  // 		print '<pre>';
  // 		print_r($c);
  // 		print '</pre>';

  		$p = http_build_query($c, '', '", ');
  // 		print '<pre>';
  // 		print_r($p);
  // 		print '</pre>';

  		$m = str_replace('=', '="',$p);
  // 		print '<pre>';
  // 		print_r($m);
  // 		print '</pre>';
  		$q = $this->getDb()->query('UPDATE '. $this->table . ' SET ' . urldecode ($m) . '" WHERE id_' . $this->table . ' = ' . $id);
  	}
    }
}
