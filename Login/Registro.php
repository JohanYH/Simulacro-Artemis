<?php

require_once("../Config/db.php");
require_once("../Config/conectar.php");

class Registrar extends Alquiler{

    private $idUser;
    private $usuario;
    private $email;
    private $password;

    public function __construct($idUser = 0, $usuario = "", $email = "", $password = "", $dbCnx = "")
    {
        $this->idUser = $idUser;
        $this->usuario = $usuario;
        $this->email = $email;
        $this->password = $password;
        parent::__construct($dbCnx);
    }
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getIdUser()
    {
        $this->idUser;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        $this->email;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        $this->usuario;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassowrd()
    {
        $this->Password;
    }

    public function check($email)
    {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email = '$email'");
            $stm->execute();
            if ($stm->fetchColumn()) {
                return true;
            }else {
                return false;
            }
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    public function insertData()
    {
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO users (usuario,email, password) values(?,?,?) ");
            $stm ->execute([$this->usuario, $this->email, md5($this->password)]);

            $login = new EntradaUser();
            $login->setEmail($_POST['email']);
            $login->setPassword($_POST['password']);

            $succes = $login->EntradaUsuarios();
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

}





?>