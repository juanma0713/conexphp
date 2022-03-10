<?php

require 'Database.php';

class Product{
    private int $codigo;
    private string $nombre;
    private int $cantidad;
    private $conexionBaseDatos;


    public function __construct(int $code, string $nombre, int $cantidad){
        $this->codigo = $code;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;


        $database= new Database();
        $this->$conexionBaseDatos= $database->conexion;
    }

    public function setCodigo(int $codigo){
        $this->codigo=$codigo;
    }

    public function getCodigo():int{
      return $this->codigo;
    }

    public function setNombre(string $nombre){
        $this->nombre=$nombre;
    }

    public function getNombre():string{
      return $this->nombre;
    }

    public function setCantidad(int $cantidad){
        $this->cantidad=$cantidad;
    }

    public function getCantidad():int{
      return $this->cantidad;
    }


    public function descripcion(){
    echo "Producto con codigo: " . $this->codigo . ", nombre: " . $this->nombre . ", cantidad: " . $this->cantidad;

    }


    public function save(){
       try{
           $query = "INSERT INTO productos (codigo,nombre,cantidad) VALUES(:codigo, :nombre, :cantidad)";

           $values = [
             ":codigo" => $this->codigo,
             ":nombre" => $this->nombre,
             ":cantidad" => $this->cantidad,
            ];

        $consulta = $this->conexionBaseDatos->prepare($query);
        $consulta->execute($values);

        echo "guardado";
       }catch(PDOException $e){
           die("Error on save: " . $e);
       }
    }
}