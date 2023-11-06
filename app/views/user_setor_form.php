<?php View::show('master_header', [
  'title' => 'Vincular setores a [' . $data['user']->id . ']' . $data['user']->name
]);

?>

<div class="container page">
  <h2>Vincular setores a [<?php echo $data['user']->id ?>]<?php echo $data['user']->name ?> </h2>

  <a class="btn btn-primary mb-2" href="<?php echo $app->make_url("users/{$data['user']->id}") ?>">Voltar ao usuário</a>
  <a class="btn btn-primary mb-2" href="<?php echo $app->make_url('setores/add') ?>">Cadastrar novo setor</a>
  

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($data['setores'] as $indice => $setor) : ?>
        <tr>
          <td><?php echo $setor['id'] ?></td>
          <td><?php echo $setor['name'] ?></td>
          <td>
            <form action="" method="POST">
              <input type="hidden" name="setor_id" value="<?php echo $setor['id'] ?>">
              <button class="btn btn-primary" type="submit">Vincular</button>
            </form>

          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>

</div>

<?php View::show('master_footer'); ?>