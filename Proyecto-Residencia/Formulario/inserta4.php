<?php
session_start();
include_once 'dbb.php';
$con = mysqli_connect("localhost","id19568871_bienestra_user","@Bien-database22","id19568871_bienestar");

if(isset($_POST['save_multiple_checkbox']))
{
    $trami = $_POST['trami'];
    $filtro = $_POST['ventanilla'];
    $brands = $_POST['tramite'];
    date_default_timezone_set('America/Mexico_City');
    $fechayhora=new DateTime();
    $fh=$fechayhora->format('Y-m-d H:i:s');
    $idi = $_POST['idi'];
    $fub=$_POST['fub'];
    $curp=$_POST['curp'];
    $curps = strtoupper($curp);
    $estatus=$_POST['estatus'];
    $estatu = strtoupper($estatus);
    $nomb=$_POST['nomb'];
    $nombs = strtoupper($nomb);
    $auxiliar=$_POST['auxiliar'];
    $aux = strtoupper($auxiliar);
    $tel=$_POST['tel'];
    $obs=$_POST['obs'];

    foreach($brands as $item)
    {   
        $query = "INSERT INTO seccion2 (fecha, idp, filtro, tramite2, ididen, fub, curp, estatus,nombres, auxiliar, telefono,observaciones) VALUES ('$fh','$trami', '$filtro','$item', '$idi', '$fub','$curps', '$estatu','$nombs', '$aux','$tel','$obs')";
        $query_run = mysqli_query($conn, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Usuario Registrado";
        header("Location: ventanilla_tramite.php");
    }
    else
    {
        $_SESSION['status'] = "No se pudo registrar los datos". mysqli_error($conn);
        header("Location: ventanilla_tramite.php");
    }
}
?>