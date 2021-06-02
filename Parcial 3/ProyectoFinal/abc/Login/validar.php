<?php
include('db.php');
$usuario=$_POST['usuario']; //variable para el usuario, resiven los datos ingresados por teclado
$contraseña=$_POST['contraseña']; //variable para la contraseña
$md5 = md5($contraseña);
session_start(); //se inicia sesion
$_SESSION['usuario']=$usuario; //varible para guardar el nombre de usuario

//include('db.php');
$conexion=mysqli_connect("localhost","root","","empresa");

$consulta="SELECT*FROM usuarios where Username='$usuario' and Password='$md5'";
$resultado=mysqli_query($conexion,$consulta); //metodo 

$filas=mysqli_num_rows($resultado); //toma los datos y validar

if($filas){
  
    //si los datos son correctos
    header("location:../index.php");

}else{
  ?>
  <?php
    include("index.html");
  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado); //votar el resultado
mysqli_close($conexion); //cerrar conexion
