<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


if (isset($_POST['guardar'])) {
    require_once("configCotizacion.php");

    $construct = new Cotizacion();

    $construct->setIdEmpleado($_POST['nombreEmpleado']);
    $construct->setIdContructura($_POST['nombreConstructora']);
    $construct->setFecha($_POST['fecha']);
    $construct->setTotal($_POST['total']);

    $construct->insertCotizacion();

    echo "<script> alert ('Ha sido registrado');document.location='cotizacion.php'</script>";

}

?>