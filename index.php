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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body class="bg-light">
    <!-- header -->
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm"> 
        <img class="d-block mr-3" src="img/logo-playeras.jpeg" width="40" height="40">
        <h5 class="mg-0 mr-md-auto font-weight-bold">Playeras</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark">Registrarme</a>
        </nav>
        <a class="btn btn-primary text-white" data-toggle="modal" data-target="#myModal">Iniciar Sesión</a>
        <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">
    </div>

    <!-- IMAGEN -->
	<header class="main-header">
		<div class="background-overlay text-white p-5">
			<div class="container">
				<div class="row">
					<div class="text-center justify-content-center align-self-center p-5">
						<h1 class="p-2 m-5 text-primary">Playeras</h1>
						<h3>Lorem ipsum</h3>
						<p class="p-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur temporibus sed vero tempore reiciendis assumenda voluptatibus blanditiis id quos magni animi, doloremque optio qui delectus, suscipit alias eius inventore deserunt. </p>
						<a href="login.html" class="btn btn-primary btn-lg text-white m-3">
							Comenzar
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- modal iniciar sesion-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                <h4>Login</h4>
                </div>
                <div class="d-flex flex-column text-center">
                <form>
                    <div class="form-group">
                    <input type="email" class="form-control" id="email1"placeholder="Your email address...">
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control" id="password1" placeholder="Your password...">
                    </div>
                    <button type="button" class="btn btn-info btn-block btn-round">Login</button>
                </form>
                
                <div class="text-center text-muted delimiter">or use a social network</div>
                <div class="d-flex justify-content-center social-buttons">
                    <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
                    <i class="fab fa-twitter"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                    <i class="fab fa-facebook"></i>
                    </button>
                    <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
                    <i class="fab fa-linkedin"></i>
                    </button>
                </di>
                </div>
            </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Not a member yet? <a href="#a" class="text-info"> Sign Up</a>.</div>
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
    <!-- javascrip 
    <script src="js/modal-iniciar-sesion.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>-->
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>