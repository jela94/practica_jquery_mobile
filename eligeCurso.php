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
    error_reporting(E_ALL^E_NOTICE);
    $alumno=filter_input(INPUT_POST, 'alumno');
    $_SESSION['alumno']= $alumno;
    
    ?>

<div data-role="page">
  <div data-role="header">
        <a href="eligeCurso.php" class="ui-btn ui-corner-all ui-icon-home ui-btn-icon-notext"></a>
        <h1>Hola <?php echo $_SESSION['usuario'];?></h1>
        <a href="index.php" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext"></a>
  </div>

  <div data-role="main" class="ui-content">
      <form method="post" action="eligeCurso.php" name="frm" onchange="cambiar();" data-ajax="false">
        <h3>Elige curso y alumno</h3>
      <fieldset class="ui-field-contain">
        <label>Curso</label>
        
        <?php
            /*****************SELECT cursos***********************/
            //Selecciona el codigo de la tabla familia        
            $resultado = $conexion->query("select idCurso, curso from curso");
            $cursoSeleccionado = $_POST['curso'];
            //Crea un select con los option mostrando el cod de la familia
            echo "<select id='curso' name='curso' selected onchange = 'this.form.submit()'><option>Elige curso...</option>";
            while ($registro = $resultado->fetch()) {
                echo "<option value='" . $registro['idCurso'] . "' ";
                //Queremos que esté seleted el último que seleccioné
                if ($registro['idCurso'] == $cursoSeleccionado) {
                    echo "selected";
                }
                echo " >$registro[curso] </option>";
            }
            echo "</select>";
            /*****************FIN DEL SELECT*****************/
        ?>
        <label>Alumno</label>
        <?php
            /*****************SELECT Alumnos***********************/
            //Selecciona el codigo de la tabla familia   
            $idCurso = $_POST['curso'];
            $resultado = $conexion->query("select idAlumno, alumno from alumnos where idCurso='$idCurso'");
            $alumnoSeleccionado = $_POST['alumno'];
            //Crea un select con los option mostrando el cod de la familia
            echo "<select id='alumno' name='alumno'><option>Elige alumno...</option>";
            while ($registro = $resultado->fetch()) {
                echo "<option value='" . $registro['idAlumno'] . "' ";
                //Queremos que esté seleted el último que seleccioné
                if ($registro['idAlumno'] == $alumnoSeleccionado) {
                    echo "selected";
                }
                echo " >$registro[alumno] </option>";
            }
            echo "</select>";
            /*****************FIN DEL SELECT*****************/
        ?>
      </fieldset>
        
        <input type="submit" data-inline="true" value="Validar" name="validar" id="validar">
    </form>
            <?php
           if (isset($_POST['validar'])) {
                header('Location: valoraciones.php');
            } 
        ?>
  </div>
</div>

</body>
</html>