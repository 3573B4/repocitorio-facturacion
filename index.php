<!DOCTYPE html>
<html>
<head>
	<title>Login - Facturacion</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body class="bg-light">
    <!-- header -->
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm"> 
        <img class="d-block mr-3" src="img/logo-playeras.jpeg" width="40" height="40">
        <h5 class="mg-0 mr-md-auto font-weight-bold">Playeras</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a href="html/registro.html" class="p-2 text-dark">Registrarme</a>
        </nav>
        <a class="btn btn-primary text-white" data-toggle="modal" data-target="#loginModal">Iniciar Sesión</a>
    </div>

    <!-- IMAGEN -->
	<header class="main-header">
		<div class="background-overlay text-white p-5">
			<div class="container">
				<div class="row justify-content-center">
					<div class="text-center justify-content-center align-self-center p-5">
						<h1 class="p-2 m-5 text-primary">Playeras</h1>
						<h3>Playeras personalizadas</h3>
						<p class="p-3">Encuentra las playeras de tu elección y escoge el estampado que te guste. </p>
						<a class="btn btn-primary btn-lg text-white m-3" data-toggle="modal" data-target="#loginModal">
							Comprar
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>

    <!-- modal iniciar sesion-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content px-4">
				<div class="modal-header border-bottom-0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body px-4">
					<div class="form-title text-center pb-4">
						<h4>Login</h4>
					</div>
					<div class="d-flex flex-column text-center">
						<form method="post" target="_blank" action="php/login.php">
							<div class="form-group pb-3">
								<input type="text" name="suario" class="form-control" id="email1" placeholder="Ingresa tu usuario">
							</div>
							<div class="form-group pb-3">
								<input type="password" name="clave" class="form-control" id="password1" placeholder="Ingresa tu contraseña">
							</div>
							<button type="button" class="btn btn-primary btn-block btn-round">Login</button>
						</form>
					</div>
				</div>
            	<div class="modal-footer d-flex justify-content-center">
                	<div class="signup-section">No tengo cuenta, quiero <a href="html/registro.html" class="text-primary"> registrarme</a>.</div>
            	</div>
			</div>	
        </div>
    </div>

	<section id="container">
		<form action="" method="post">
			<h3>Iniciar Secion</h3>
			<img src="">
			<input type="text" name="suario" placeholder="Usuario">
			<input type="password" name="clave" placeholder="Contraseña">
			<input type="submit" value="INGRESAR">
		</form>
	</section>
    <!-- javascript -->
	<script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>