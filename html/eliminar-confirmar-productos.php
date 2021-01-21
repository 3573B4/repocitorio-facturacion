<?php 
    include"../php/conexion.php";


    if(!empty($_POST)){
        $idproducto = $_POST['idproducto'];

        $query_delete = mysqli_query($connection, "DELETE FROM producto WHERE codproducto = $idproducto");
        //Estatus 0 en lugar de eliminar registro
        //$query_delete = mysqli_query($connection, "UPDATE SET estatus = 0 WHERE codproducto = $idproducto");

        if($query_delete){
            header("location: lista-productos.php");
        } else {
            echo "Error al eliminar el producto";
        }

    }



    if(empty($_REQUEST['id'])){
        header("location: lista-productos.php");
    } else {
        
        $idproducto = $_REQUEST['id'];

        $query = mysqli_query($connection, "SELECT p.descripcion, (pr.proveedor) AS proveedor, p.precio, p.existencia, p.foto FROM producto p INNER JOIN proveedor pr ON p.proveedor = pr.codproveedor WHERE codproducto = $idproducto");
        $result = mysqli_num_rows($query);

        if($result > 0){
            while ($data = mysqli_fetch_array($query)) {
                $producto = $data['descripcion'];
                $proveedor = $data['proveedor'];
                $precio = $data['precio'];
                $existencias = $data['existencia'];
                $img = $data['foto'];
            }
        } else {
            header("location: lista-productos.php");
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../includes/scripts.php";?>
        <title>Eliminar producto</title>
    </head>
    <body>
        <?php include "../includes/header.php";?>

        <div class="container-fluid">
            <div class="row justify-content-end">
                <?php include "../includes/nav.php"; ?>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Eliminar producto</h1>
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
                                                <h6 class="d-block pt-2"><p><?php echo $img; ?></p></h6>
                                            </div>
                                            <div class="userData ml-3">
                                                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><p href="javascript:void(0);"><?php echo $producto; ?></p></h2>
                                                <h6 class="d-block"><p>Precio: <b>$<?php echo $precio; ?></b></p></h6>
                                                <h6 class="d-block"><p>Existencias: <b><?php echo $existencias; ?></b></p></h6>
                                                <h6 class="d-block"><p>Proveedor: <b><?php echo $proveedor; ?></b></p></h6>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <form method="POST" action="">
                                        <input type="hidden" name="idproducto" value="<?php echo $idproducto; ?>">
                                        <a href="lista-productos.php" class="btn btn-secondary">Cancelar</a>
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