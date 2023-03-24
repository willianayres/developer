<?php
    namespace Classes\Controllers;
    class ComunidadeController
    {
        public function index(){
            if(isset($_SESSION['login'])){

                if(isset($_GET['solicitarAmizade'])){
                    $for = (int)$_GET['solicitarAmizade'];
                    if(\Classes\Models\CommunityModel::requestFriendship($for)){
                        \Classes\Functions::alert('Solicitação de amizade enviada com sucesso!');
                        \Classes\Functions::redirect(INCLUDE_PATH.'comunidade');
                    }else{
                        \Classes\Functions::alert('Ocorreu um erro ao solicitar a amizade...');
                        \Classes\Functions::redirect(INCLUDE_PATH.'comunidade');
                    }
                }

                \Classes\Views\MainView::render('comunidade.php');
            }else{
                \Classes\Functions::redirect(INCLUDE_PATH.'home');
            }
        }
    }
?>