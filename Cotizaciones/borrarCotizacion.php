<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("configCotizacion.php");

    $record = new Cotizacion();

    if (isset($_GET["idCotizacion"]) && isset($_GET["req"])){
        if ($_GET["req"] == "delete"){
            $record-> setIdCotizacion($_GET['idCotizacion']);
            $record-> delete();
            echo "<script>alert('Se ha eliminado Exitosamente');document.location='cotizacion.php'</script>";
        }
    }




?>