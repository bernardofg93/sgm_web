<?php
class Order
{
    private $id_pedido;
    private $id_usuario;
    private $costo;
    private $status_ped;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId_pedido()
    {
        return $this->id_pedido;
    }

    public function setId_pedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function getStatus_ped()
    {
        return $this->status_ped;
    }

    public function setStatus_ped($status_ped)
    {
        $this->status_ped = $status_ped;
    }

    public function getOne() {
        $sql = "SELECT * 
                FROM pedidos 
                WHERE id_pedido = {$this->getId_pedido()}";
        $product = $this->db->query($sql);
        return $product->fetch_object();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM pedidos ORDER BY id_pedido DESC";
        return $this->db->query($sql);
    }

    public function save()
    {
        $user_id = $this->id_usuario;
        $costo = $this->costo;
        $status = $this->precio_pro;
        $sql = "INSERT INTO pedidos VALUES(NULL, '$user_id', '$costo',NULL, CUERDATE(), CURTIME(), NULL, NULL)";
        $save = $this->db->query($sql);
        return array(
            'id_user' => $user_id,
            'costo' => $costo,
            'id' => $this->db->insert_id
        );     
    }
}

