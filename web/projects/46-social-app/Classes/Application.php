<?php
    namespace Classes;
    class Application
    {
        private $controller;
        
        private function setApp(){
            $load_name = 'Classes\Controllers\\';
            $url = explode('/',@$_GET['url']);
            if($url[0] == ''){
                $load_name .= 'Home';
            }else{
                $load_name .= ucfirst(strtolower($url[0]));
            }
            $load_name .= 'Controller';

            if(file_exists($load_name.'.php')){
                $this->controller = new $load_name();
            }else{
                include('Views/pages/404.php');
                die();
            }
        }

        public function run(){
            $this->setApp();
            $this->controller->index();
        }
    }
?>