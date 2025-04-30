<?php
    namespace Src\Classes;

    use Src\Traits\TraitUrlParser;
    
    class Application
    {
        use TraitUrlParser;
        private $controllers;
        
        private function setApp(){
            $load_name = '';
            $url = $this->parseUrl();
            $i = $url[0];

            $this->controllers = array(
                ""=>"HomeController",
                "home"=>"HomeController",
                "sitemap"=>"SitemapController",
                "cadastro"=>"CadastroController"
            );

            if(array_key_exists($i,$this->controllers)){
                if(file_exists(DIRREQ."/app/Controllers/{$this->controllers[$i]}.php")){
                    $load_name .= $this->controllers[$i];
                    return $load_name;
                }else{
                    return "HomeController";
                    die();
                }
            }else{
                return "Error404Controller";
                die();
            }
        }

        public function runApp(){
            return $this->setApp();
        }
    }
?>