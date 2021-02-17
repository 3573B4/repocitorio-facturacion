<?php
    include "../php/conexion.php";

    if (!empty($_POST)) {
        $idusuario = $_POST['idusuario'];

        //$query_delete = mysqli_query($connection, "DELETE FROM usuario WHERE idusuario = $idusuario");
        $query_delete = mysqli_query($connection, "UPDATE usuario SET estatus = 0 WHERE idusuario = $idusuario");

        if ($query_delete) {
            header("location: lista_usuarios.php");
        }else {
            echo "error al eliminar";
        }
    }

    if (empty($_REQUEST['id']) || $_REQUEST['id'] == 1) {
        header("location: lista_usuarios.php");
    }else {
        

        $idusuario = $_REQUEST['id'];

        $query = mysqli_query($connection, "SELECT u.ape_pate, u.ape_mate, u.nombres, u.correo, u.usuario, u.sexo, u.edad, u.telefono, r.rol
                                            FROM usuario u
                                            INNER JOIN
                                            rol r
                                            ON u.rol = r.idrol
                                            WHERE u.idusuario = $idusuario");

        $result = mysqli_num_rows($query);
        if ($result > 0) {
            while ($data = mysqli_fetch_array($query)) {
                $nombres = $data['nombres'];
                $usuario = $data['usuario'];
                $rol = $data['rol'];
            }
        }else {
            header("location: lista_usuario.php");
        }
    }

    

?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<?php include "../includes/scripts.php";?>
<title>Eliminar Usuario</title>
</head>
<body>

    <?php include "../includes/header.php";?>

    <div class="container-fluid">
        <div class="row justify-content-end">
            <?php include "../includes/nav.php"; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> 
                <h2 class="h2">eliminar Usuarios</h2>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="crear_usuario.php" class="btn btn-sm btn-outline-secondary">Crear Usuario</a>
                    </div>
                </div>
            </div>
           <!-- Inica card -->
           <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="card-title mb-4">
                            <h4 class="mb-3">¿Seguro que quieres eliminar este producto?</h4>
                                <div class="d-flex justify-content-start">
                                    <div class="image-container">
                                        <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                        <!--<h6 class="d-block pt-2"><p><?php echo $img; ?></p></h6>-->
                                    </div>
                                    <div class="userData ml-3">
                                        <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><p href="javascript:void(0);">Nombre:<?php echo $nombres; ?></p></h2>
                                        <!--<h6 class="d-block"><p>Nombre: <b><?php //echo $nombre; ?></b></p></h6>-->
                                        <h6 class="d-block"><p>Usuario: <b><?php echo $usuario; ?></b></p></h6>
                                        <h6 class="d-block"><p>Tipo de Rol: <b><?php echo $rol; ?></b></p></h6>
                                    </div>
                                </div>
                                
                            </div>
                            <form method="POST" action="">
                                <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                                <a href="lista_usuarios.php" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" value="Aceptar" class="btn btn-primary">
                            </form>
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