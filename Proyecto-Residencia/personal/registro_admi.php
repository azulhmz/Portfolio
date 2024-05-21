<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Archivos css-->
        <link rel="stylesheet" href="data.css">
        <title>Registro</title>
    </head>
    <body>
        <div>
            <form action="buscar.php" method="post">
                <input type="text" name="buscar" id="">
                <button type="submit" value="Buscar">Buscar</button>
                <a href="nuevo.php">Nuevo Registro</a>
            </form>
        </div>
        <div>
            <table border="1">
                <tr>
                    <td>No. Registro</td>
                    <td>Nombre</td>
                    <td>Apellido Paterno</td>
                    <td>Apellido Materno</td>
                    <td>Puesto</td>
                    <td>Puesto ID</td>
                    <td>Opciones</td>
                </tr>
                <?php
                    ##Creamos las variables onde guardaremos el host, el name, y el nombre de la bd con su contraseña
                    $servername='localhost';
                    $username='id19568871_bienestra_user';
                    $password='@Bien-database22';
                    $dbname = "id19568871_bienestar";
                    ##Creamos una variable para conectar con el servidor de mysql
                    $conn=mysqli_connect($servername,$username,$password,"$dbname");
                    $sql = "SELECT idpersonal, nombrepersonal, paterno, materno, nombrepuesto, idpuesto FROM personal NATURAL JOIN puestor order by idpersonal asc";
                    $rta = mysqli_query($conn, $sql);
                    while($mostrar = mysqli_fetch_row($rta)){
                        ?>
                        <tr>
                            <td><?php echo $mostrar['0'] ?></td>
                            <td><?php echo $mostrar['1'] ?></td>
                            <td><?php echo $mostrar['2'] ?></td>
                            <td><?php echo $mostrar['3'] ?></td>
                            <td><?php echo $mostrar['4'] ?></td>
                            <td><?php echo $mostrar['5'] ?></td>
                            <td>
                                <a href="editar.php?
                                idpersonal=<?php echo $mostrar['0'] ?> &
                                nombrepersonal=<?php echo $mostrar['1'] ?> &
                                paterno=<?php echo $mostrar['2'] ?> &
                                materno=<?php echo $mostrar['3'] ?> &
                                nombrepuesto=<?php echo $mostrar['4'] ?> &
                                idpuesto=<?php echo $mostrar['5'] ?>">Editar</a>
                                <a href="sp_eliminar.php? idpersonal=<?php echo $mostrar['0'] ?>">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    }                    
                ?>
            </table>
        </div>
        <a href="https://bien-filtro.000webhostapp.com/admi.php">Pantalla Principal</a>
    </body>
</html>