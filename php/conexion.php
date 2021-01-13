<?php 
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'facturacion';

    $connection = @mysqli_connect($host,$user,$password,$db);

    if(!$connection){
        echo "Error en la conexión";
    }
?>