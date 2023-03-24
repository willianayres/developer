<?php
    namespace Classes\Controllers;
    class RegistrarController
    {
        public function index(){
            if(isset($_POST['send_register'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    \Classes\Functions::alert('E-mail inválido!');
                    \Classes\Functions::redirect(INCLUDE_PATH.'registrar');
                }else if(strlen($password) < 6){
                    \Classes\Functions::alert('Sua senha é muito curta!');
                    \Classes\Functions::redirect(INCLUDE_PATH.'registrar');
                }else if(\Classes\Models\UsersModel::emailExists($email)){
                    \Classes\Functions::alert('Este e-mail já foi cadastrado!');
                    \Classes\Functions::redirect(INCLUDE_PATH.'registrar');
                }else{
                    // Register the user.
                    $password = \Classes\Bcrypt::hash($password);
                    $new_login = \Classes\MySQL::connect()->prepare('INSERT INTO `users` VALUES(null,?,?,?,?,?)');
                    $new_login->execute([$name,$email,$password,date('Y-m-d H:i:s',time()),'']);
                    \Classes\Functions::alert('Registrado com sucesso!');
                    \Classes\Functions::redirect(INCLUDE_PATH.'home');
                }
                \Classes\Functions::alert('ok');
            }
            \Classes\Views\MainView::render('registrar.php');
        }
    }
?>