<?php
    namespace App\Controllers;

    use Src\Classes\Render;
    use Src\Interfaces\InterfaceView;

    class HomeController extends Render implements InterfaceView
    {

        public function __construct(){
            $this->setDir('home');
            $this->setAuthor(AUTHOR);
            $this->setDescription(DESCRIPTION);
            $this->setKeywords(KEYWORDS);
            $this->setTitle(TITLE);
            $this->renderLayout();
        }
    }
?>