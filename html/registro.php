
<?php

    if(!empty($_POST)){

        $alert='';
        if(empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['user']) || empty($_POST['clave']) || empty($_POST['confirmar-password']) ){

            $alert='<div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                            Todos los campos son obligatorios.
                        </div>
                    </div>';
        }else{
            
            if($_POST['clave'] != $_POST['confirmar-password']) {
                $alert='<p clave="text-danger">Las contraseñas no coinciden.</p>';
            } else {

                include"../php/conexion.php";

                $nombre = $_POST['nombre'];
                $email = $_POST['correo'];
                $user = $_POST['user'];
                $clave = $_POST['clave'];
                $rol = 3;

                $query = mysqli_query($connection, "SELECT * FROM usuario WHERE usuario = '$user' OR correo = '$email' ");
                $result = mysqli_fetch_array($query);

                if($result > 0){
                    $alert='<div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">
                        El correo o el usuario ya existe.
                    </div>
                </div><p clave="text-danger">El correo o el usuario ya existe.</p>';
                } else {
                    
                    $query_insert = mysqli_query($connection, "INSERT INTO usuario(nombre,correo,usuario,clave,rol) VALUES('$nombre','$email','$user','$clave','$rol')");

                    if($query_insert){
                        $alert='<div class="toast d-flex align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                            Usuario creado correctamente.
                        </div>
                    </div><p clave="text-success">Usuario creado correctamente.</p>';
                    } else {
                        $alert='<div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                        Error al crear el usuario.
                        </div>
                    </div><p clave="text-danger">Error al crear el usuario.</p>';
                    }
                }
            }    
        }

    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">
    <!-- header -->
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm"> 
        <img class="d-block mr-3" src="../img/logo-playeras.png" width="40" height="40">
        <h5 class="mg-0 mr-md-auto font-weight-bold">Playeras</h5>
        <a href="../index.php" class="btn btn-primary text-white">Volver al inicio</a>
    </div>
    
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col col-lg-6 col-sm-10">
                <!-- Inicia Card-->
                <div class="modal-content px-4">
                    <div class="modal-body px-4">
                        <div class="form-title text-center pb-4">
                            <h4>Registro</h4>
                        </div>
                        <form action="" method="POST">
                            
                            <div class="form-group">
                                <label for="nombre">Nombre Completo</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp" placeholder="Ingrese su nombre completo" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo electronico</label>
                                <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" placeholder="correo@ejemplo.com" required>
                                <div class="invalid-feedback">
                                    Ingresa un correo válido.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user">Usuario</label>
                                <input type="text" class="form-control" name="user" id="usuario" aria-describedby="usuario" placeholder="Crea tu usuario para acceder" required>
                            </div>
                            <div class="form-group">
                                <label for="clave">Contraseña</label>
                                <input type="password" class="form-control" name="clave" id="clave" placeholder="Mínimo 8 caracteres" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmar-password">Confirmar contraseña</label>
                                <input type="password" class="form-control" name="confirmar-password" id="confirmar-password" placeholder="confirmar contraseña" required>
                                <div class="invalid-feedback">
                                    Las contraseñas no coinciden.
                                </div>
                            </div>
                            <div class="alert">
                                <?php echo isset($alert) ? $alert : ''; ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                        </form>
                        <hr/>
                        <div class="d-flex">
                            <div class="signup-section">Ya tengo una cuenta, quiero <a class="text-primary" href="../php/login.php"> Iniciar sesión</a>.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- javascript -->
	<script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>