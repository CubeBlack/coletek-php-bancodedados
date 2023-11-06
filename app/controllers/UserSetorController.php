<?php
class UserSetorController
{
    public function index($values)
    {
        $user_id = $values[1];

        $user = UserModel::get($user_id);
        $userSetores = UserSetorModel::getAllByUser($user_id);

        View::show(
            'user_setor_list',
            [
                'user' => $user,
                'userSetores'=> $userSetores
            ]
        );
    }

    public function delete($values)
    {
        global $app;

        $user_id = $values[1];
        $setor_id = $values[2];

        $user_setor = UserSetorModel::get($user_id, $setor_id);

        View::show('operacao_form', [
            'title' => "Desvincular <b>[{$user_setor->user_id}]{$user_setor->user_name}</b> 
                do setor <b>[{$user_setor->setor_id}]{$user_setor->setor_name}</b>",
            
            'msg' => 'Deseja realmente desvincular?',
            'return_url'=>$app->make_url("users/{$user_id}/setores")
        ]);
    }

    public function delete_submit($values)
    {
        global $app;
        $user_id = $values[1];
        $setor_id = $values[2];

        $user_setor = UserSetorModel::get($user_id, $setor_id);
        $user_setor->delete();

        header("location: {$app->make_url("users/{$user_id}/setores")}");
    }

    public function add($values)
    {
        $user_id = $values[1];
        $setores = SetorModel::getUserNotAsigneds($user_id);
        $user = UserModel::get($user_id);

        View::show('user_setor_form', [
            'user' => $user,
            'setores' => $setores
        ]);
    }

    public function add_submit($values)
    {
        $user_id = $values[1];
        $setor_id = isset($_REQUEST['setor_id'])?$_REQUEST['setor_id']:'';

        $novo_setor = UserSetorModel::create($user_id, $setor_id);
        
        $setores = SetorModel::getUserNotAsigneds($user_id);
        $user = UserModel::get($user_id);


        View::show('user_setor_form', [
            'user' => $user,
            'setores' => $setores
        ]);
    }

}
