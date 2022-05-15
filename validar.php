<?php

//se crean las variables que van a recibir los datos por teclado
//lo que esta dentro de los corchetes es lo que viene del html
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
 
//creamos un metodo de inicio de sesion
    //una sesion guarda datos al lado del servidor, es un arreglo de datos.
session_start();

$_SESSION['usuario']=$usuario;

//incluye la conexion de base de datos
include('db.php');

//creamos la variable consulta la cual se ejecutará en la base datos

$consulta="SELECT*FROM login where usuario='$usuario' and contraseña='$contraseña' ";


//validamos

$resultado=mysqli_query($conexion,$consulta);

//agarramos los datos

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:home.php");//envia a esta pagina
}else{
    ?>
    <?php 
    include("index.php"); //vuelve a la misma pagina

    ?>
    <h1 class="bad" >Error en la autenticación</h1>
    <?php 
}

mysqli_free_result($resultado); //nos da el resultado
mysqli_close($conexion);//termina la conexion





?>