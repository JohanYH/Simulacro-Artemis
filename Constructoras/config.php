<?php

require_once("../Config/db.php");
require_once("../Config/conectar.php");

class Constructora extends Alquiler{
    private $idContructura;
    private $nombreConstructora;
    private $telefonoConstructora;

    public function __construct($idContructura = 0, $nombreConstructora = "", $telefonoConstructora = "", $dbCnx = "")
    {
        $this->idContructura = $idContructura;
        $this->nombreConstructora = $nombreConstructora;
        $this->telefonoConstructora = $telefonoConstructora;
        parent::__construct($dbCnx);

    }

    public function setIdContructura($idContructora)
    {
        $this->idContructora = $idContructora;
    }

    public function getIdContructura()
    {
        $this->idContructura;
    }

    public function setNombreConstructora($nombreConstructora)
    {
        $this->nombreConstructora = $nombreConstructora;
    }

    public function getNombreCostructora()
    {
        $this->nombreConstructora;
    }

    public function setTelefonoConstructora($telefonoConstructora)
    {
        $this->telefonoConstructora = $telefonoConstructora;
    }

    public function getTelefonoConstructora()
    {
        $this->telefonoConstructora;
    }

    public function insertConstrutora()
    {
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO constructoras (nombreConstructora,telefonoConstructora) values(?,?)");
            $stm -> execute([$this->nombreConstructora, $this->telefonoConstructora]);
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    public function selectConstructoraAll()
    {
        try {
            $stm = $this->dbCnx->prepare ("SELECT * FROM constructoras");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }
}

?>