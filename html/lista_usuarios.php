
<?php 

    include "../php/conexion.php";

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <?php include "../includes/scripts.php";?>
    <title>Lista de Usuarios</title>
</head>
    <body>
    
        <?php include "../includes/header.php";?>

        <div class="container-fluid">
            <div class="row justify-content-end">
                <?php include "../includes/nav.php"; ?>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"> 
                    <h2 class="h2">Lista de Usuarios</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="crear_usuario.php" class="btn btn-sm btn-outline-secondary">Crear Usuario</a>
                        </div>
                    </div>
                </div>
                <!-- inicia la tabla de usuarios -->
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Contador</th>
                                <th>Nombre Completo</th>
                                <th>Correo Electronico</th>
                                <th>Usuarios</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                    <?php
                        
                        $query = mysqli_query($connection, "SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol");
                        $result = mysqli_num_rows($query);

                        if ($result > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                    ?>
                                    
                            <tr>
                                <td><?php echo $data['idusuario']; ?></td>
                                <td><?php echo $data['nombre']; ?></td>
                                <td><?php echo $data['correo']; ?></td>
                                <td><?php echo $data['usuario']; ?></td>
                                <td><?php echo $data['rol']; ?></td>
                                <td>

                                    <a class="btn btn-outline-dark btn-sm" type="botton" href="editar_usuario.php?id=<?php echo $data['idusuario']; ?>">Editar</a>
                                    <a class="btn btn-outline-danger btn-sm" type="botton" href="#">Eliminar</a>
                                
                                </td>
                            </tr>
                    <?php

                            }
                        }
                        
                    ?>

                            
                            
                        </tbody>
                    </table>
                </div>
                    
                </main>
            </div>
        </div>
        <?php include "../includes/footer.php"; //para el pie de pagina ?>
        <!--<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>-->
        <!--<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>-->
        
    </body>
</html>