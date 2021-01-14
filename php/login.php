<?php  

    $alert = '';
    session_start();
    if (!empty($_SESSION['active'])) {
        header('location: ../html/');
    }else {
        
        if (!empty($_POST)) {
            
            if (empty($_POST['usuario']) || empty($_POST['clave'])) {
                $alert = "ingrese su usuario y contraseña.";
            }else{
                require_once "conexion.php";
                
                $user = $_POST['usuario'];
                $pass = $_POST['clave'];
                
                
                $query = mysqli_query($connection, "SELECT * FROM usuario WHERE usuario= '$user' AND clave = '$pass'");
                $result = mysqli_num_rows($query);

                if($result > 0){
                    $data = mysqli_fetch_array($query);
                    print_r($data);
                    print_r($result);
                    
                    $_SESSION['active'] = true;
                    $_SESSION['idUser'] = $data['idusuario'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['user'] = $data['usuario'];
                    $_SESSION['rol'] = $data['rol'];

                    header('location: ../html/'); 
                } else {
                    $alert = 'El usuario o la contraseña son incorrectos.';
                    session_destroy();
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
               
                <!-- modal iniciar sesion-->
                <div class="modal-content px-4">
                    <div class="modal-body px-4">
                        <div class="form-title text-center pb-4">
                            <h4>Inicio de sesión</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form method="post" action="">
                                <div class="form-group pb-3">
                                    <input type="text" name="usuario" class="form-control" id="usuario1" placeholder="Ingresa tu usuario" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="clave" class="form-control" id="password1" placeholder="Ingresa tu contraseña" required>
                                    <div class="alert text-danger">
                                        <?php echo isset($alert)? $alert : ''; ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-round">Iniciar sesión</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-start">
                        <div class="signup-section">No tengo cuenta, quiero <a href="../html/registro.html" class="text-primary"> registrarme</a>.</div>
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