<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ATT</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            .wrapper{
                width: 500px;
                margin: 0 auto;
            }
            h2{
                color:white;
                margin:0px 0px -35px;
            }
            .color{
                background-color:#9e2141;
                padding:70px;
                margin:0px 0px -65px;
            }
            select {
                background-color:#7A36D4;
            	color: white;
            	border-radius: 12px;
            	border: 2px solid #7A36D4;
            }

            select option:first-child {
        	    background-color:#7A36D4;
        		color: white;
        		border-radius: 12px;
            	border: 2px solid #7A36D4;
    		}
            
            select option {
        	    background-color:#7A36D4;
        		color: white;
        		border-radius: 12px;
            	border: 2px solid #7A36D4;
        	}
             
            select:hover{
            	background: white;
            	color: black;
            	border-radius: 12px;
            	border: 2px solid #7A36D4;
            }
        </style>
    </head>
    <body>
        <img src="https://www.gob.mx/cms/uploads/action_program/main_image/4251/post_BIENESTAR_banners_movil.jpg" align="right" width="230" height="auto">
        <div class="color">
            <h2 align="center">Atencion Telefonica</h2>
        </div>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header"></div><br>
                        <form action="inserta2.php" method="post">
                            <div class="form-group">
                                <label>Seleccione el que atiende</label>
                                <select name="att">
                                    <?php
                                        include 'dbb.php';
                                        $sele="SELECT * FROM `puestor` WHERE `nombrepuesto` LIKE 'Telefono%'";
                                        $ejec = mysqli_query($conn, $sele) or die(mysqli_error($conn));
                                    ?>
                                    <?php foreach($ejec as $opciones): ?>
                                        <option value="<?php echo $opciones['idpuesto'] ?>"> <?php echo $opciones['nombrepuesto']?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div><br>
                            <div class="form-group">
                                <label>Seleccione tramite</label>
                                <select name="tramite">
                                    <?php
                                        include 'dbb.php';
                                        $sel="SELECT * FROM tramites";
                                        $eje = mysqli_query($conn, $sel) or die(mysqli_error($conn));
                                    ?>
                                    <?php foreach($eje as $options): ?>
                                        <option value="<?php echo $options['idtramite'] ?>"> <?php echo $options['tramite_nom']?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Enviar">
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>