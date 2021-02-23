<?php
require_once 'models/Addres.php';
 class AddresController 
 {
     public function index(){
         echo 'pagina index addres';
     }

     public function myAddres() {
        $addres = new Addres();
        $data = $addres->getAll();
        require_once 'views/layout/header.php';
        require_once 'views/users/myAddres.php';
        require_once 'views/layout/footer.php';
     }

     public function edit() {
         if(isset($_GET)) {
            $addres_id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT); 
            $edit = new Addres();
            $edit->setId_direccion($addres_id);
            $data = $edit->getOne();
            require_once 'views/layout/header.php';
            require_once 'views/users/addres.php';
            require_once 'views/layout/footer.php';   
         }
     }

     public function add() {
        require_once 'views/layout/header.php';
        require_once 'views/users/addres.php';
        require_once 'views/layout/footer.php';
     }

     public function save() {
         if (isset($_POST)) {
            $pais = isset($_POST['pais']) ? filter_var($_POST['pais'], FILTER_SANITIZE_STRING) : false;
            $direccion = isset($_POST['direccion']) ? filter_var($_POST['direccion'], FILTER_SANITIZE_STRING) : false;
            $codigo_postal = isset($_POST['codigo_postal']) ? filter_var($_POST['codigo_postal'], FILTER_SANITIZE_STRING) : false;
            $estado = isset($_POST['estado']) ? filter_var($_POST['estado'], FILTER_SANITIZE_STRING) : false;
            $ciudad = isset($_POST['ciudad']) ? filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING) : false;
            $colonia = isset($_POST['colonia']) ? filter_var($_POST['colonia'], FILTER_SANITIZE_STRING) : false;
            $telefono = isset($_POST['telefono']) ? filter_var($_POST['telefono'], FILTER_SANITIZE_STRING) : false;
            $instrucciones = isset($_POST['instrucciones']) ? filter_var($_POST['instrucciones'], FILTER_SANITIZE_STRING) : false;

            if ($pais && $codigo_postal && $estado && $ciudad && $colonia && $telefono && $instrucciones) {
                $user_id = $_SESSION['identity']->id_usuario;
                $addres = new Addres();
                $addres->setPais($pais);
                $addres->setDireccion($direccion);
                $addres->setId_usuario($user_id);
                $addres->setCodigo_postal($codigo_postal);
                $addres->setEstado($estado);
                $addres->setCiudad($ciudad);
                $addres->setColonia($colonia);
                $addres->setTelefono($telefono);
                $addres->setInstrucciones($instrucciones);

                if ($_POST['action'] == 'create') {
                    $save = $addres->save();
                } else {
                    $id = filter_var($_POST['addres_id'], FILTER_SANITIZE_NUMBER_INT);
                    $addres->setId_direccion($id);
                    $save = $addres->edit();
                }
            }
         }
         echo json_encode($save);
      
     }

     public function delete() {
         if (isset($_GET)) {
            $id = filter_var($_GET['id'] , FILTER_SANITIZE_NUMBER_INT);
            $addres = new Addres();
            $addres->setId_direccion($id);
            $result = $addres->delete();
         }
         echo json_encode($result);
     }
 }