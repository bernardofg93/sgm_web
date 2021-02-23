<?php
class categoryProduct {
    private $id_cat_productos;
    private $nombre_cat_productos;
    private $status_cat_prod;

    public function __construct(){
        $this->db = Database::connect();
        
    }

    public function getId_cat_productos()
    {
        return $this->id_cat_productos;
    }

    public function setId_cat_productos($id_cat_productos)
    {
        $this->id_cat_productos = $id_cat_productos;
    }

    public function getNombre_cat_productos()
    {
        return $this->nombre_cat_productos;
    }

    public function setNombre_cat_productos($nombre_cat_productos)
    {
        $this->nombre_cat_productos = $nombre_cat_productos;
    }

    public function getStatus_cat_prod()
    {
        return $this->status_cat_prod;
    }

    public function setStatus_cat_prod($status_cat_prod)
    {
        $this->status_cat_prod = $status_cat_prod;
    }

    public function getAll(){
        $sql = "SELECT * FROM categoria_productos ORDER BY id_cat_productos DESC";
        $category = $this->db->query($sql);
        return $category;
    }

    public function save(){
        $nombre = $this->nombre_cat_productos;
        $status = $this->status_cat_prod;
        $sql = "INSERT INTO categoria_productos VALUES(NULL, '$nombre', CURDATE(), NULL, $status)";
        $this->db->query($sql);
        echo $this->db->error;
    }
}