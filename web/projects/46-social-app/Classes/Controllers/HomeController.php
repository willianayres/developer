<?php
    namespace Classes\Controllers;
    class HomeController
    {
        public function index(){
            if(isset($_GET['logout'])){
                session_unset();
                session_destroy();
                \Classes\Functions::redirect(INCLUDE_PATH.'home');
            }

            if(isset($_SESSION['login'])){

                if(isset($_GET['recusarAmizade'])){
                    $id_sent = (int)$_GET['recusarAmizade'];
                    if(\Classes\Models\CommunityModel::updateRequestFriendship($id_sent,0)){
                        \Classes\Functions::alert('Amizade recusada!');
                        \Classes\Functions::redirect(INCLUDE_PATH.'home');
                    }else{
                        \Classes\Functions::alert('Ops, um erro ocoreu!');
                        \Classes\Functions::redirect(INCLUDE_PATH.'home');
                    }
                }else if(isset($_GET['aceitarAmizade'])){
                    $id_sent = (int)$_GET['aceitarAmizade'];
                    if(\Classes\Models\CommunityModel::updateRequestFriendship($id_sent,1)){
                        \Classes\Functions::alert('Amizade aceita!');
                        \Classes\Functions::redirect(INCLUDE_PATH.'home');
                    }else{
                        \Classes\Functions::alert('Ops, um erro ocoreu!');
                        \Classes\Functions::redirect(INCLUDE_PATH.'home');
                    }   
                }

                if(isset($_POST['send_post'])){
                    if($_POST['msg'] == '' || strlen($_POST['msg']) < 5){
                        \Classes\Functions::alert('Não permitimos posts vazios :(');
                        \Classes\Functions::redirect(INCLUDE_PATH.'home');
                    }
                    \Classes\Models\HomeModel::postFeed($_POST['msg']);
                    \Classes\Functions::alert('Post feito com sucesso!');
                    \Classes\Functions::redirect(INCLUDE_PATH.'home');
                }

                \Classes\Views\MainView::render('home.php');
            }else{
                if(isset($_POST['send_login'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    if(!\Classes\Models\UsersModel::emailExists($email)){
                        \Classes\Functions::alert('Não existe nenhum usuário com este e-mail!');
                        \Classes\Functions::redirect(INCLUDE_PATH.'home');
                    }else{
                        $check = \Classes\MySQL::connect()->prepare('SELECT * FROM `users` WHERE `email` = ?');
                        $check->execute([$email]);
                        $check = $check->fetch();

                        $passwordDB = $check['password'];
                        if(\Classes\Bcrypt::check($password,$passwordDB)){
                            $_SESSION['login'] = $check['email'];
                            $_SESSION['id'] = $check['id'];
                            $_SESSION['name'] = explode(' ',$check['name'])[0];
                            $_SESSION['img'] = $check['img'];
                            \Classes\Functions::alert('Logado com sucesso!');
                            \Classes\Functions::redirect(INCLUDE_PATH.'home');
                        }else{
                            \Classes\Functions::alert('Senha incorreta!');
                            \Classes\Functions::redirect(INCLUDE_PATH.'home');
                        }
                    }

                }
                \Classes\Views\MainView::render('login.php');
            }
        }
    }
?>