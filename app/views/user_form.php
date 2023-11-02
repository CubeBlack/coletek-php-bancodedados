<?php

if ($data['user']) {
    $title = "Usuario: {$data['user']->id} - {$data['user']->name}";
    $action = $app->make_url("users/{$data['user']->id}/submit");
    $name = $data['user']->name;
    $email = $data['user']->email;
} else {
    $title = 'Adicione novo usuario';
    $action = $app->make_url('users/add_submit');
    $name = '';
    $email = '';
}

View::show('master_header', [
    'title' => $title
]);

?>

<div>

    <form class="container page" method="POST" action="<?php echo $action ?>">
        <h2><?php echo $title ?></h2>
        <div><?php echo $data['msg'] ?></div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $name ?>">
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $email ?>">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>

<?php View::show('master_footer'); ?>