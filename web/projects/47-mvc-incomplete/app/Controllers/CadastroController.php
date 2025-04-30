<?php
    namespace App\Controllers;

    use Src\Classes\Render;
    use Src\Interfaces\InterfaceView;
    use App\Models\CadastroModel;
    

    class CadastroController extends CadastroModel
    {
        use \Src\Traits\TraitUrlParser;

        protected $id;
        protected $name;
        protected $sex;
        protected $city;

    	public function __construct(){
            if(count($this->parseUrl()) == 1){
                $render = new Render();
        		$render->setDir('cadastro');
                $render->setAuthor(AUTHOR);
                $render->setDescription(DESCRIPTION);
                $render->setKeywords(KEYWORDS);
                $render->setTitle(TITLE);
                $render->renderLayout();
            }
    	}

        # Get the variables to call the register method.
        public function reqVar(){
            if(isset($_POST['id'])){
               $this->id = $_POST['id'];
            }
            if(isset($_POST['name'])){
                $this->name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
            }
            if(isset($_POST['sex'])){
                $this->sex = filter_input(INPUT_POST,'sex',FILTER_SANITIZE_SPECIAL_CHARS);
            }
            if(isset($_POST['city'])){
                $this->city = filter_input(INPUT_POST,'city',FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        # Register method.
        public function cadastrar(){
            $this->reqVar();
            parent::registerClients($this->name,$this->sex,$this->city);
            echo "Cadastro efetuado com sucesso!";
        }

        public function selecionar(){
            $this->reqVar();
            $b = parent::selectClients($this->name,$this->sex,$this->city);
            echo "
                <form name='form_delete' id='form_delete' action='".DIRPAGE."cadastro/deletar' method='post'>
                <table border='1'>
                    <tr>
                        <td>Ação</td>
                        <td>Nome</td>
                        <td>Sexo</td>
                        <td>Cidade</td>
                    </tr>
            ";
            foreach($b as $c){
                echo "
                    <tr>
                        <td><input type='checkbox' id='id' name='id[]' value='$c[id]' /></td>
                        <td>$c[Nome]</td>
                        <td>$c[Sexo]</td>
                        <td>$c[Cidade]</td>
                    </tr> 
                ";
            }
            echo "
                </table>
                <input type='submit' value='Deletar' />
                </form>
            ";
        }

        public function deletar(){
            $this->reqVar();
            foreach($this->id as $id_del)
                parent::deleteClients($id_del);
        }
    }
?>