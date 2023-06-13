<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../Config/db.php");
require_once("../Config/conectar.php");
/* require_once("borrarConstructora.php"); */

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

    //Eliminar

    public function delete()
    {
        try {
            $stm = $this->dbCnx->prepare ("DELETE FROM constructoras WHERE idContructura=?");
            $stm -> execute([$this->idContructura]);
            return $stm -> fetchAll();
            echo "<script>alert('Ha sido Borrado Exitosamente');document.location='constructura.php'</script>";
        } catch (Expection $e) {
            return $e ->getMessage();
        }
    }
}

?>