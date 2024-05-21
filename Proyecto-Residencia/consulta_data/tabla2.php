<?php
    ////Llamamos la conexion de la base de datos 
    include_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
    <!--Iniciamos la cabeza del html-->
    <head>
        <!--Codificacion de los caracteres del lenguaje-->
        <meta charset="UTF-8">
        <!--Establecemos la compatibilidad de los navegadores-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--Ventana grafica para que sea visible al usuario segun el dispisitivo-->
        <meta name="viewport" content="width=device-width,  initial-scale=1.0">
        <!--Diseño css-->
        <link rel="stylesheet" href="data.css">
        <!--Titulo de la pagina-->
        <title>Consulta de datos</title>
        <!--Llamamos unos script de github para la exportacion de las tablas a excel-->
        <script src="https://unpkg.com/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>
    </head>
    <!--Cuerpo de la pagina-->
    <body>
        <!--Realizamos una divicion sobre la fecha de busqueda-->
        <div>
            <!--titulo-->
            <h3>Introduzca la busqueda</h3>
            <!--Lo insertamos en un formulario para que al mandarlo lo redireccione a otro php para enviar los datos por el metodo post de php-->
            <form action="tabla2.php" method="post">
                <input type="text" name="buscar" id="" placeholder="Buscar por Puesto">
                <!--Insertamos los tipos datos para enviar las fechas y asignamos una variable a cada una para comparar entre fechas-->
                <label>Fecha Inicial</label>
                <input type="date" class="form-control" name="fechaini" required>
                <label>Fecha Final</label>
                <input type="date" class="form-control" name="fechafinal" required>
                <!--Boton para enviar los datos-->
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
        </div><br>
        <!--Creamos un boton para redireccionar a la clase de exportar los datos a excel-->
        <button onclick="exportTableToExcel('tabla', 'Reporte_Filtros')">Exportar Datos Filtro/ATT a Excel</button>
        <button onclick="exportTableToExcel1('tabla1', 'Reporte_Ventanilla')">Exportar Datos Ventanilla a Excel</button>
        <!--Hipervinculo para redireccionar a la pagina principal del administrador-->
        <a href="https://bien-filtro.000webhostapp.com/admi.php">Pantalla Principal</a><br><br>
        <!--Iniciamos una tabla con un borde de 1px para separar-->
        <table id="tabla" border="1">
            <tr>
                <!--Encabezados de la tabla-->
                <th>No. de Registro</th>
                <th>Fecha</th>
                <th>Filtro</th>
                <th>Nombre Personal</th>
                <th>Tramite</th>
            </tr>
            <?php
            //Abrimos un php para realizar la consulta de datos
                //Creamos una variables para guardar los datos de las fechas por le mtodo post, ademas de que convertimos los datos en tipo fecha para que los lea mysql
                $buscar = $_POST['buscar'];
                $fecha1 = date("Y-m-d", strtotime($_POST['fechaini']));
                $fecha2 = date("Y-m-d", strtotime($_POST['fechafinal']));
                //Añadimos un dia extra para la consulta de fechas
                $fecha3 = date("Y-m-d H:i:s", strtotime("+23 hour", strtotime($fecha2)));
                //Creamos la variable donde guardaremos la consulta echa de mysql, donde llamaremos los encabezados de la base, y otras tablas, ademas de que la condicionaremos a la fecha y que vayan en orden por el numero de registro
                $sql = "SELECT NumeroRegistro, fecha, filtro, nombrepuesto, nombrepersonal, tramite, tramite_nom FROM seccion INNER JOIN puestor on filtro=puestor.idpuesto INNER JOIN personal on filtro=personal.idpuesto INNER JOIN tramites on tramite=idtramite where nombrepuesto like '$buscar' '%' and fecha >= '$fecha1' and fecha <= '$fecha3' order by NumeroRegistro ASC";
                //Creamos una variable para el query y guardemos la consulta
                $query = mysqli_query($conn, $sql);
                //Creamos un ciclo while donde llamaremos por medio de los array las filas de la base de datos para guardarlas en las variables correspondientes
                while($row=mysqli_fetch_array($query)){
                    $registro=$row['NumeroRegistro'];
                    $fecha=$row['fecha'];
                    $nomfiltro=$row['nombrepuesto'];
                    $nomfiltro2=$row['nombrepersonal'];
                    $nomtramite=$row['tramite_nom'];
            ?>
            <tr>
                <!--Imprimimos en las tablas las variables de las filas de php y la base-->
                <td><?php echo $registro; ?></td>
                <td><?php echo $fecha; ?></td>
                <td><?php echo $nomfiltro; ?></td>
                <td><?php echo $nomfiltro2; ?></td>
                <td><?php echo $nomtramite; ?></td>
            </tr>
            <?php
                }
            ?>
        </table><br>
        <h3>Registro de datos</h3>
        <table id="tabla1" border="1">
            <tr>
                <!--Encabezados de la tabla-->
                <th>No. de Registro</th>
                <th>Fecha</th>
                <th>Ventanilla</th>
                <th>Nombre Personal</th>
                <th>PAM / PCD</th>
                <th>Tramite</th>
                <th>ID Unico</th>
                <th>FUB</th>
                <th>CURP</th>
                <th>Estatus</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Observaciones</th>
            </tr>
            <?php
            //Abrimos un php para realizar la consulta de datos
                //Creamos una variables para guardar los datos de las fechas por le mtodo post, ademas de que convertimos los datos en tipo fecha para que los lea mysql (Nota: las variables son diferentes a la tabla anterior)
                $buscar1 = $_POST['buscar'];
                $fecha1 = date("Y-m-d", strtotime($_POST['fechaini']));
                $fecha2 = date("Y-m-d", strtotime($_POST['fechafinal']));
                $fecha3 = date("Y-m-d H:i:s", strtotime("+23 hour", strtotime($fecha2)));
                //Creamos la variable donde guardaremos la consulta echa de mysql, donde llamaremos los encabezados de la base, y otras tablas, ademas de que la condicionaremos a la fecha y que vayan en orden por el numero de registro
                $sql1 = "SELECT NumeroRegistro, fecha, filtro, nombrepuesto, nombrepersonal, idp, tramite_nom, tramite2, tramite2_nom, ididen, fub, curp, estatus, nombres, telefono, observaciones FROM seccion2 INNER JOIN personal on filtro=personal.idpuesto INNER JOIN puestor on filtro=puestor.idpuesto INNER JOIN tramites on idp=idtramite INNER JOIN tramites2 on tramite2=idtramite2 where nombrepuesto like '$buscar' '%' and fecha >= '$fecha1' and fecha <= '$fecha3' order by NumeroRegistro ASC";
                //Creamos una variable para el query y guardemos la consulta
                $query1 = mysqli_query($conn, $sql1);
                //Creamos un ciclo while donde llamaremos por medio de los array las filas de la base de datos para guardarlas en las variables correspondientes
                while($row=mysqli_fetch_array($query1)){
                    $registro1=$row['NumeroRegistro'];
                    $fecha1=$row['fecha'];
                    $nomfiltro1=$row['nombrepuesto'];
                    $nomfiltro2=$row['nombrepersonal'];
                    $nomfiltro3=$row['tramite_nom'];
                    $nomtramite1=$row['tramite2_nom'];
                    $ididen=$row['ididen'];
                    $fub=$row['fub'];
                    $curp=$row['curp'];
                    $estatus=$row['estatus'];
                    $nombre=$row['nombres'];
                    $telefono=$row['telefono'];
                    $observaciones=$row['observaciones'];
            ?>
            <tr>
                <!--Imprimimos en las tablas las variables de las filas de php y la base-->
                <td><?php echo $registro1; ?></td>
                <td><?php echo $fecha1; ?></td>
                <td><?php echo $nomfiltro1; ?></td>
                <td><?php echo $nomfiltro2; ?></td>
                <td><?php echo $nomfiltro3; ?></td>
                <td><?php echo $nomtramite1; ?></td>
                <td><?php echo $ididen; ?></td>
                <td><?php echo $fub; ?></td>
                <td><?php echo $curp; ?></td>
                <td><?php echo $estatus; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $telefono; ?></td>
                <td><?php echo $observaciones; ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
         <!--Creamos un script de java para llamar las librerias de arriba-->
        <script>
            function exportTableToExcel(tableID, filename = ''){
                var downloadLink;
                var dataType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
                // Specify file name
                filename = filename?filename+'.xls':'Reporte_Filtro/ATT.xls';
    
                // Create download link element
                downloadLink = document.createElement("a");
    
                document.body.appendChild(downloadLink);
    
                if(navigator.msSaveOrOpenBlob){
                    var blob = new Blob(['ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
                }else{
                    // Create a link to the file
                    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
                    // Setting the file name
                    downloadLink.download = filename;
        
                    //triggering the function
                    downloadLink.click();
                }
            }
        </script>
        <script>
            function exportTableToExcel1(tableID, filename = ''){
                var downloadLink;
                var dataType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
                // Specify file name
                filename = filename?filename+'.xls':'Reporte_Ventanilla.xls';
    
                // Create download link element
                downloadLink = document.createElement("a");
    
                document.body.appendChild(downloadLink);
    
                if(navigator.msSaveOrOpenBlob){
                    var blob = new Blob(['ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob( blob, filename);
                }else{
                    // Create a link to the file
                    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
                    // Setting the file name
                    downloadLink.download = filename;
        
                    //triggering the function
                    downloadLink.click();
                }
            }
        </script>
    </body>
</html>