<?php
$config = include('/config/dev.php');
class Model 
{
    const DB_NAME = 'my_cms';
    const USER = 'root';
    const PASS = '1234';
    protected $dbConnect;
    protected $tableName;

    function __construct() {
        //
        /*try {
            
        } catch (Exception $e) {
            die ('ERReyurrerz' . $e->getMessage());
        }*/
        $this->dbConnect = new PDO('mysql:host=localhost; dbname=' . self::DB_NAME ,self::USER, self::PASS);
    }

    public function getAll() {
        $request = $this->dbConnect->prepare('SELECT * FROM ' . $this->tableName);
        $request->execute();
        $results = $request->fetchAll();
        return $results;
    }

    public function getOne($identifierKey, $idenfitfierValue) {
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE ' . $identifierKey . ' = "' . $idenfitfierValue . '" LIMIT 1';
        $request = $this->dbConnect->prepare($sql);
        $request->execute();
        $results = $request->fetchAll(PDO::FETCH_OBJ);
        return $results[0];
    }

}