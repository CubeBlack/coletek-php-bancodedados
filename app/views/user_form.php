<?php

if ($data['user']) {
    $title = "Usuário [{$data['user']->id}]{$data['user']->name}";
    $action = $app->make_url("users/{$data['user']->id}/submit");
    $name = $data['user']->name;
    $email = $data['user']->email;
} else {
    $title = 'Adicione novo usuário';
    $action = $app->make_url('users/add_submit');
    $name = '';
    $email = '';
}

View::show('master_header', [
    'title' => $title
]);

?>

<div class="container page">
    <h2><?php echo $title ?></h2>
    <form class="card mb-2" method="POST" action="<?php echo $action ?>">
        <div class="card-body">
            <h3>Dados pessoas</h3>
            <div><?php echo $data['msg'] ?></div>

            <div class="form-group ">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $name ?>">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $email ?>">
            </div>

            <?php if ($data['user']) : ?>
                <div class="card my-2">
                    <div class="card-body">
                        Setores:
                        <div>
                            <?php echo $data['user']->setores ?>
                        </div>
                        
                        <a class="btn btn-primary mt-2" href="<?php echo $app->make_url("users/{$data['user']->id}/setores") ?>">Editar setores do usuário</a>
                    </div>
                </div>
            <?php endif ?>

            <button type="submit" class="btn btn-primary mt-2">Submit</button>

        </div>

    </form>


</div>

<?php View::show('master_footer'); ?>