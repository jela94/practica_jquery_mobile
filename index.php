<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
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

        <div data-role="page">
            <div data-role="header">
                <h1>Inicio</h1>
            </div>

            <div data-role="main" class="ui-content">
                <form method="post" action="">
                    <div class="ui-field-contain">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre..">
                        <label for="pass">Contraseña:</label>
                        <input type="password" name="password" id="password">
                        <label for="error"><?php echo $error; ?></label>
                    </div>
                    <input type="submit" data-inline="true" value="Validar" id="validar" name="validar">
                </form>
            </div>
        </div>

    </body>
</html>