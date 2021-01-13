<?php  


	$alert = '';
	if (!empty($_POST)) {
        
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
			echo $alert="ingrese los campos";
		}else{
            require_once "conexion.php";
            
            $user = $_POST['usuario'];
			$pass = $_POST['clave'];
			
            //echo "Hola ".$user."<br/>Hemos recibido tu contraseña:<br/>".$pass;
            $query = mysqli_query($connection, "SELECT * FROM usuario WHERE usuario= '$user' AND clave = '$pass'");
            $result = mysqli_num_rows($query);

            if($result > 0){
                $data = mysqli_fetch_array($query);
                print_r($data);
                print_r($result);
                session_start();
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['idusuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['user'] = $data['usuario'];
                $_SESSION['rol'] = $data['rol'];

                header('location: ../html/'); 
            } else {
                print_r("Datos incorrectos");
                $alert = 'El usuario o la clave son incorrectos';
                //session_destroy();
            }
		}
	}
?>