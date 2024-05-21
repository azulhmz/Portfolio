<?php

$trami = $_POST['tra2'];

##Creamos las variables onde guardaremos el host, el name, y el nombre de la bd con su contraseña
$servername='localhost';
$username='id19568871_bienestra_user';
$password='@Bien-database22';
$dbname = "id19568871_bienestar";
##Creamos una variable para conectar con el servidor de mysql
$conn=mysqli_connect($servername,$username,$password,"$dbname");
$sql = "INSERT INTO tramites2(tramite2_nom) values ('$trami')";
$rta = mysqli_query($conn, $sql);
if(!$rta){
    echo "Error al registrar el nuevo tramite". mysqli_error($conn);
}else{
    header("Location: registro_tramites2.php");
}
?>