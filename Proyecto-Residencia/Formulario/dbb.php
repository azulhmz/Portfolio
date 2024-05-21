<?php
    $servername='localhost';
    $username='id19568871_bienestra_user';
    $password='@Bien-database22';
    $dbname = "id19568871_bienestar";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
        die('Could not Connect MySql Server:'. mysql_error());
    }
?>