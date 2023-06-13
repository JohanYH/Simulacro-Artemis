<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


if (isset($_POST['guardar'])) {
    require_once("../Constructoras/config.php");

    $construct = new Constructora();

    $construct->setNombreConstructora($_POST['nombreConstructora']);
    $construct->setTelefonoConstructora($_POST['telefonoConstructora']);

    $construct->insertConstrutora();

    echo "<script> alert ('Ha sido registrado');document.location='constructora.php'</script>";

}

?>