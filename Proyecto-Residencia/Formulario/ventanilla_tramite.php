<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventanilla</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css"> 
        .tran { text-transform: uppercase;}
        a {
            background-color:#7A36D4;
            border-radius: 12px;
            color: white;
            text-align: center;
            display: inline-block;
            border: 2px solid #7A36D4;
            font-size: 12px;
            padding: 6px 32px;
            text-decoration:none;
        }

        a:hover {
            background-color: white;
            text-decoration:none;
            color: black;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        
        h2{
            color:white;
            margin:0px 0px -35px;
        }
        
        .color{
            background-color:#9e2141;
            padding:70px;
            margin:0px 0px -150px;
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
            <h2></h2>
        </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Ventanilla de tramite</h4>
                    </div>
                    <div class="card-body">
                        <form action="inserta4.php" method="POST">
                            <div class="form-group">
                                <label>Seleccione el que atiende: </label>
                                <select name="ventanilla">
                                    <?php
                                        include 'dbb.php';
                                        $sele="SELECT * FROM `puestor` WHERE `nombrepuesto` LIKE 'Ventanilla%'";
                                        $ejec = mysqli_query($conn, $sele) or die(mysqli_error($conn));
                                    ?>
                                    <?php foreach($ejec as $opciones): ?>
                                        <option value="<?php echo $opciones['idpuesto'] ?>"> <?php echo $opciones['nombrepuesto']?> </option>
                                    <?php endforeach ?>
                                </select>
                                <select name="trami">
                                    <?php
                                        include 'dbb.php';
                                        $sele="SELECT * FROM `tramites` WHERE `tramite_nom` LIKE 'P%'";
                                        $ejec = mysqli_query($conn, $sele) or die(mysqli_error($conn));
                                    ?>
                                    <?php foreach($ejec as $opciones): ?>
                                        <option value="<?php echo $opciones['idtramite'] ?>"> <?php echo $opciones['tramite_nom']?> </option>
                                    <?php endforeach ?>
                                </select>
                                <a href="https://bien-filtro.000webhostapp.com/Formulario/consultatabla.php" target="_blank">Consulta</a>
                            </div><br>
                            <div class="form-group mb-3">
                                <?php
                                    include 'dbb.php';
                                    $sel="SELECT * FROM tramites2";
                                    $eje = mysqli_query($conn, $sel) or die(mysqli_error($conn));
                                ?>
                                <?php foreach($eje as $options): ?>
                                    <input type="checkbox" name="tramite[]" value="<?php echo $options['idtramite2'] ?>"> <?php echo $options['tramite2_nom']?></br>
                                <?php endforeach ?>
                            </div>
                            <div class="form-group mb-3">
                                ID de Identificacion <input type="text" name="idi" value="N/A" class="tran"><br><br> 
                                Folio FUB <input type="text" name="fub" value="N/A" class="tran"><br><br>
                                CURP <input oniput="this.value = this.value.toUpperCase()" type="text" name="curp" value="N/A" maxlength="18" minlength="18" class="tran"><br><br>
                                Estatus <input type="text" name="estatus" value="N/A" class="tran"><br><br>
                                Auxiliar <input type="text" name="auxiliar" value="N/A" class="tran"><br><br>
                                Nombre <input type="text" name="nomb" value="N/A" class="tran"><br><br> 
                                Telefono <input type="text" name="tel" value="N/A" maxlength="10" minlength="10" class="tran"><br><br>
                                Observaciones <input type="text" name="obs" value="N/A" class="tran"> 
                            </div><br>
                            <div class="form-group mb-3">
                                <button type="submit" name="save_multiple_checkbox" class="btn btn-primary">Enviar </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>