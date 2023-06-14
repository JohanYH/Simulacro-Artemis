<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


if (isset($_POST['guardar'])) {
    require_once("configProductos.php");

    $construct = new Productos();

    $construct->setIdCotizacion($_POST['fecha']);
    $construct->setNombreProductos($_POST['nombreProductos']);
    $construct->setCantidadProductos($_POST['cantidadProductos']);
    $construct->setDuracionDia($_POST['duracionDia']);
    $construct->setPrecioDia($_POST['precioDia']);

    $construct->insertProductos();

    echo "<script> alert ('Ha sido registrado');document.location='productos.php'</script>";

}

?>