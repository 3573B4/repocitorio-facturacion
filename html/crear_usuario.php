
<?php
include"../php/conexion.php";
if(!empty($_POST)){

    $alert='';
    if(empty($_POST['ape_pate']) || empty($_POST['ape_mate']) || empty($_POST['nombres']) || empty($_POST['correo']) || empty($_POST['user']) || empty($_POST['clave']) || empty($_POST['confirmar-password']) || empty($_POST['sexo']) || empty($_POST['edad']) || empty($_POST['telefono']) || empty($_POST['rol']) ){

        $alert='<div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">
                        Todos los campos son obligatorios.
                    </div>
                </div>';
    }else{
        
        if($_POST['clave'] != $_POST['confirmar-password']) {
            $alert='<p clave="text-danger">Las contraseñas no coinciden.</p>';
        } else {

            //aqui  va la conexion a la DB.

            $ape_pate = $_POST['ape_pate'];
            $ape_mate = $_POST['ape_mate'];
            $nombres = $_POST['nombres'];
            $email = $_POST['correo'];
            $user = $_POST['user'];
            $clave = $_POST['clave'];
            $sexo = $_POST['sexo'];
            $edad = $_POST['edad'];
            $telefono = $_POST['telefono'];
            $rol = $_POST['rol'];
            
            //echo $ape_pate. $ape_mate

            $query = mysqli_query($connection, "SELECT * FROM usuario WHERE usuario = '$user' OR correo = '$email' ");
            $result = mysqli_fetch_array($query);

            if($result > 0){
                $alert='<div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    El correo o el usuario ya existe.
                </div>
            </div><p clave="text-danger">El correo o el usuario ya existe.</p>';
            } else {
                
                $query_insert = mysqli_query($connection, "INSERT INTO usuario(ape_pate,ape_mate,nombres,correo,usuario,clave,sexo,edad,telefono,rol) VALUES('$ape_pate','$ape_mate','$nombres','$email','$user','$clave','$sexo','$edad','$telefono','$rol')");

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
        <?php include "../includes/scripts.php";?>
        <title>Crear Usuario</title>
    </head>
    <body class="bg-light">
         <?php include "../includes/header.php";?>

        <div class="container-fluid">
            <div clas="row justify-content-end">
                <?php include "../includes/nav.php"; ?>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h2 class="h2">Crear Usuario</h2>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <a href="lista_usuarios.php" class="btn btn-sm btn-outline-secondary">Regresar</a>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row justify-content-center pt-5">
                            <div class="col col-lg-6 col-sm-10">
                                <!-- Inicia Card-->
                                <div class="modal-content px-4">
                                    <div class="modal-body px-4">
                                        <div class="form-title text-center pb-4">
                                            <h4>Crear Usuario</h4>
                                        </div>
                                        <form action="" method="POST">
                                            
                                            <div class="form-group">
                                                <label for="ape_pate">Apellido Paterno </label>
                                                <input type="text" class="form-control" name="ape_pate" id="ape_pate" aria-describedby="emailHelp" placeholder="Ingrese su apellido paterno" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ape_mate">Apellido Materno</label>
                                                <input type="text" class="form-control" name="ape_mate" id="ape_mate" aria-describedby="emailHelp" placeholder="Ingrese su apellido materno" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombres">Nombres</label>
                                                <input type="text" class="form-control" name="nombres" id="nombres" aria-describedby="emailHelp" placeholder="Ingrese sus nombres" required>
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
                                            <div class="form-group">
                                                <label for="sexo">Sexo</label>
                                                <input type="text" class="form-control" name="sexo" id="sexo" aria-describedby="emailHelp" placeholder="Ingrese 'M' de Masculino o 'F' de Femenino" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edda">Edad</label>
                                                <input type="text" class="form-control" name="edad" id="edad" aria-describedby="emailHelp" placeholder="Ingrese sus años cumplidos" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono">Nomero Telefonico</label>
                                                <input type="text" class="form-control" name="telefono" id="telefono" aria-describedby="emailHelp" placeholder="Ingrese su nomero telefonico" required>
                                            </div>
                                            <div form-group>
                                            <label for="rol">Tipo de Usuario</label>
                                            </div>
                                            <div>
                                            <?php 
                                                $query_rol = mysqli_query($connection, "SELECT * FROM rol");
                                                $result_rol = mysqli_num_rows($query_rol);
                                            ?>
                                            <select name ="rol" id ="rol" class="notItemOne">
                                                <?php 
                                                    echo $option;
                                                    if ($result_rol > 0) {
                                                        while ($rol = mysqli_fetch_array($query_rol)) {
                                                ?>
                                                            <option value ="<?php echo $rol['idrol']; ?>"><?php echo $rol['rol']; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            
                                            </select>
                                        </div>
                                            <div class="alert">
                                                <?php echo isset($alert) ? $alert : ''; ?>
                                            </div>
                                            <button type="submit" value="registrar" class="btn btn-primary btn-block">Registrar</button>
                                        </form>
                                        <hr/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </main>

            </div>
        </div>


        <?php include "../includes/footer.php"; //para el pie de pagina ?>
    </body>
</html>