<?php
View::show('master_header', [
    'title' => 'Lista de usuários'
]);


?>

<div class="container-centralizar page">
    <form class="card" method="POST">
        <div class="card-body">
            <h5 class="card-title"><?php echo $data['title'] ?></h5>

            <p class="card-text"><?php echo $data['msg'] ?></p>
            
            <button type="submit" class="btn btn-danger" href="#" class="card-link">Sim, excluir</button>
            <a class="btn btn-primary" href="<?php echo $data['return_url'] ?>" class="card-link">Não, apenas voltar</a>
        </div>
    </form>

</div>



<?php View::show('master_footer'); ?>