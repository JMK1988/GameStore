<?php

    require_once('conexion.php');
    class Categorias{

        private $db;

        function __construct(){
           //generar la conexion con la base de datos
            
            $baseDatos = new Conexion();
            $this->db = $baseDatos->obtenerConexion();

        }
        function obtener(){

            $query = 'SELECT * FROM categorias ORDER BY ordenLista ASC';

            $stmt = $this->db->prepare($query);
            $stmt->execute();

            $result = array();

            while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){

                array_push($result, $reg);

            }
            return $result;

        }

        function obtenerSubCategorias($idCategoria){

            $query = 'SELECT * FROM subcategoria WHERE idCategoria='.$idCategoria;

            $stmt = $this->db->prepare($query);
            $stmt->execute();

            $result = array();

            while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){

                array_push($result, $reg);

            }
            return $result;

        }
        function obtenerPorCategoria($idCategoria){

            $query = 'SELECT * FROM Productos where idCategoria='.$idCategoria;

            $stmt = $this->db->prepare($query);
            $stmt->execute();

            $result = array();

            while($reg = $stmt->fetch(PDO::FETCH_ASSOC)){

                array_push($result, $reg);

            }
            return $result;

        }


    }

        



?>