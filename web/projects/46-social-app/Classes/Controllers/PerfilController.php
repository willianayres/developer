<?php
    namespace Classes\Controllers;
    class PerfilController
    {
        public function index(){
            if(isset($_SESSION['login'])){
                if(isset($_POST['update_profile'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    if($name == '' || $email == ''){
                        \Classes\Functions::alert('Campos vazios não são permitidos!');
                        \Classes\Functions::redirect(INCLUDE_PATH.'perfil');
                    }
                    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                        \Classes\Functions::alert('E-mail inválido!');
                        \Classes\Functions::redirect(INCLUDE_PATH.'perfil');
                    }else if($password != '' && strlen($password) < 6){
                        \Classes\Functions::alert('Sua senha é muito curta!');
                        \Classes\Functions::redirect(INCLUDE_PATH.'perfil');
                    }else if(\Classes\Models\UsersModel::emailExists($email) && $email != $_SESSION['login']){
                        \Classes\Functions::alert('Este e-mail já foi cadastrado!');
                        \Classes\Functions::redirect(INCLUDE_PATH.'perfil');
                    }else{
                        $pdo = \Classes\MySQL::connect();
                        if($password != ''){
                            $password = \Classes\Bcrypt::hash($password);
                            $update_login = $pdo->prepare('UPDATE `users` SET `name` = ?, `email` = ?,`password` = ? WHERE `id` = ?');
                            $update_login->execute([$name,$email,$password,$_SESSION['id']]);
                            $_SESSION['name'] = $name;
                            $_SESSION['login'] = $email;
                            $msg = 'Seu perfil e senha foram atualizados com sucesso!';
                        }else{
                            $update_login = $pdo->prepare('UPDATE `users` SET `name` = ?, `email` = ? WHERE `id` = ?');
                            $update_login->execute([$name,$email,$_SESSION['id']]);
                            $_SESSION['name'] = $name;
                            $_SESSION['login'] = $email;
                            $msg = 'Seu perfil foi atualizado com sucesso!';
                            
                        }
                        if($_FILES['img']['tmp_name'] != ''){
                            $file = $_FILES['img'];
                            $file_ext = explode('.',$file['name']);
                            $file_ext = $file_ext[count($file_ext)-1];
                            if($file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'jpeg'){
                                $size = (int)($file['size'] / 1024);
                                if($size <= 300){
                                    $img = uniqid().'.'.$file_ext;
                                    $update_login = $pdo->prepare('UPDATE `users` SET `img` = ? WHERE `id` = ?');
                                    $update_login->execute([$img,$_SESSION['id']]);
                                    $_SESSION['img'] = $img;
                                    move_uploaded_file($file['tmp_name'],BASE_DIR_STATIC.'images/'.$img);
                                    $msg .= ' Junto, foi inserido uma foto.';
                                }else{
                                    \Classes\Functions::alert('Arquivo de imagem muito pesado!');
                                    \Classes\Functions::redirect(INCLUDE_PATH.'perfil');
                                }
                            }else{
                                \Classes\Functions::alert('Arquivo de imagem em formato inválido!');
                                \Classes\Functions::redirect(INCLUDE_PATH.'perfil');
                            }
                            
                        }
                        \Classes\Functions::alert($msg);
                        \Classes\Functions::redirect(INCLUDE_PATH.'perfil');
                    }
                }
                \Classes\Views\MainView::render('perfil.php');
            }else{
                \Classes\Functions::redirect(INCLUDE_PATH.'home');
            }
        }
    }
?>