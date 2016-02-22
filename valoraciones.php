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
        //$alumno=filter_input(INPUT_POST, 'alumno');
        
                
        ?>
        <div data-role="page">
            <div data-role="header">
                <a href="eligeCurso.php" class="ui-btn ui-corner-all ui-icon-home ui-btn-icon-notext"></a>
                <h1>Valoraciones 
                    <?php                             
                        $resultado = $conexion->query("select alumno from alumnos where idAlumno='$alumno'");
                        while ($registro = $resultado->fetch()) {
                            echo $registro['alumno'];
                
                        }
                        
                            
                        ?></h1>
                <a href="index.php" class="ui-btn ui-corner-all ui-icon-delete ui-btn-icon-notext"></a>
            </div>

            <div data-role="main" class="ui-content">
                <form method="POST" action="notas.php">
                <div data-role="collapsibleset">
                    <!---------------------------------------------------------------------------------------------------------------------->
                    <div data-role="collapsible">
                        <h3>Contenido del proyecto (65%)</h3>
                        <input type="range" name="contenido" id="contenido" value="5" min="0" max="10">
                        <label><input type="checkbox" name="planteamiento">
                        Planteamiento (Objetivos, Recursos utilizados, Destinatarios, Justificación del proyecto)</label>
                        <label><input type="checkbox" name="contenidoProyecto">  
                        Contenido (Metodología seguida, Claridad, Actividades o acciones realizadas, Documentación elaborada)</label>  
                        <label><input type="checkbox" name="resultados">
                        Resultados obtenidos (Conclusiones, Objetivos conseguidos y grado de consecución)</label>  
                        
                    </div>
                    <!---------------------------------------------------------------------------------------------------------------------->
                    
                    <!---------------------------------------------------------------------------------------------------------------------->
                    <div data-role="collapsible">
                        <h3>Calidad de la presentación (10%)</h3>
                        <input type="range" name="presentacion" id="presentacion" value="5" min="0" max="10">
                        
                        <label><input type="checkbox" name="presentacionEscrita">
                            Presentación escrita.</label>
                         
                        <label><input type="checkbox" name="redaccion">
                            Redacción y claridad del texto</label>  
                        
                        <label><input type="checkbox" name="organizacion">
                            Organización del contenido</label> 
                         
                    </div>
                    <!---------------------------------------------------------------------------------------------------------------------->
                    
                    <!---------------------------------------------------------------------------------------------------------------------->
                    <div data-role="collapsible">
                        <h3>Expresión oral (25%)</h3>
                        <input type="range" name="oral" id="oral" value="5" min="0" max="10">
                        <label><input type="checkbox" name="entrada">
                                Entrada del alumno</label>
                         
                        <label><input type="checkbox" name="indumentaria">
                                Indumentaria</label>
                         
                        <label><input type="checkbox" name="intro">
                            Introducción: ¿Es atractiva? ¿Queda claro el proyecto?</label>
                         
                        <label><input type="checkbox" name="desarrollo">
                                Desarrollo: Orden en las ideas. Claridad en la exposición. Aclaración de términos técnicos</label>
                         
                        <label><input type="checkbox" name="conclusion">
                                Conclusión: ¿Queda claro el objetivo del proyecto? ¿Lo vende bien?</label>
                         
                        <label><input type="checkbox" name="seguridad">
                                Seguridad en lo que expone. La presentación está trabajada (power -point otros)</label>
                         
                        <label><input type="checkbox" name="entusiasmo">
                            Entusiasmo en lo que expone</label>
                        
                        <h5>Expresión oral</h5>
                        
                            <label><input type="checkbox" name="entonacion">Entonación</label>
                             
                            <label><input type="checkbox" name="volumen">Volumen</label>
                            
                            <label><input type="checkbox" name="velocidad">Velocidad</label>
                             
                            <label><input type="checkbox" name="vacilacion">Vacilación en la voz</label>
                            
                            <label><input type="checkbox" name="pausas">Pausas</label>
                             
                            <label><input type="checkbox" name="muletillas">Utilización de muletillas</label>
                        <hr/>                     
                        
                        <h5>Lenguaje no verbal</h5>
                        
                            <label><input type="checkbox" name="mirada">
                                Mirada: ¿dirige la mirada a todo el auditorio?</label>
                             
                            <label><input type="checkbox" name="sonrisa">
                                Sonrisa/expresión facial positiva</label>
                             
                            <label><input type="checkbox" name="posicionCuerpo">
                                Posición correcta del cuerpo</label>
                             
                            <label><input type="checkbox" name="tics">
                                Tics, gestos nerviosos</label>
                             
                        <hr/>
                        <label><input type="checkbox" name="duracion">
                            Duración: ¿Se adecua a lo estipulado?</label>
                        <label><input type="checkbox" name="atencionPublico">
                            *Atención del público: * ¿Logra atraer la atención del público?</label>
                         
                        <label><input type="checkbox" name="preguntas">
                            Preguntas realizadas: ¿Responde de forma coherente?</label>
                         
                    </div>
                    <!---------------------------------------------------------------------------------------------------------------------->
                </div>
                    <input type="submit" data-inline="true" value="Evaluar" name="evaluar" id="evaluar">
                </form>
                
            </div>
              
        <?php
            if ($_POST['evaluar']){
                $contenido=$_POST['contenido'];
                //$num = (int)$contenido; 
                echo "<div data-role='footer'>";
                echo "Contenido del proyecto: " .$_POST['contenido']."<br/>";
                echo "Calidad de la presentación: " .$_POST['presentacion']."<br/>";
                echo "Expresión oral: " .$_POST['oral'];
                echo "</div>";
            }
        ?>
  
        </div>
        

    </body>
</html>