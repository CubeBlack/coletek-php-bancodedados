<?php
class UserController
{
    public function index()
    {
        $pesquisa = isset($_REQUEST['pesquisa'])?$_REQUEST['pesquisa']:'';
        $setor = isset($_REQUEST['filtrar_por_setor'])?$_REQUEST['setor']:'';

        $users = UserModel::getWhere($pesquisa, $setor);

        $setores = SetorModel::getAll();
        View::show(
            'user_list',
            [
                'users' => $users,
                'setores' => $setores
            ]
        );
    }

    public function show($values)
    {
        $msg = 'Insira os valores para editar o registro.';

        $user = UserModel::get($values[1]);

        View::show('user_form', [
            'user' => $user,
            'msg' => $msg,
        ]);
    }

    public function show_submit($values)
    {

        $user = UserModel::get($values[1]);

        $user->email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
        $user->name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';

        $user = $user->update($values[1]);

        View::show('user_form', [
            'user' => $user,
            'msg' => $user->message,
        ]);
    }

    public function add()
    {
        $msg = 'Insira os valores para registrar novo usuario';
        View::show('user_form', [
            'user' => null,
            'msg' => $msg,
        ]);
    }

    public function add_submit()
    {
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';

        $user = UserModel::create($name, $email);

        View::show('user_form', [
            'user' => $user,
            'msg' => $user->message
        ]);
    }

    public function delete($values)
    {
        global $app;
        $user = UserModel::get($values[1]);

        View::show('operacao_form', [
            'title' => "Excluir User {$user->id} - {$user->name}",
            'msg' => 'Deseja realmente excluir o usuario?',
            'return_url' => $app->make_url('users')
        ]);
    }

    public function delete_submit($values)
    {
        global $app;
        $user = UserModel::get($values[1]);
        $user->delete();

        header("location: {$app->make_url('users')}");
    }
}
