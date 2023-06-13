<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("config.php");

$record = new Constructora();

if (isset($_GET["idContructura"]) && isset($_GET["req"])) {
    if ($_GET["req"] == "delete") {
        $record-> setIdContructura($_GET["idContructura"]);
        $record-> delete();
        echo "<script>alert('Se ha eliminado Exitosamente');document.location='constructora.php'</script>";
    }
}




?>