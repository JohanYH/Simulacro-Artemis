<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

if (isset($_POST['Registrar'])) {
    require_once("Registro.php");

    $nuevoUser = new Registrar();

    $nuevoUser->setIdUser(1);
    $nuevoUser->setUsuario($_POST['usuario']);
    $nuevoUser->setEmail($_POST['email']);
    $nuevoUser->setPassword($_POST['password']);

    if ($nuevoUser->check($_POST['email'])) {
        echo "<script>alert ('Usuario Existente');document.location='Registrarse.php'</script>";
    } else {
        $nuevoUser->insertData();
        echo "<script>alert('Usuario Creado');document.location='../Constructoras/constructora.php'</script>";
    }
}

?>