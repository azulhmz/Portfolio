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
    <?php
        $id = $_GET['idpersonal'];
        $nom = $_GET['nombrepersonal'];
        $pa = $_GET['paterno'];
        $ma = $_GET['materno'];
        $puesto = $_GET['idpuesto'];
    ?>
        <div>
            <form action="sp_editar.php" method="post">
                <table border="1">
                    <tr>
                        <td>Actualizar Datos:</td>
                        <td><input type="text" name="idpersonal" id="" style="visibility:hidden" value="<?=$id?>"></td>
                    </tr>
                    <tr>
                        <td>Nombre(s):</td>
                        <td><input type="text" name="nom" id="" value="<?=$nom?>"></td>
                    </tr>
                    <tr>
                        <td>Apellido Paterno:</td>
                        <td><input type="text" name="pa" id="" value="<?=$pa?>"></td>
                    </tr>
                    <tr>
                        <td>Apellido Materno:</td>
                        <td><input type="text" name="ma" id="" value="<?=$ma?>"></td>
                    </tr>
                    <tr>
                        <td>Puesto:</td>
                        <td><select name="idpuesto" value="<?=$puesto?>">
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
                        <td><button type="submit" value="Actualizar">Actualizar</button></td>
                        <td><a href="registro_admi.php">Cancelar</a></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>