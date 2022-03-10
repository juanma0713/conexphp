<?php

require_once'config/database.php';

class Database
{
    public $conexion;

    public function __construct(){
        try{
            $dsn = "mysql:host=".HOST.";dbname=".DATABASE;
        $pdo = new PDO($dsn, USER, PASSWORD);
        $this->conexion=$pdo;
            }catch(PDOException $e){
                print "Error: ".$e->getMessage() . "<br/>";
                die();

            }
    }
}