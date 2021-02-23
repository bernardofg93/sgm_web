<?php
class Product
{
    private $id_producto;
    private $nombre_pro;
    private $descripcion_pro;
    private $precio_pro;
    private $stock_pro;
    private $oferta_pro;
    private $alta_pro;
    private $baja_pro;
    private $imagen_pro;
    private $status_pro;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId_producto()
    {
        return $this->id_producto;
    }

    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    public function getNombre_pro()
    {
        return $this->nombre_pro;
    }

    public function setNombre_pro($nombre_pro)
    {
        $this->nombre_pro = $nombre_pro;
    }

    public function getDescripcion_pro()
    {
        return $this->descripcion_pro;
    }

    public function setDescripcion_pro($descripcion_pro)
    {
        $this->descripcion_pro = $descripcion_pro;
    }

    public function getPrecio_pro()
    {
        return $this->precio_pro;
    }

    public function setPrecio_pro($precio_pro)
    {
        $this->precio_pro = $precio_pro;
    }

    public function getStock_pro()
    {
        return $this->stock_pro;
    }

    public function setStock_pro($stock_pro)
    {
        $this->stock_pro = $stock_pro;
    }

    public function getOferta_pro()
    {
        return $this->oferta_pro;
    }

    public function setOferta_pro($oferta_pro)
    {
        $this->oferta_pro = $oferta_pro;
    }

    public function getAlta_pro()
    {
        return $this->alta_pro;
    }

    public function setAlta_pro($alta_pro)
    {
        $this->alta_pro = $alta_pro;

        return $this;
    }

    public function getBaja_pro()
    {
        return $this->baja_pro;
    }

    public function setBaja_pro($baja_pro)
    {
        $this->baja_pro = $baja_pro;
    }

    public function getImagen_pro()
    {
        return $this->imagen_pro;
    }

    public function setImagen_pro($imagen_pro)
    {
        $this->imagen_pro = $imagen_pro;
    }

    public function getStatus_pro()
    {
        return $this->status_pro;
    }

    public function setStatus_pro($status_pro)
    {
        $this->status_pro = $status_pro;
    }

    public function getOne() {
        $sql = "SELECT * 
                FROM productos 
                WHERE id_producto = {$this->getId_producto()}";
        $product = $this->db->query($sql);
        return $product->fetch_object();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM productos ORDER BY id_producto DESC";
        return $this->db->query($sql);
    }

    public function save()
    {
        $nombre_p = $this->nombre_pro;
        $descripcion_p = $this->descripcion_pro;
        $precio_p = $this->precio_pro;
        $stock_p = $this->stock_pro;
        $oferta_p = $this->oferta_pro;
        $baja_p = $this->baja_pro;
        $imagen_p = $this->imagen_pro;
        $status_p = $this->status_pro;
        $sql = "INSERT INTO productos VALUES(NULL, '$nombre_p', '$descripcion_p', '$precio_p', '$stock_p', '$oferta_p', CURDATE(), '$baja_p', '$imagen_p', '$status_p')";
        $save = $this->db->query($sql);
        return array(
            'nombre' => $nombre_p,
            'descripcion' => $descripcion_p,
            'precio' => $precio_p,
            'stock' => $stock_p,
            'oferta' => $oferta_p,
            'img' => $imagen_p,
            'id' => $this->db->insert_id
        );     
    }

    public function edit()
    {
        $imagen_p = $this->imagen_pro;
        $sql = "UPDATE productos
                SET nombre_pro = '{$this->getNombre_pro()}',
                descripcion_pro = '{$this->getDescripcion_pro()}',
                precio_pro = {$this->getPrecio_pro()},
                stock_pro = {$this->getStock_pro()},
                oferta_pro = {$this->getOferta_pro()}";
                
                if($this->getImagen_pro() != null){
                    $sql .= ", imagen_pro ='{$this->getImagen_pro()}'"; 
                }

                $sql .= " WHERE id_producto = {$this->id_producto}";

                $update = $this->db->query($sql);
                if($update){
                 return array(
                        'result' => 'true',
                        'id_imgen' => $imagen_p
                    );
                }else{
                    return array(
                        'result' => 'false'
                    );
                }
    }
    
    public function delete()
    {
        $sql = "DELETE p.* FROM productos p WHERE p.id_producto = {$this->getId_producto()}";
        $result = $this->db->query($sql);
        if($result){
          return  $resp = array(
                'result' => 'true'
            );
        }else{
          return $resp = array(
            'result' => 'error'
           );
        }
    }
}

