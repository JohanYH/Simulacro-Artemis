<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


if (isset($_POST['guardar'])) {
    require_once("configEmpleado.php");

    $construct = new Empleado();

    $construct->setNombreEmpleado($_POST['nombreEmpleado']);
    $construct->setTelefonoEmpleado($_POST['telefonoEmpleado']);

    $construct->insertEmpleado();

    echo "<script> alert ('Ha sido registrado');document.location='empleado.php'</script>";

}

?>