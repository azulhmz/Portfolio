<?php

$nom = $_POST['nom'];
$pa = $_POST['pa'];
$ma = $_POST['ma'];
$puesto = $_POST['idpuesto'];


##Creamos las variables onde guardaremos el host, el name, y el nombre de la bd con su contraseña
$servername='localhost';
$username='id19568871_bienestra_user';
$password='@Bien-database22';
$dbname = "id19568871_bienestar";
##Creamos una variable para conectar con el servidor de mysql
$conn=mysqli_connect($servername,$username,$password,"$dbname");
$sql = "INSERT INTO personal(nombrepersonal,paterno,materno,idpuesto) values ('$nom', '$pa', '$ma', '$puesto')";
$rta = mysqli_query($conn, $sql);
if(!$rta){
    echo '<script>alert("Error al insertar el nuevo registro");
            location.href=history.back();</script>';
}else{
    header("Location: registro_admi.php");
}
?>