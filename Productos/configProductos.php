<?php

require_once("../Config/db.php");
require_once("../Config/conectar.php");

class Productos extends Alquiler{
    private $idProductos;
    private $idCotizacion;
    private $nombreProductos;
    private $cantidadProductos;
    private $duracionDia;
    private $precioDia;

    public function __construct($idProductos = 0, $idCotizacion = "", $nombreProductos = "", $cantidadProductos = "", $duracionDia = "", $precioDia = "", $dbCnx = "")
    {
        $this->idProductos = $idProductos;
        $this->idCotizacion = $idCotizacion;
        $this->nombreProductos = $nombreProductos;
        $this->cantidadProductos = $cantidadProductos;
        $this->duracionDia = $duracionDia;
        $this->precioDia = $precioDia;
        parent::__construct($dbCnx);

    }

    public function setIdProductos($idProductos)
    {
        $this->idProductos = $idProductos;
    }

    public function getIdProductos()
    {
        $this->idProductos;
    }

    public function setIdCotizacion($idCotizacion)
    {
        $this->idCotizacion = $idCotizacion;
    }

    public function getIdCotizacion()
    {
        $this->idCotizacion;
    }


    public function setNombreProductos($nombreProductos)
    {
        $this->nombreProductos = $nombreProductos;
    }

    public function getNombreProductos()
    {
        $this->nombreProductos;
    }

    public function setCantidadProductos($cantidadProductos)
    {
        $this->cantidadProductos = $cantidadProductos;
    }

    public function getCantidadProductos()
    {
        $this->cantidadProductos;
    }

    public function setDuracionDia($duracionDia)
    {
        $this->duracionDia = $duracionDia;
    }

    public function getDuracionDia()
    {
        $this->duracionDia;
    }

    public function setPrecioDia($precioDia)
    {
        $this->precioDia = $precioDia;
    }

    public function getPrecioDia()
    {
        $this->precioDia;
    }


    public function insertProductos()
    {
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO productos (idCotizacion,nombreProductos,cantidadProductos, duracionDia, precioDia) values(?,?,?,?,?)");
            $stm -> execute([$this->idCotizacion, $this->nombreProductos, $this->cantidadProductos, $this->duracionDia, $this->precioDia]);
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    public function selectProductos()
    {
        try {
            $stm = $this->dbCnx->prepare ("SELECT productos.idProductos, cotizacion.fecha, productos.nombreProductos,productos.cantidadProductos, productos.duracionDia, productos.precioDia FROM productos
            INNER JOIN cotizacion ON productos.idCotizacion = cotizacion.idCotizacion");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    //Select

    public function selectC()
    {
        try {
            $stm = $this->dbCnx->prepare("SELECT idCotizacion,fecha FROM cotizacion");
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    //Eliminar

    public function delete()
    {
        try {
            $stm = $this->dbCnx->prepare ("DELETE FROM productos WHERE idProductos = ?");
            $stm -> execute([$this->idProductos]);
            return $stm -> fetchAll();
        } catch (Expection $e) {
            return $e ->getMessage();
        }
    }

    //Editar

    public function selectOneProductos()
    {
        try {
            $stm = $this->dbCnx->prepare ("SELECT * FROM productos WHERE idProductos =?");
            $stm->execute([$this->idProductos]);
            return $stm -> fetchAll();
        } catch (Expection $e) {
            return $e ->getMessage();
        }
    }

    public function update()
    {
        try {
            $stm = $this->dbCnx->prepare("UPDATE productos SET idCotizacion = ?, nombreProductos =?, cantidadProductos = ?, duracionDia = ?, precioDia = ? WHERE idProductos = ?");
            $stm -> execute([$this->idCotizacion, $this->nombreProductos,$this->cantidadProductos,$this->duracionDia,$this->precioDia, $this->idProductos]);
        } catch (Expection $e) {
            return $e ->getMessage();
        }
    }
}

?>