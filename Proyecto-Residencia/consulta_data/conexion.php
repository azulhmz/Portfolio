<?php
//Iniciamos el php con los mayores y menores
    //Ponemos el host, usuario, contraseña y el nombre de la base de datos de phpmyadmi en variables
    $servername='localhost';
    $username='id19568871_bienestra_user';
    $password='@Bien-database22';
    $dbname = "id19568871_bienestar";
    //Creamos una variable y establecemos la conexion con mysql
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    //Si genera algun error con la conexion llamamos un if para que nos envie el error y sea mas facil identificarlo
    if(!$conn){
        die('Could not Connect MySql Server:'. mysql_error());
    }
?>