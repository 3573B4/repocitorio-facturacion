<?php

    include"../php/conexion.php";

    if(!empty($_POST)){

        $alert='';
        if(empty($_POST['ape_pate']) || empty($_POST['ape_mate']) || empty($_POST['nombres']) || empty($_POST['correo']) || empty($_POST['user']) ){

            $alert='<div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                            Todos los campos son obligatorios.
                        </div>
                    </div>';
        }else{
            if($_POST['clave'] != $_POST['confirmar-password']) {
                $alert='<p clave="text-danger">Las contraseñas no coinciden.</p>';
            } else {

                $idUsuario = $_POST['idUsuario'];
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

                $query = mysqli_query($connection, "SELECT * FROM usuario 
                                                    WHERE (usuario = '$user' AND idusuario != $idUsuario) 
                                                    OR (correo = '$email' AND idusuario != $idUsuario) ");
                $result = mysqli_fetch_array($query);

                if($result > 0){
                    $alert='<div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">
                        El correo o el usuario ya existe.
                    </div>
                </div><p clave="text-danger">El correo o el usuario ya existe.</p>';
                } else {

                    if (empty($_POST['clave'])) {
                        $sql_update = mysqli_query($connection, "UPDATE usuario
                                                                    SET ape_pate='$ape_pate', ape_mate='$ape_mate', nombres='$nombres', correo='$email', usuario='$user', sexo='$sexo', edad='$edad', telefono='$telefono', rol='$rol'
                                                                    WHERE idusuario = $idUsuario");
                    } else {
                        $sql_update = mysqli_query($connection, "UPDATE usuario
                                                                    SET ape_pate='$ape_pate', ape_mate='$ape_mate', nombres='$nombres', correo='$email', usuario='$user', clave='$clave', sexo='$sexo', edad='$edad', telefono='$telefono', rol='$rol'
                                                                    WHERE idusuario = $idUsuario");
                    }
                    if($sql_update){
                        $alert='<div class="toast d-flex align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                            Usuario actualizado correctamente.
                        </div>
                    </div><p clave="text-success">Usuario Actualizado correctamente.</p>';
                    } else {
                        $alert='<div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                        Error al actualizar el usuario.
                        </div>
                    </div><p clave="text-danger">Error al actualizar el usuario.</p>';
                    }
                }
            }
        }

    }

    //inicia editar usuario mostrar datos 
    if(empty($_GET['id'])) {
        header('Location: lista_usuarios.php');
    }
    $iduser = $_GET['id'];

    $sql = mysqli_query($connection,"SELECT u.idusuario, u.ape_pate, u.ape_mate, u.nombres, u.correo, u.usuario, u.sexo, u.edad, u.telefono, (u.rol) as idrol, (r.rol) as rol
                                    FROM usuario u
                                    INNER JOIN rol r
                                    on u.rol = r.idrol
                                    WHERE idusuario=$iduser");
    $result_sql = mysqli_num_rows($sql);
    if ($result_sql == 0) {
        header('Location: lista_usuarios.php');
    }else {
        $option= '';
        while ($data = mysqli_fetch_array($sql)) {
            $iduser = $data['idusuario'];
            $ape_pate=$data['ape_pate'];
            $ape_mate=$data['ape_mate'];
            $nombres = $data['nombres'];
            $correo = $data['correo'];
            $usuario = $data['usuario'];
            $sexo = $data['sexo'];
            $edad = $data['edad'];
            $telefono = $data['telefono'];
            $idrol = $data['idrol'];
            $rol = $data['rol'];

            if ($idrol == 1) {
                $option = '<option value="'.$idrol.'" selected hidden>'.$rol.'</option>';
            }else if ($idrol == 2) {
                $option = '<option value="'.$idrol.'" selected hidden>'.$rol.'</option>';
            }else if ($idrol == 3) {
                $option = '<option value="'.$idrol.'" selected hidden>'.$rol.'</option>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <?php include "../includes/scripts.php";?>
    <title>Editar perfil</title>
</head>
    <body class="bg-light">

        <?php include "../includes/header.php"; ?>        
        
        <div class="container-fluid">
            <div class="row justify-content-end">
                <?php include "../includes/nav.php"; ?>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> 
                    <h2 class="h2">Menu de Usuario</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="crear_usuario.php" class="btn btn-sm btn-outline-secondary">Crear Usuario</a>
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
                                        <h4>Actualizar Usuario</h4>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="ape_pate">Apellido Paterno </label>
                                            <input type="text" class="form-control" name="ape_pate" id="ape_pate" aria-describedby="emailHelp" value="<?php echo $ape_pate ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="ape_mate">Apellido Materno</label>
                                            <input type="text" class="form-control" name="ape_mate" id="ape_mate" aria-describedby="emailHelp" value="<?php echo $ape_mate ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="idUsuario" value="<?php echo $iduser; ?>">
                                            <label for="nombres">Nombres</label>
                                            <input type="text" class="form-control" name="nombres" id="nombres" aria-describedby="emailHelp" value="<?php echo $nombres ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="correo">Correo electronico</label>
                                            <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" value="<?php echo $correo ?>" required>
                                            <div class="invalid-feedback">
                                                Ingresa un correo válido.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="user">Usuario</label>
                                            <input type="text" class="form-control" name="user" id="usuario" aria-describedby="usuario" value="<?php echo $usuario ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="clave">Contraseña</label>
                                            <input type="password" class="form-control" name="clave" id="clave" placeholder="Mínimo 8 caracteres">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmar-password">Confirmar contraseña</label>
                                            <input type="password" class="form-control" name="confirmar-password" id="confirmar-password" placeholder="confirmar contraseña">
                                            <div class="invalid-feedback">
                                                Las contraseñas no coinciden.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="sexo">Sexo</label>
                                                <input type="text" class="form-control" name="sexo" id="sexo" aria-describedby="emailHelp" value="<?php echo $sexo ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edda">Edad</label>
                                                <input type="text" class="form-control" name="edad" id="edad" aria-describedby="emailHelp" value="<?php echo $edad ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono">Nomero Telefonico</label>
                                                <input type="text" class="form-control" name="telefono" id="telefono" aria-describedby="emailHelp" value="<?php echo $telefono ?>" required>
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
                                        <button type="submit" class="btn btn-primary btn-block">Actualizar Usuario</button>
                                    </form>
                                    
                                </div>
                            </div>
                            <!--aqui termina la card osea la plantilla -->
                        </div>
                    </div>
                </div>

                </main>
            </div>
        </div>

        <!-- javascript -->
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>