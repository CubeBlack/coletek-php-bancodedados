<?php
class Cli{
    public function __construct($argumentos) {
        if($argumentos < 2){
            $this->show_help();
            return;
        }

        $this->verificar_argumento($argumentos[1]);
    }

    public function verificar_argumento($argumento){
        switch ($argumento) {
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
        $testes->all();
    }

    public function criar_banco_de_dados(){
        $db = new Database();
        $db->make_database();
    }

}
