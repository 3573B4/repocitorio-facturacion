<?php  
	$alert = '';
	if (!empty($_POST)) {
		if (empty($_POST['usuario' || empty($_POST['clave'])])) {
			echo $alert="ingrese los campos";
		}else{
			
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login - Facturacion</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">

	<section id="container">
		<form action="" method="post">
			<h3>Iniciar Secion</h3>
			<img src="">
			<input type="text" name="suario" placeholder="Usuario">
			<input type="password" name="clave" placeholder="Contraseña">
			<input type="submit" value="INGRESAR">
			<input>
		</form>
	</section>

</body>
</html>