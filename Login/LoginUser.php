<?php

require_once("../Config/db.php");
require_once("../Config/conectar.php");

class LoginUser extends Alquiler{
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

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        $this->usuario;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        $this->password;
    }

    public function fetchAll()
    {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }

    public function EntradaUsuarios()
    {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email = ) AND password = ?");
            $stm->execute([$this->email, md5($this->password)]);
            $usuarios = $stm->fetchAll();
            if (count($usuarios)) {
                session_start();
                $_SESSION['idUser'] = $usuario[0]['idUser'];
                $_SESSION['usuario'] = $usuario[0]['usuario'];
                $_SESSION['email'] = $usuario[0]['email'];
                $_SESSION['password'] = $usuario[0]['password'];
                return true;
            }else {
                return false;
            }
        } catch (Exception $e) {
            $e -> getMessage();
        }
    }


}


?>