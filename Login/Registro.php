<?php

    require_once("../Config/db.php");
    require_once("../Config/conectar.php");
    require_once("NewUser.php");

class Registrar extends Alquiler{

    private $idUser;
    private $usuario;
    private $email;
    private $password;

    public function construct($idUser = 0, $usuario = "", $email = "", $password = "", $dbCnx = "")
    {
        $this->idUser = $idUser;
        $this->usuario = $usuario;
        $this->email = $email;
        $this->password = $password;
        parent::construct($dbCnx);
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function check($email)
    {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email = '$email'");
            $stm->execute();
            if ($stm->fetchColumn()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function insertData()
    {
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO users (usuario,email, password) values(?,?,?)");
            $stm->execute([$this->usuario, $this->email, md5($this->password)]);

            $login = new LoginUser();
            $login->setEmail($_POST['email']);
            $login->setPassword($_POST['password']);

            $success = $login->EntradaUsuarios();

        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function insertDatos()
    {
        try {
            $stm = $this->dbCnx -> prepare("INSERT INTO Users (IdCamper, Email, UserName, tiposUsuario, Password) values(?,?,?,?,?)");
            $stm -> execute([$this->IdCamper,$this->Email,$this->UserName,$this->tiposUsuario,md5($this->Password)]);

            $login = new LoginUser();
            $login->setEmail($_POST["Email"]);
            $login->setPassword($_POST["Password"]);

            $success = $login->LoginUsers();

        } catch (Exception $e) {
            $e -> getMessage();
        }
    }
}

?>