<?php
    $usuario = $_POST['usua'];
    $contra = $_POST['con'];

    $servername='localhost';
    $username='id19568871_bienestra_user';
    $password='@Bien-database22';
    $dbname = "id19568871_bienestar";
    ##Creamos una variable para conectar con el servidor de mysql
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    $consult="SELECT usuario, contra From administrador WHERE usuario='$usuario' and contra='$contra'";
    $resul=mysqli_query($conn, $consult);

    $file=mysqli_num_rows($resul);
    if($file>0){
        header("location:https://bien-filtro.000webhostapp.com/admi.php");
    }else{
        echo '<script>alert("Error de autentificacion");
            location.href=history.back();</script>';
    }

    mysqli_free_result($resul);
    mysqli_close($conn);

?>