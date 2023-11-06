<?php
final class SetorModelTest{
    public function retornar_todos_setores(){
        SetorModel::createFake();
        SetorModel::createFake();

        $lista = SetorModel::getAll();

        if(count($lista)!=2){
            trigger_error("Era esperado 2 registros", E_USER_ERROR);
        }
        
        echo "Retorno contem " . count($lista) . " itens.\n";
    }

    public function retornar_um_setor(){
        SetorModel::createFake();
        $setor = SetorModel::get(1);
        print_r($setor);
        if(!$setor){
            trigger_error("Setor não encontrado\n");
        } 
    }

    public function atualizar_setor(){
        SetorModel::createFake();
        $setor = SetorModel::get(1);

        $old_name = $setor->name;


        $setor->name = Fake::makeString();


        $setor->update();

        $setor = SetorModel::get(1);

        if($setor->name == $old_name){
            trigger_error("'Name' não atualizado!", E_USER_ERROR);
        }

    }

    
    public function criar_novo_setor(){
        $new_name = Fake::makeString();

        $setor = SetorModel::create($new_name);
                
        $setor = SetorModel::get($setor->id);
        

        if($setor->name != $new_name){
            var_dump($setor->name);
            var_dump($new_name);
            trigger_error("'Name' do usuário diferente do esperado", E_USER_ERROR);
        }

    }

    public function apagar_setor(){
        SetorModel::createFake();
        SetorModel::createFake();

        $setor = SetorModel::get(1);

        $setor->delete();

        $lista = SetorModel::getAll();
        
        if(count($lista) > 1){
            trigger_error("Setor não apagado");
        }

        echo "Setor apagado\n";
    }
 
}
