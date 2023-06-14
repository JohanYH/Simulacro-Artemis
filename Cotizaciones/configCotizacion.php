<?php

require_once("../Config/db.php");
require_once("../Config/conectar.php");

class Cotizacion extends Alquiler{
    private $idCotizacion;
    private $idEmpleado;
    private $idContructura;
    private $fecha;
    private $total;

    public function __construct($idCotizacion = 0, $idEmpleado = "", $idContructura = "", $fecha = "", $total = "", $dbCnx = "")
    {
        $this->idCotizacion = $idCotizacion;
        $this->idEmpleado = $idEmpleado;
        $this->idContructura = $idContructura;
        $this->fecha = $fecha;
        $this->total = $total;
        parent::__construct($dbCnx);

    }

    public function setIdCotizacion($idCotizacion)
    {
        $this->idCotizacion = $idCotizacion;
    }

    public function getIdCotizacion()
    {
        $this->idCotizacion;
    }

    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
    }

    public function getIdEmpleado()
    {
        $this->idEmpleado;
    }

    public function setIdContructura($idContructura)
    {
        $this->idContructura = $idContructura;
    }

    public function getIdContructura()
    {
        $this->idContructura;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFecha()
    {
        $this->fecha;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getTotal()
    {
        $this->total;
    }

    public function insertCotizacion()
    {
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO cotizacion (idEmpleado,idContructura, fecha, total) values(?,?,?,?)");
            $stm -> execute([$this->idEmpleado, $this->idContructura, $this->fecha, $this->total]);
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    public function selectCotizacion()
    {
        try {
            $stm = $this->dbCnx->prepare ("SELECT cotizacion.idCotizacion, empleado.nombreEmpleado, constructoras.nombreConstructora,cotizacion.fecha, cotizacion.total FROM cotizacion
            INNER JOIN empleado ON cotizacion.idEmpleado = empleado.idEmpleado
            INNER JOIN constructoras ON cotizacion.idContructura = constructoras.idContructura");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    //Select

    public function selectE()
    {
        try {
            $stm = $this->dbCnx->prepare("SELECT idEmpleado,nombreEmpleado FROM empleado ");
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    public function selectC()
    {
        try {
            $stm = $this->dbCnx->prepare("SELECT idContructura,nombreConstructora FROM constructoras");
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
            $stm = $this->dbCnx->prepare ("DELETE FROM cotizacion WHERE idCotizacion = ?");
            $stm -> execute([$this->idCotizacion]);
            return $stm -> fetchAll();
        } catch (Expection $e) {
            return $e ->getMessage();
        }
    }

    //Editar

    public function selectOneCotizacion()
    {
        try {
            $stm = $this->dbCnx->prepare ("SELECT * FROM cotizacion WHERE idCotizacion =?");
            $stm->execute([$this->idCotizacion]);
            return $stm -> fetchAll();
        } catch (Expection $e) {
            return $e ->getMessage();
        }
    }

    public function update()
    {
        try {
            $stm = $this->dbCnx->prepare("UPDATE cotizacion SET idEmpleado = ?, idContructura =?, fecha = ?, total = ? WHERE idCotizacion = ?");
            $stm -> execute([$this->idEmpleado, $this->idContructura,$this->fecha,$this->total, $this->idCotizacion]);
        } catch (Expection $e) {
            return $e ->getMessage();
        }
    }
}

?>