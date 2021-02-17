
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
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Nombres</th>
                                <th>Correo Electronico</th>
                                <th>Usuarios</th>
                                <th>Sexo</th>
                                <th>Edad</th>
                                <th>Telefono</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                    <?php
                        
                        $query = mysqli_query($connection, "SELECT u.idusuario, u.ape_pate, u.ape_mate, u.nombres, u.correo, u.usuario, u.sexo, u.edad, u.telefono, r.rol 
                                                            FROM usuario u 
                                                            INNER JOIN rol r 
                                                            ON u.rol = r.idrol 
                                                            WHERE estatus = 1");
                        $result = mysqli_num_rows($query);

                        if ($result > 0) {
                            while ($data = mysqli_fetch_array($query)) {
                    ?>
                                    
                            <tr>
                                <td><?php echo $data['idusuario']; ?></td>
                                <td><?php echo $data['ape_pate']; ?></td>
                                <td><?php echo $data['ape_mate']; ?></td>
                                <td><?php echo $data['nombres']; ?></td>
                                <td><?php echo $data['correo']; ?></td>
                                <td><?php echo $data['usuario']; ?></td>
                                <td><?php echo $data['sexo']; ?></td>
                                <td><?php echo $data['edad']; ?></td>
                                <td><?php echo $data['telefono']; ?></td>
                                <td><?php echo $data['rol']; ?></td>
                                <td>

                                    <a class="btn btn-outline-dark btn-sm" type="botton" href="editar_usuario.php?id=<?php echo $data['idusuario']; ?>">Editar</a>

                                        <?php if ($data['idusuario'] != 1) { ?>

                                    <a class="btn btn-outline-danger btn-sm" type="botton" href="eliminar_confirmar_usuario.php?id=<?php echo $data['idusuario']; ?>">Eliminar</a>
                                        <?php } ?>
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
    </body>
</html>