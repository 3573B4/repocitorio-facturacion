<?php  
	$alert = '';
	if (!empty($_POST)) {
		if (empty($_POST['usuario'])  || empty($_POST['clave'])) {
			$alert="ingrese los campos";
		}else{
			
			require_once "../database/database.php";
			$user= $_POST['usuario'];
			$pass= $_POST['clave'];

			$query = mysqli_query($conn,"SELECT * FROM usuario WHERE usuario= '$user' AND clave='$pass'");
			$result = mysqli_num_rows($query);

			if ($result>0) {
				$data = mysqli_fetch_array($query);
				#print_r($data);
				session_start();
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['idusuario'];
				$_SESSION['idUser'] = $data['nombre'];
				$_SESSION['idUser'] = $data['correo'];
				$_SESSION['idUser'] = $data['usuario'];
				$_SESSION['idUser'] = $data['rol'];

				header('location: ../html/sistema.html');
			}else {
				$alert="El Usuario o la Contraseña son incorrectas";
				
			}

		}
	}
?>