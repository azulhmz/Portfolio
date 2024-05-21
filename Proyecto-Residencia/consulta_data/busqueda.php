<?php
    ///llamamos el codigo para la conexion a la base de datos
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
                <label>Fecha Inicial</label>
                <!--Insertamos los tipos datos para enviar las fechas y asignamos una variable a cada una para comparar entre fechas-->
                <input type="date" class="form-control" name="fechaini" required>
                <label>Fecha Final</label>
                <input type="date" class="form-control" name="fechafinal" required>
                <!--Boton para enviar los datos-->
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
        </div><br>
        <!--Hipervinculo para redireccionar a la pagina principal del administrador-->
        <a href="https://bien-filtro.000webhostapp.com/admi.php">Pantalla Principal</a>
        <!--Iniciamos una tabla con un borde de 1px para separar-->
        <table border="1">
            <tr>
                <!--Encabezados de la tabla-->
                <th>No. de Registro</th>
                <th>Fecha</th>
                <th>Filtro</th>
                <th>Nombre Personal</th>
                <th>Tramite</th>
            </tr>
        </table><br>
        <h3>Registro de datos</h3>
        <table border="1">
            <tr>
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
        </table>
    </body>
</html>