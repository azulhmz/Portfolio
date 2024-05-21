<!DOCTYPE html>
<html>
    <head>
        <meta charset="UFT-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Archivos css-->
        <link rel="stylesheet" href="data.css">
        <title>Nuevo Registro</title>
    </head>
    <body>
        <div>
            <form action="sp_insertar.php" method="post">
                <table border="1">
                    <tr>
                        <td>Ingresar Datos:</td>
                    </tr>
                    <tr>
                        <td>Nombre(s):</td>
                        <td><input type="text" name="nom" id=""></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno:</td>
                        <td><input type="text" name="pa" id=""></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno:</td>
                        <td><input type="text" name="ma" id=""></td>
                    </tr>
                    <tr>
                        <td>Puesto:</td>
                        <td><select name="idpuesto">
                                    <?php
                                        include 'dbb.php';
                                        $sele="SELECT * FROM `puestor` ";
                                        $ejec = mysqli_query($conn, $sele) or die(mysqli_error($conn));
                                    ?>
                                    <?php foreach($ejec as $opciones): ?>
                                        <option value="<?php echo $opciones['idpuesto'] ?>"> <?php echo $opciones['nombrepuesto']?> </option>
                                    <?php endforeach ?>
                                </select></td>
                    </tr>
                    <tr>
                        <td><button type="submit" value="Guardar">Guardar</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>