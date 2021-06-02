<?php 
class Conexion{	  //conexion a la base de datos PDO
    public static function Conectar() {        
        define('servidor', 'localhost');
        define('nombre_bd', 'empresa');
        define('usuario', 'root');
        define('password', '');					        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');	//variable con los parametros de conexion PDO		
        try{ //excepciones para la conexion
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es: ". $e->getMessage());
        }
    }
}