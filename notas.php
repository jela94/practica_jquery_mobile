<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/themes/temaJesus.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" /> 
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> 
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> 
    </head>
    <body>
        <?php
        include_once 'conexion.php';
        session_start();
        $alumno=$_SESSION["alumno"];
        
        
        $contenido=filter_input(INPUT_POST, 'contenido');
        $nContenido = (int)$contenido;
        $presentacion=filter_input(INPUT_POST, 'presentacion');
        $nPresentacion = (int)$presentacion;
        $oral=filter_input(INPUT_POST, 'oral');
        $nOral = (int)$oral;
        $notaFinal= ($nContenido*0.65)+($nPresentacion*0.10)+($nOral*0.25);
        ?>

        <div data-role="page">
            <div data-role="header">
                <a href="eligeCurso.php" class="ui-btn ui-corner-all ui-icon-home ui-btn-icon-notext"></a>
                <h1>Notas <?php 
                $resultado = $conexion->query("select alumno from alumnos where idAlumno='$alumno'");
                        while ($registro = $resultado->fetch()) {
                            echo $registro['alumno'];
                
                        }
                ?></h1>
                <a href="index.php" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext"></a>
            </div>

            <div data-role="main" class="ui-content">
                <form method="post" action="">
                    <div class="ui-field-contain">
                        <label>Contenido del proyecto: <?php echo $contenido ?></label>
                        <label>Calidad de la presentación: <?php echo $presentacion ?></label>
                        <label>Expresión oral: <?php echo $oral ?></label>
                        <h1>Nota final: <?php echo $notaFinal ?></h1>
                    </div>
                    <input type="submit" data-inline="true" value="Guardar notas" id="guardar" name="guardar">
                </form>
            </div>
        </div>
        <?php
        if ($_POST['guardar']){
            header('Location: eligeCurso.php');
        }
        ?>
    </body>
</html>