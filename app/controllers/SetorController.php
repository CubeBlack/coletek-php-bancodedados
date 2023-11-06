<?php
class SetorController
{
    public function index()
    {
        $users = SetorModel::getAll();
        View::show('setor_list', $users);
    }

    public function show($values)
    {
        $msg = 'Insira os valores para editar o registro.';

        $setor = SetorModel::get($values[1]);

        View::show('setor_form', [
            'setor' => $setor,
            'msg' => $msg,
        ]);
    }

    public function show_submit($values)
    {

        $setor = SetorModel::get($values[1]);

        $setor->name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';

        $setor = $setor->update($values[1]);

        View::show('setor_form', [
            'setor' => $setor,
            'msg' => SetorModel::$message
        ]);
    }

    public function add()
    {
        $msg = 'Insira os valores para registrar novo setor';
        View::show('setor_form', [
            'setor' => null,
            'msg' => $msg,
        ]);
    }

    public function add_submit()
    {
        $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : '';

        $setor = SetorModel::create($name);

        View::show('setor_form', [
            'setor' => $setor,
            'msg' => SetorModel::$message
        ]);
    }

    public function delete($values)
    {
        global $app;
        $setor = SetorModel::get($values[1]);

        View::show('operacao_form', [
            'title' => "Excluir Setor {$setor->id} - {$setor->name}",
            'msg' => 'Deseja realmente excluir o setor?',
            'return_url'=>$app->make_url('setores')
        ]);
    }

    public function delete_submit($values)
    {
        global $app;
        $setor = SetorModel::get($values[1]);
        $setor->delete();

        header("location: {$app->make_url('setores')}");
    }
}
