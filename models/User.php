<?php

class User 
{
    private $id_usuario;
    private $nombre_us;
    private $apellidos_us;
    private $email_us;
    private $password_us;
    private $rol;
    private $status_us;
    private $imagen_us;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNombre_us()
    {
        return $this->nombre_us;
    }

    public function setNombre_us($nombre_us)
    {
        $this->nombre_us = $this->db->real_escape_string($nombre_us);
    }

    public function getApellidos_us()
    {
        return $this->apellidos_us;
    }

    public function setApellidos_us($apellidos_us)
    {
        $this->apellidos_us = $this->db->real_escape_string($apellidos_us);
    }

    public function getEmail_us()
    {
        return $this->email_us;
    }

    public function setEmail_us($email_us)
    {
        $this->email_us = $this->db->real_escape_string($email_us);
    }

    public function getPassword_us()
    {
        return password_hash($this->password_us, PASSWORD_BCRYPT);
    }

    public function setPassword_us($password_us)
    {
        $this->password_us = $password_us;
    }

    public function getRol(){
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $this->db->real_escape_string($rol);
    }

    public function getStatus_us(){
        return $this->status_us;
    }

    public function setStatus_us($status_us){
        $this->status_us = $this->db->real_escape_string($status_us);
    }

    public function getImagen_us(){
        return $this->imagen_us;
    }

    public function setImagen_us($imagen_us){
        $this->imagen_us = $imagen_us;
    }

    public function getUsers(){
        $sql = "SELECT * FROM usuarios ORDER BY id_usuario DESC";
        return $this->db->query($sql);
    }

    public function getuser(){
        $sql = "SELECT * FROM usuarios
        WHERE id_usuario = {$this->getId_usuario()}";
        return $this->db->query($sql);
    }

    public function save(){
        $nombre_us = $this->nombre_us;
        $apellidos_us = $this->apellidos_us;
        $email_us = $this->email_us;
        $password_us = $this->getPassword_us();
        $rol = $this->rol;
        $status_us = $this->status_us;
        $imagen_us = $this->imagen_us;
        $sql = "INSERT INTO usuarios VALUES(NULL, '$nombre_us', '$apellidos_us', '$email_us', '$password_us', '$rol', '$status_us', '$imagen_us', CURDATE(), CURTIME())";
        return $this->db->query($sql);
    }

    public function login(){
        $result = false;
        $email_us = $this->email_us;
        $password_us = $this->password_us;

        $sql = "SELECT * FROM usuarios WHERE email_us = '$email_us'";
        $login = $this->db->query($sql);
        
        if($login && $login->num_rows == 1){
            $user = $login->fetch_object();
            $verify = password_verify($password_us, $user->password_us);
            if($verify){
                $result = $user;
            }
        }
        return $result;
    }
}