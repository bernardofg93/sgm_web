<?php
require_once 'models/User.php';
class usuarioController
{
    public function index()
    {
        echo 'esta es la pagina index de usuarios';
    }

    public function registro()
    {
        require_once 'views/layout/header.php';
        require_once 'views/users/register.php';
        require_once 'views/layout/footer.php';
    }

    public function profile()
    {
        require_once 'views/users/profile.php';
    }

    public function save()
    {
        if (isset($_POST['action']) == 'insert') {
            $nombre = isset($_POST['nombre']) ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
            $apellidos = isset($_POST['apellidos']) ? filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING) : false;
            $correo = isset($_POST['correo']) ? filter_var($_POST['correo'], FILTER_SANITIZE_STRING) : false;
            $password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : false;

            if ($nombre && $apellidos && $correo && $password) {
                $user = new User();
                $user->setNombre_us($nombre);
                $user->setApellidos_us($apellidos);
                $user->setEmail_us($correo);
                $user->setPassword_us($password);
                $user->save();
                $idUser = $user->db->insert_id;
                $getOne = new User();
                $getOne->setId_usuario($idUser);
                $getOne = $getOne->getuser();
                $json = $getOne->fetch_object();
                $usName = $json->nombre_us;
                $usApellidos = $json->apelidos_us;
                $data = array(
                    'nombre_us' => $usName,
                    'apellidos_us' => $usApellidos,
                );
            }
        }
        echo json_encode($data);
    }

    public function login()
    {
        if (isset($_POST)) {
            $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_STRING) : false;
            $password = isset($_POST['password']) ? filter_var($_POST['password'], FILTER_SANITIZE_STRING) : false;
            $user = new User();
            $user->setEmail_us($email);
            $user->setPassword_us($password);
            
            $verify = $user->login();
             
            if ($verify && is_object($verify)) {
                $_SESSION['identity'] = $verify;
                
                if ($verify->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
                header('Location:' . base_url . "home/index");
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida';
            }
        }
        require_once 'views/layout/header.php';
        require_once 'views/users/login.php';
        require_once 'views/layout/footer.php';
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        header('Location:' . base_url);
    }
}
