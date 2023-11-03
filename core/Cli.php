<?php
class Cli{
    protected $argumentos;
    public function __construct($argumentos) {
        $this->argumentos = $argumentos;

        if($this->argumentos < 2){
            $this->show_help();
            return;
        }

        $this->verificar_argumento();
    }

    public function verificar_argumento(){
        switch ($this->argumentos[1]) {
            case 'test':
                $this->executar_testes();
                break;
    
            case 'make_database':
                $this->criar_banco_de_dados();
                break;
            case 'semear_database':{
                $this->semear_database();
                break;
            }
            case 'refresh_database':{
                $this->refresh_database();
                break;
            }
            default:
                echo "Argumento '{$this->argumentos[1]}' não encontrado!";
                $this->show_help();
                break;
        }
    }

    public function show_help(){
        echo "Utilize um dos argumentos abaixo:\n";
        echo "  * make_database - Para criar o banco de dados da aplicação. \n";
        echo "  * semear_database - Para criar o banco de dados da aplicação. \n";
        echo "  * test - Para para executar os testes automatizados. \n";
    }

    public function executar_testes(){
        $testes = new Test();

        if(!isset($this->argumentos[2])){
            $testes->all();
            return;
        }
        
        $testes->executar_teste_por_nome_da_classe($this->argumentos[2]);
    }

    public function criar_banco_de_dados(){
        $db = new Database();
        $db->up();
    }

    public function refresh_database(){
        $db = new Database();
        $db->refresh();
    }

    public function semear_database(){
        for ($i=0; $i < 10; $i++) { 
            UserModel::createFake();
            SetorModel::createFake();
        }

        for ($i=0; $i < 20; $i++) { 
            UserSetorModel::createRand();
        }
    }

}
