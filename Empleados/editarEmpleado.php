<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once ("configEmpleado.php");

$datos = new Empleado();

$idEmpleado = $_GET["idEmpleado"];
$datos->setIdEmpleado($idEmpleado);
$record = $datos->selectOneEmpleado();
$val = $record[0];


if (isset($_POST["editar"])) {
    $datos->setNombreEmpleado($_POST["nombreEmpleado"]);
    $datos->setTelefonoEmpleado($_POST["telefonoEmpleado"]);

    $datos->update();
    echo "<script>alert('Los datos ha sido cambiados');document.location='empleado.php'</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Constructora</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="../Css/estilos.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Tipo de Usuario</h3>
        <img src="../images/ana.png" alt="" class="imagenPerfil">
        <h3><?php /* echo $_SESSION["UserName"] */?></h3>
      </div>
      <div class="menus">
        <a href="#" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;font-weight: 800;">Editar</h3>
        </a>
        <a href="#" style="display: flex;gap:2px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;">Empleado</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Editar Empleado</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="nombreEmpleado" class="form-label">Nombre Empleado</label>
                <input 
                  type="text"
                  id="nombreEmpleado"
                  name="nombreEmpleado"
                  class="form-control"
                  value="<?php echo $val["nombreEmpleado"];?>"  
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="telefonoEmpleado" class="form-label">Telefono</label>
                <input 
                  type="text"
                  id="telefonoEmpleado"
                  name="telefonoEmpleado"
                  class="form-control"  
                  value="<?php echo $val["telefonoEmpleado"]; ?>"
                 
                />
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>


  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>