<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" >
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
        
            $usuario = $_POST['nombre'];
            $contrasena = $_POST['password'];
            
            if (isset($_POST['validar'])) {
                if (empty($usuario) || empty($contrasena)) {
                    echo 'No dejes campos en blanco';
                } else {
                    $login = $conexion->prepare("select profesor, contrasena from profesores where profesor=? AND contrasena=?");
                    $login->bindParam(1, $usuario);
                    $login->bindParam(2, $contrasena);
                    $login->execute();
                    if ($login = $login->fetch()) {
                        session_start();
                        $_SESSION['usuario'] = $usuario;
                        header('Location: eligeCurso.php');
                    } else {
                        echo 'Datos incorrectos';
                    }
                }
            }
            ?>

        <div data-role="page" data-theme="a" data-content-theme="a">
            <div data-role="header" data-theme="a" data-content-theme="a">
                <h1 data-theme="a">Inicio</h1>
            </div>

            <div data-role="main" class="ui-content" data-theme="a">
                <form method="post" action="" data-theme="a">
                    <div class="ui-field-contain" data-theme="a">
                        <label for="nombre" data-theme="a">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre.." data-theme="a">
                        <label for="pass" data-theme="a">Contraseña:</label>
                        <input type="password" name="password" id="password" placeholder="Contraseña..." data-theme="a">
                        <label for="error"><?php echo $error; ?></label>
                    </div>
                    <input type="submit" data-inline="true" value="Validar" id="validar" name="validar" data-theme="a">
                </form>
            </div>
        </div>

    </body>
</html>