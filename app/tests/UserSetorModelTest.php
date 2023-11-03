<?php
final class UserSetorModelTest{
    public function criar_e_listar_dois_vindulos_aleatorios(){
        UserModel::createFake();
        SetorModel::createFake();
        
        UserSetorModel::createRand();
        UserSetorModel::createRand();

        $lista = UserSetorModel::getAll();
        
        if(count($lista)!=2){
            trigger_error("Era esperado 2 registros", E_USER_ERROR);
        }
        
        echo "Retorno contem " . count($lista) . " itens.\n";
    }
  
    public function criar_e_pegar_um_vinculo(){
        $user = UserModel::createFake();
        $setor = SetorModel::createFake();

        UserSetorModel::create($user->id, $setor->id);
        
        print_r(UserSetorModel::get($user->id, $setor->id));
    }
    

    public function apagar_vinculo(){
        $user = UserModel::createFake();
        UserModel::createFake();
        UserModel::createFake();
        UserModel::createFake();

        $setor = SetorModel::createFake();
        SetorModel::createFake();
        SetorModel::createFake();
        SetorModel::createFake();

        UserSetorModel::createRand();
        $vinculo = UserSetorModel::create($user->id, $setor->id);

        $vinculo->delete();

        $lista = UserModel::getAll();
        
        if(count($lista) > 1){
            trigger_error("Vinculo não apagado");
        }

        echo "Vinculo apagado\n";
    }
}
