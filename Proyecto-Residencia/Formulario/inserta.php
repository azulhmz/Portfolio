<?php
    include_once 'dbb.php';
    if(isset($_POST['submit'])){    
        $operario = $_POST['filtro'];
        $tramite = $_POST['tramite'];
        date_default_timezone_set('America/Mexico_City');
        $fechayhora=new DateTime();
        $fh=$fechayhora->format('Y-m-d H:i:s');
        $sql = "INSERT INTO seccion (fecha,filtro,tramite)
        VALUES ('$fh','$operario','$tramite')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Nuevo usuario registrado!");
            location.href=history.back();</script>';
        } else {
            echo '<script>alert("Error: " . $sql . ":-" . mysqli_error($conn))</script>';
        }
        mysqli_close($conn);
    }
?>