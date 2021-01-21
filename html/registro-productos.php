
<?php

    include"../php/conexion.php";

    if(!empty($_POST)){

        $alert='';
        if(empty($_POST['proveedor']) || empty($_POST['producto']) || empty($_POST['precio']) || empty($_POST['imagen'])  ){

            $alert='<p clave="p-3 mb-2 bg-danger text-white">Todos los campos son obligatorios.</p>';
        }else{
            
            
            $proveedor = $_POST['proveedor'];
            $producto = $_POST['producto'];
            $precio = $_POST['precio'];
            $existencias = 0;
            $foto = $_POST['imagen'];
            
            $query = mysqli_query($connection, "SELECT * FROM producto WHERE descripcion = '$producto' OR foto = '$foto' ");
            $result = mysqli_fetch_array($query);

            if($result > 0){
                $alert='<p clave="p-3 mb-2 bg-danger text-white">El producto ya existe.</p>';
            } else {
                
                $query_insert = mysqli_query($connection, "INSERT INTO producto(descripcion,proveedor,precio,existencia,foto) VALUES('$producto','$proveedor','$precio','$existencias','$foto')");

                if($query_insert){
                    $alert='<p clave="p-3 mb-2 bg-success text-white">Producto agregado correctamente.</p>';
                } else {
                    $alert='<p clave="p-3 mb-2 bg-danger text-white">Error al agregar el producto.</p>';
                }
            }
                
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include "../includes/scripts.php";?>
    <title>Productos</title>

    </head>
    <body class="bg-light">
    <!-- header -->
    <?php include "../includes/header.php";?>
    
    
    <div class="container-fluid">
        <div class="row justify-content-end">
            <?php include "../includes/nav.php"; ?>
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Productos</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="lista-productos.php" class="btn btn-sm btn-outline-secondary">Regresar</a>
                        </div>
                    </div>
                </div>
                
                <!-- Inicia Form-->
                <div class="row g-3">
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Agregar nuevo producto</h4>
                        <form action="" method="POST">
                            <div class="row g-3">
                                
                                <?php 
                                    
                                    $query_proveedor = mysqli_query($connection, "SELECT * FROM proveedor");
                                    $result_proveedor = mysqli_num_rows($query_proveedor);
                                    
                                ?>
                                <div class="col-12">
                                    <label for="proveedor" class="form-label">Proveedor</label>
                                    <select class="form-select" name="proveedor" id="proveedor" required>
                                        <!--<option selected>Selecciona un proveedor</option>-->
                                        <?php 
                                            if($result_proveedor > 0){
                                                while($prov = mysqli_fetch_array($query_proveedor)){
                                        ?>
                                                    <option value="<?php echo $prov["codproveedor"]; ?>"><?php echo $prov["proveedor"]; ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                        
                                    </select>
                                    <div class="invalid-feedback">
                                        Selecciona un proveedor.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="producto" class="form-label">Producto</label>
                                    <input class="form-control" name="producto" id="producto" placeholder="Ingresa el nombre del producto" required>
                                    <div class="invalid-feedback">
                                        Ingresa el nombre del producto.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input class="form-control" name="precio" id="precio" placeholder="Ingresa el precio del producto" required>
                                    <div class="invalid-feedback">
                                        Ingresa el precio del producto.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="precio" class="form-label">Imagen</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="imagen" id="inputGroupFile02" required>
                                        <label class="input-group-text" for="inputGroupFile02">Cargar</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        Selecciona una imagen.
                                    </div>
                                </div>

                            </div>
                            <div>
                                <?php echo isset($alert) ? $alert : ''; ?>
                            </div>
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Agregar producto</button>
                        </form>
                    </div>
                </div>        
                
            </main>
        </div>
    </div>

</body>
</html>