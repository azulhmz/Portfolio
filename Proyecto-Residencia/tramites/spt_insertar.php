<?php

$tra = $_POST['tra'];



##Creamos las variables onde guardaremos el host, el name, y el nombre de la bd con su contraseña
$servername='localhost';
$username='id19568871_bienestra_user';
$password='@Bien-database22';
$dbname = "id19568871_bienestar";
##Creamos una variable para conectar con el servidor de mysql
$conn=mysqli_connect($servername,$username,$password,"$dbname");
$sql = "INSERT INTO tramites(tramite_nom) values ('$tra')";
$rta = mysqli_query($conn, $sql);
if(!$rta){
    echo '<script>alert("Error al registrar el nuevo tramite");
            location.href=history.back();</script>';
}else{
    header("Location: registro_tramites.php");
}
?>