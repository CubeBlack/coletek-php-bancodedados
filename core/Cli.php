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
    
            case 'makedatabase':
                $this->criar_banco_de_dados();
                break;
            
            default:
                echo "Argumento não encontrado!";
                $this->show_help();
                break;
        }
    }

    public function show_help(){
        echo "Utilize um dos argumentos abaixo:\n";
        echo "  * makedatabase - Para criar o banco de dados da aplicação. \n";
        echo "  * test - Para para executar os testes automatizados. \n";
    }

    public function executar_testes(){
        $testes = new Test();

        if(!isset($this->argumentos[2])){
            $testes->all();
        }
        
        $testes->executar_teste_por_nome_da_classe($this->argumentos[2]);
    }

    public function criar_banco_de_dados(){
        $db = new Database();
        $db->make_database();
    }

}
