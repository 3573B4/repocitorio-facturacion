<?php 
    include"../php/conexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/scripts.php";?>
    <title>Productos</title>

    <!--Estilos dashboard -->
     <link rel="stylesheet" type="text/css" href="../css/estilos-admin.css">
    </head>
    <body>
        <?php include "../includes/header.php";?>

        <div class="container-fluid">
            <div class="row justify-content-end">
                <?php include "../includes/nav.php"; ?>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Productos</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <a href="registro-productos.php" class="btn btn-sm btn-outline-secondary">Nuevo producto</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Proveedor</th>
                            <th>Precio</th>
                            <th>Existencias</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = mysqli_query($connection, "SELECT p.codproducto, p.descripcion, pr.proveedor, p.precio, p.existencia, p.foto FROM producto p INNER JOIN proveedor pr ON p.proveedor = pr.codproveedor");
                                $result = mysqli_num_rows($query);

                                if ($result > 0) {
                                    while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                            <td><?php echo $data['codproducto']; ?></td>
                            <td><?php echo $data['descripcion']; ?></td>
                            <td><?php echo $data['proveedor']; ?></td>
                            <td><?php echo $data['precio']; ?></td>
                            <td><?php echo $data['existencia']; ?></td>
                            <td><?php echo $data['foto']; ?></td>
                            <td>
                                <a class="btn btn-outline-dark btn-sm" href="editar-productos.php?id=<?php echo $data['codproducto']; ?>">Editar</a>
                                <a class="btn btn-outline-danger btn-sm" href="eliminar-confirmar-productos.php?id=<?php echo $data['codproducto']; ?>">Eliminar</a>
                            </td>
                            </tr>
                            <?php

                                    }
                                }
                                
                            ?>
                        </tbody>
                    </table>
                </main>
            </div>
        </div>    
        
        <?php include "../includes/footer.php"; //para el pie de pagina ?>

    </body>
</html>