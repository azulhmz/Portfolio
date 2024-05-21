<?php
    include_once 'dbb.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,  initial-scale=1.0">
        <!--Archivos css-->
        <link rel="stylesheet" href="data.css">
        <title>Consulta de datos</title>
    </head>
    <body>
        <div>
            <form action="consultatabla.php" method="post">
                <label>Seleccione su Ventanilla</label>
                <select name="buscar">
                    <?php
                        $sele="SELECT * FROM `puestor` WHERE `nombrepuesto` LIKE 'Ventanilla%'";
                        $ejec = mysqli_query($conn, $sele) or die(mysqli_error($conn));
                    ?>
                    <?php foreach($ejec as $opciones): ?>
                        <option value="<?php echo $opciones['nombrepuesto'] ?>"> <?php echo $opciones['nombrepuesto']?> </option>
                    <?php endforeach ?>
                </select>
                <label>Fecha Inicial</label>
                <input type="date" class="form-control" name="fechaini" required>
                <label>Fecha Final</label>
                <input type="date" class="form-control" name="fechafinal" required>
                <button type="submit" value="Buscar">Buscar</button>
            </form>
        </div>
        <h3>Registros</h3>
        <table border="1">
            <tr>
                <th>No. de Registro</th>
                <th>Fecha</th>
                <th>Ventanilla</th>
                <th>PAM/PCD</th>
                <th>Tramite</th>
                <th>ID Unico</th>
                <th>FUB</th>
                <th>CURP</th>
                <th>Estatus</th>
                <th>Auxiliar</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Observaciones</th>
            </tr>
                <?php
                error_reporting(0);
                    $buscar = $_POST['buscar'];
                    $fecha1 = date("Y-m-d", strtotime($_POST['fechaini']));
                    $fecha2 = date("Y-m-d", strtotime($_POST['fechafinal']));
                    $fecha3 = date("Y-m-d H:i:s", strtotime("+1 day", strtotime($fecha2)));
                    $sql1 = "SELECT NumeroRegistro, fecha, filtro, nombrepuesto, idp, tramite_nom, tramite2, tramite2_nom, ididen, fub, curp, estatus, auxiliar,nombres, telefono, observaciones FROM seccion2 INNER JOIN puestor on filtro=idpuesto INNER JOIN tramites on idp=idtramite INNER JOIN tramites2 on tramite2=idtramite2 where nombrepuesto like '$buscar' and fecha >= '$fecha1' and fecha <= '$fecha3' order by NumeroRegistro desc";
                    $query1 = mysqli_query($conn, $sql1);
                    while($row=mysqli_fetch_array($query1)){
                        $registro1=$row['NumeroRegistro'];
                        $fecha1=$row['fecha'];
                        $nomfiltro1=$row['nombrepuesto'];
                        $nomfiltro2=$row['tramite_nom'];
                        $nomtramite1=$row['tramite2_nom'];
                        $ididen=$row['ididen'];
                        $fub=$row['fub'];
                        $curp=$row['curp'];
                        $estatus=$row['estatus'];
                        $auxiliar=$row['auxiliar'];
                        $nombre=$row['nombres'];
                        $telefono=$row['telefono'];
                        $observaciones=$row['observaciones'];
                ?>
                <tr>
                    <td><?php echo $registro1; ?></td>
                    <td><?php echo $fecha1; ?></td>
                    <td><?php echo $nomfiltro1; ?></td>
                    <td><?php echo $nomfiltro2; ?></td>
                    <td><?php echo $nomtramite1; ?></td>
                    <td><?php echo $ididen; ?></td>
                    <td><?php echo $fub; ?></td>
                    <td><?php echo $curp; ?></td>
                    <td><?php echo $estatus; ?></td>
                    <td><?php echo $auxiliar; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $telefono; ?></td>
                    <td><?php echo $observaciones; ?></td>
                </tr>
                            <?php
                        }                    
                    ?>
        </table>
    </body>
</html>