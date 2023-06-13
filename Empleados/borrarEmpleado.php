<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

    require_once("configEmpleado.php");

    $record = new Empleado();

    if (isset($_GET["idEmpleado"]) && isset($_GET["req"])){
        if ($_GET["req"] == "delete"){
            $record-> setIdEmpleado($_GET['idEmpleado']);
            $record-> delete();
            echo "<script>alert('Se ha eliminado Exitosamente');document.location='empleado.php'</script>";
        }
    }




?>