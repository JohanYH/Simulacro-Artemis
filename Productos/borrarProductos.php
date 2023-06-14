<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("configProductos.php");

    $record = new Productos();

    if (isset($_GET["idProductos"]) && isset($_GET["req"])){
        if ($_GET["req"] == "delete"){
            $record-> setIdProductos($_GET['idProductos']);
            $record-> delete();
            echo "<script>alert('Se ha eliminado Exitosamente');document.location='productos.php'</script>";
        }
    }




?>