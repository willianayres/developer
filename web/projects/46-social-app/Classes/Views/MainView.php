<?php
    namespace Classes\Views;
    class MainView
    {
        public static function render($filename){
            include('pages/'.$filename);
        }
    }
?>