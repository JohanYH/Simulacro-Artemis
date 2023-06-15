<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

session_start();

if (isset($_POST['Iniciar'])) {
    require_once("LoginUser.php");

    $personas = new LoginUser();
    
    $personas->setEmail($_POST['email']);
    $personas->setPassword($_POST['password']);

    $login = $personas->EntradaUsuarios();

    if ($login) {
        header('Location: ../Home/home.php');
    }else {
        echo "<script>alert('Invalido');document.location='Registrarse.php'</script>";
    }
}


    
?>