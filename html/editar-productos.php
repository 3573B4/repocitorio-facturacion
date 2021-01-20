
<?php

    include"../php/conexion.php";

    if(!empty($_POST)){

        $alert='';
        if(empty($_POST['proveedor']) || empty($_POST['producto']) || empty($_POST['precio']) || empty($_POST['existencia']) ){

            $alert='<p clave="p-3 mb-2 bg-danger text-white">Todos los campos son obligatorios.</p>';
        }else{
            
            $idproducto = $_POST['idproducto'];
            $proveedor = $_POST['proveedor'];
            $producto = $_POST['producto'];
            $precio = $_POST['precio'];
            $existencia = $_POST['existencia'];
            $foto = $_POST['imagen'];
            
            $query = mysqli_query($connection, "SELECT * FROM producto WHERE (descripcion = '$producto' AND codproducto != $idproducto) OR (foto = '$foto' AND codproducto != $idproducto) ");
            $result = mysqli_fetch_array($query);

            if($result > 0){
                $alert='<p clave="p-3 mb-2 bg-danger text-white">El producto o la foto ya existen.</p>';
            } else {

                if (empty($_POST['imagen'])) {
                    $sql_update = mysqli_query($connection, "UPDATE producto SET descripcion = '$producto', proveedor = '$proveedor', precio = '$precio', existencia = '$existencia' WHERE codproducto = '$idproducto' ");
                } else {
                    $sql_update = mysqli_query($connection, "UPDATE producto SET descripcion = '$producto', proveedor = '$proveedor', precio = '$precio', existencia = '$existencia', foto = '$foto' WHERE codproducto = '$idproducto' ");
                }
                
                if($sql_update){
                    $alert='<p clave="p-3 mb-2 bg-success text-white">Producto actualizado correctamente.</p>';
                } else {
                    $alert='<p clave="p-3 mb-2 bg-danger text-white">Error al actualizar el producto.</p>';
                }
            }
                
        }

    }

    //Mostrar Datos
    if(empty($_GET['id'])){
        header('Location: lista-productos.php');
    }
    $idproduct = $_GET['id'];

    $sql = mysqli_query($connection, "SELECT p.codproducto, p.descripcion, (p.proveedor) AS codproveedor, (pr.proveedor) AS proveedor, p.precio, p.existencia, p.foto FROM producto p INNER JOIN proveedor pr ON p.proveedor = pr.codproveedor WHERE codproducto = $idproduct");
    $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0){
        header('Location: lista-productos.php');
    } else {
        while ($data = mysqli_fetch_array($sql)){

            $idprod = $data['codproducto'];
            $product = $data['descripcion'];
            $idprov = $data['codproveedor'];
            $prov = $data['proveedor'];
            $precio = $data['precio'];
            $existencias = $data['existencia'];
            $foto = $data['foto'];

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/scripts.php";?>
    <title>Actualizar producto</title>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

     <!--Estilos dashboard -->
     <link rel="stylesheet" type="text/css" href="../css/estilos-admin.css">
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
                        <h4 class="mb-3">Actualizar producto</h4>
                        <form action="" method="POST">
                            <div class="row g-3">
                                <input type="hidden" name="idproducto" value="<?php echo $idprod; ?>">
                                <?php 
                                    
                                    $query_proveedor = mysqli_query($connection, "SELECT * FROM proveedor");
                                    $result_proveedor = mysqli_num_rows($query_proveedor);
                                    
                                ?>
                                <div class="col-12">
                                    <label for="proveedor" class="form-label">Proveedor</label>
                                    <select class="form-select" name="proveedor" id="proveedor" required>
                                        <option value="<?php echo $idprov; ?>" selected hidden><?php echo $prov; ?></option> 
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
                                    <input class="form-control" name="producto" id="producto" placeholder="Ingresa el nombre del producto" value="<?php echo $product; ?>" required>
                                    <div class="invalid-feedback">
                                        Ingresa el nombre del producto.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input class="form-control" name="precio" id="precio" placeholder="Ingresa el precio del producto" value="<?php echo $precio; ?>" required>
                                    <div class="invalid-feedback">
                                        Ingresa el precio del producto.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="existencia" class="form-label">Existencias</label>
                                    <input class="form-control" name="existencia" id="existencia" value="<?php echo $existencias; ?>" readonly>
                                </div>

                                <div class="col-12">
                                    <label for="precio" class="form-label">Imagen</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="imagen" id="imagen" value="<?php echo $foto; ?>" required>
                                        <label class="input-group-text" for="imagen">Cargar</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        Selecciona una imagen.
                                    </div>
                                </div>

                            </div>
                            <div>
                                <?php echo isset($alert) ? $alert : ''; ?>
                            </div>
                            <button class="w-100 btn btn-primary btn-lg" type="submit">Actualizar producto</button>
                        </form>
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