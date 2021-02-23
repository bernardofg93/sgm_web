<?php

class Addres
{
    private $id_direccion;
    private $id_usuario;
    private $pais;
    private $direccion;
    private $codigo_postal;
    private $estado;
    private $ciudad;
    private $colonia;
    private $telefono;
    private $instrucciones;
    private $status_dir;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId_direccion()
    {
        return $this->id_direccion;
    }

    public function setId_direccion($id_direccion)
    {
        $this->id_direccion = $id_direccion;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
    }
    
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    public function getCodigo_postal()
    {
        return $this->codigo_postal;
    }

    public function setCodigo_postal($codigo_postal)
    {
        $this->codigo_postal = $codigo_postal;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $this->db->real_escape_string($estado);
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $this->db->real_escape_string($ciudad);
    }

    public function getColonia()
    {
        return $this->colonia;
    }

    public function setColonia($colonia)
    {
        $this->colonia = $this->db->real_escape_string($colonia);
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $this->db->real_escape_string($telefono);
    }

    public function getInstrucciones()
    {
        return $this->instrucciones;
    }

    public function setInstrucciones($instrucciones)
    {
        $this->instrucciones = $this->db->real_escape_string($instrucciones);
    }

    public function getStatus_dir()
    {
        return $this->status_dir;
    }

    public function setStatus_dir($status_dir)
    {
        $this->status_dir = $status_dir;
    }

    public function getOne() {
        $direccion_id = $this->id_direccion;
        $sql = "SELECT *
                FROM direcciones
                WHERE id_direccion = $direccion_id";
        $data = $this->db->query($sql);
        return $data->fetch_object();
    }

    public function getAll() {
        $sql = "SELECT * FROM direcciones";
        $data = $this->db->query($sql);
        return $data;
    }

    public function save() {
        $usuario_id = $this->id_usuario;
        $pais_ad = $this->pais;
        $direccion_add = $this->direccion;
        $codigo_postal_add = $this->codigo_postal;
        $estado_add = $this->estado;
        $ciudad_add = $this->ciudad;
        $colonia_add = $this->colonia;
        $telefono_add = $this->telefono;
        $instrucciones_add = $this->instrucciones;

        $sql = "INSERT INTO direcciones VALUES(NULL, NULL, '$usuario_id', '$pais_ad','$direccion_add','$codigo_postal_add','$estado_add', '$ciudad_add', '$colonia_add','$telefono_add', '$instrucciones_add', NULL)";
        $save = $this->db->query($sql);
        return array(
            'result' => 'true'
        );
    }

    public function edit() {
        $sql = "UPDATE direcciones
                SET pais = '{$this->getPais()}',
                    direccion = '{$this->getDireccion()}',
                    codigo_postal = '{$this->getCodigo_postal()}',
                    estado = '{$this->getEstado()}',
                    ciudad = '{$this->getCiudad()}',
                    colonia = '{$this->getColonia()}',
                    telefono = '{$this->getTelefono()}',
                    instrucciones = '{$this->getInstrucciones()}'
              WHERE id_direccion = '{$this->getId_direccion()}'";
                    
                    $save = $this->db->query($sql);
                    if ($save) {
                        return array(
                            'result' => 'true'
                        );
                    }
    }

    public function delete() {
        $sql = "DELETE FROM direcciones
                WHERE id_direccion = '$this->id_direccion'";
                
                $delete = $this->db->query($sql);
                if ($delete) {
                    return array(
                        'result' => 'true'
                    );
                }
    }

}