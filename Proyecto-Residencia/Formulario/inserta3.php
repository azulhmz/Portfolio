<?php
    include_once 'dbb.php';
    if(isset($_POST['submit'])){    
        $ventanilla = $_POST['ventanilla'];
        $tramite = $_POST['tramite'];
        $sql = "INSERT INTO seccion (filtro,tramite)
        VALUES ('$ventanilla','$tramite')";
        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            echo '<script>alert("Nuevo usuario registrado!");
            location.href=history.back();</script>';
        } else {
            echo '<script>alert("Error: " . $sql . ":-" . mysqli_error($conn))</script>';
        }
        mysqli_close($conn);
    }
?>