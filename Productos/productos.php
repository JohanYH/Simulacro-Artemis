<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("configProductos.php");

$datos = new Productos();

$all = $datos ->selectProductos();

$cotizacion = $datos->selectC();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Productos</title>
    <link rel="stylesheet" href="../Css/estilos.css">
</head>
<body>
    <div class="contenedor">

        <div class="parte-izquierda">
    
          <div class="perfil">
            <h3 style="margin-bottom: 2rem;">Productos</h3>
            <img src="#" alt="" class="imagenPerfil">
            <h3>Hola</h3>
          </div>
          <div class="menus">
          <a href="../Home/home.php" style="display: flex;gap:2px;">
              <i class="bi bi-house-door"></i>
              <h3 style="margin: 4px;">Home</h3>
            </a>
            <a href="#" style="display: flex;gap:1px;">
              <i class="bi bi-calendar-plus"></i>
              <h3 style="margin: 8px;font-weight: 800;">Constructora</h3>
            </a>
            <a href="../Empleados/empleado.php" style="display: flex;gap:1px;">
              <i class="bi bi-people"></i>
              <h3 style="margin: 8px;">Empleado</h3>
            </a>
            <a href="../Cotizaciones/cotizacion.php" style="display: flex;gap:1px;">
              <i class="bi bi-person-circle"></i>
              <h3 style="margin: 8px;">Cotizaciones</h3>
            </a>
            <a href="../Productos/productos.php" style="display: flex;gap:1px;">
              <i class="bi bi-shop"></i>
              <h3 style="margin: 8px;">Productos</h3>
            </a>
          </div>
        </div>
    
        <div class="parte-media">
          <div style="display: flex; justify-content: space-between;">
            <h2>Productos</h2>
            <button class="btn-m" data-bs-toggle="modal" data-bs-target="#registrarProductos"><i class="bi bi-person-add " style="color: rgb(255, 255, 255);" ></i></button>
          </div>
          <div class="menuTabla contenedor2">
            <table class="table table-custom ">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombres Productos</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Duracion</th>
                  <th scope="col">Precio Dia</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Eliminar</th>
                  <th scope="col">Editar</th>
                </tr>
              </thead>
              <tbody class="" id="tabla">
    
                <!-- ///////Llenado DInamico desde la Base de Datos  -->
                <?php
    
                  foreach($all as $key => $val){
    
    
    
                ?>
                <tr>
                  <td><?php echo $val['idProductos']?></td>
                  <td><?php echo $val['nombreProductos']?></td>
                  <td><?php echo $val['cantidadProductos']?></td>
                  <td><?php echo $val['duracionDia']?></td>
                  <td><?php echo $val['precioDia']?></td>
                  <td><?php echo $val['fecha']?></td>
                  <td>
                    <a class="btn btn-danger" href="borrarProductos.php?idProductos=<?=$val['idProductos']?>&req=delete">Borrar</a>
                  </td>
                  <td>
                    <a class="btn btn-warning" href="editarProductos.php?idProductos=<?=$val['idProductos']?>">Editar</a>
                  </td>
                </tr>
                <?php
                 }
                ?> 
    
              </tbody>
              
            </table>
    
          </div>
    
    
        </div>

    
    
    
    
    
        <!-- /////////Modal de registro de nuevo estuiante //////////-->
        <div class="modal fade" id="registrarProductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(5px)">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" >
            <div class="modal-content" >
              <div class="modal-header" >
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevos Productos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="background-color: rgb(231, 253, 246);">
                <form class="col d-flex flex-wrap" action="registrarProductos.php" method="post">
                  <div class="mb-1 col-12">
                    <label for="nombres" class="form-label">Nombre Productos</label>
                    <input 
                      type="text"
                      id="nombreProductos" 
                      name="nombreProductos"
                      class="form-control"  
                    />
                  </div>
    
                  <div class="mb-1 col-12">
                    <label for="direccion" class="form-label">Cantidad</label>
                    <input 
                      type="text"
                      id="cantidadProductos"
                      name="cantidadProductos"
                      class="form-control"  
                    />
                  </div>
                  <div class="mb-1 col-12">
                    <label for="direccion" class="form-label">Duracion</label>
                    <input 
                      type="time"
                      id="duracionDia"
                      name="duracionDia"
                      class="form-control"  
                    />
                  </div>
                  <div class="mb-1 col-12">
                    <label for="direccion" class="form-label">Precio Dia</label>
                    <input 
                      type="text"
                      id="precioDia"
                      name="precioDia"
                      class="form-control"  
                    />
                  </div>
                  <div class="mb-1 col-12">
                    <label for="direccion" class="form-label">Fecha</label>
                      <select name="fecha" id="fecha" class="form-control">
                        <?php
                          foreach ($cotizacion as $cotizaciones){
                           $idCotizacion = $cotizaciones['idCotizacion'];
                           $Fecha = $cotizaciones['fecha'];
                          
                        ?>
                        <option value="<?php echo intval($idCotizacion) ?>"><?php echo $Fecha ?></option>
                        <?php
                          }
                        ?>
                      </select>
                  </div>
                  
    
                  <div class=" col-12 m-2">
                    <input type="submit" class="btn btn-primary" value="guardar" name="guardar"/>
                  </div>
                </form>  
             </div>       
            </div>
          </div>
        </div>
    
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
          crossorigin="anonymous"></script>
</body>
</html>