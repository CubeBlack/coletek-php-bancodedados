<?php

if ($data['setor']) {
    $title = "Setor: {$data['setor']->id} - {$data['setor']->name}";
    $action = $app->make_url("setores/{$data['setor']->id}/submit");
    $name = $data['setor']->name;
} else {
    $title = 'Adicione novo setor';
    $action = $app->make_url('setores/add_submit');
    $name = '';

}

View::show('master_header', [
    'title' => $title
]);

?>

<div>

    <form class="container" method="POST" action="<?php echo $action ?>">
        <h2><?php echo $title ?></h2>
        <div><?php echo $data['msg'] ?></div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $name ?>">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>

<?php View::show('master_footer'); ?>