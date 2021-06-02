<?php
include_once '../bd/conexion.php';
//include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
//consultas
// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';
$colonia = (isset($_POST['colonia'])) ? $_POST['colonia'] : '';
$cyn = (isset($_POST['cyn'])) ? $_POST['cyn'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO clientes (nombre, edad, colonia, cyn, telefono) VALUES('$nombre', '$edad', '$colonia', '$cyn', '$telefono') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, nombre, edad, colonia, cyn, telefono FROM clientes ORDER BY id DESC LIMIT 1";//consultar el ultimo dado de alta
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //edicion
        $consulta = "UPDATE clientes SET nombre='$nombre', edad='$edad', colonia='$colonia', cyn='$cyn', telefono='$telefono' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, nombre, edad, colonia, cyn, telefono FROM clientes WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://eliminacion
        $consulta = "DELETE FROM clientes WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL; //cerramos conexion
