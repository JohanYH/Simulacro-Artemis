<?php

require_once("../Config/db.php");
require_once("../Config/conectar.php");

class Empleado extends Alquiler{
    private $idEmpleado;
    private $nombreEmpleado;
    private $telefonoEmpleado;

    public function __construct($idEmpleado = 0, $nombreEmpleado = "", $telefonoEmpleado = "", $dbCnx = "")
    {
        $this->idEmpleado = $idEmpleado;
        $this->nombreEmpleado = $nombreEmpleado;
        $this->telefonoEmpleado = $telefonoEmpleado;
        parent::__construct($dbCnx);

    }

    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;
    }

    public function getIdEmpleado()
    {
        $this->idEmpleado;
    }

    public function setNombreEmpleado($nombreEmpleado)
    {
        $this->nombreEmpleado = $nombreEmpleado;
    }

    public function getNombreEmpleado()
    {
        $this->nombreEmpleado;
    }

    public function setTelefonoEmpleado($telefonoEmpleado)
    {
        $this->telefonoEmpleado = $telefonoEmpleado;
    }

    public function getTelefonoEmpleado()
    {
        $this->telefonoEmpleado;
    }

    public function insertEmpleado()
    {
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO empleado (nombreEmpleado,telefonoEmpleado) values(?,?)");
            $stm -> execute([$this->nombreEmpleado, $this->telefonoEmpleado]);
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    public function selectEmpleadoAll()
    {
        try {
            $stm = $this->dbCnx->prepare ("SELECT * FROM empleado");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    //Eliminar

    public function delete()
    {
        try {
            $stm = $this->dbCnx->prepare ("DELETE FROM empleado WHERE idEmpleado = ?");
            $stm -> execute([$this->idEmpleado]);
            return $stm -> fetchAll();
        } catch (Expection $e) {
            return $e ->getMessage();
        }
    }

    //Editar

    public function selectOneEmpleado()
    {
        try {
            $stm = $this->dbCnx->prepare ("SELECT * FROM empleado WHERE idEmpleado =?");
            $stm->execute([$this->idEmpleado]);
            return $stm -> fetchAll();
        } catch (Expection $e) {
            return $e ->getMessage();
        }
    }

    public function update()
    {
        try {
            $stm = $this->dbCnx->prepare("UPDATE empleado SET nombreEmpleado = ?, telefonoEmpleado =? WHERE idEmpleado = ?");
            $stm -> execute([$this->nombreEmpleado, $this->telefonoEmpleado, $this->idEmpleado]);
        } catch (Expection $e) {
            return $e ->getMessage();
        }
    }
}

?>