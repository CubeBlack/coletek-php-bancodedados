
<?php View::show('master_header', [
  'title' => 'Setores de ['.$data['user']->id . ']'. $data['user']->name
]); 

?>

<div class="container page">
  <h2>Setores do usuário [<?php echo $data['user']->id ?>]<?php echo $data['user']->name ?> </h2>

  <a class="btn btn-primary mb-2" href="<?php echo $app->make_url('setores/add') ?>">Cadastrar novo setor</a>
  <a class="btn btn-primary mb-2" href="<?php echo $app->make_url("users/{$data['user']->id}/setores/add") ?>">Vincular setor ao usuário</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <tbody>
      <?php  foreach ($data['userSetores'] as $indice => $setor) : ?>
        <tr>
          <td><?php echo $setor['setor_id'] ?></td>
          <td><?php echo $setor['setor_name'] ?></td>
          <td>
            <a class="btn btn-danger" href="<?php echo $app->make_url("users/{$setor['user_id']}/setores/{$setor['setor_id']}/delete") ?> ">Desvincular usuário</a>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>

</div>

<?php View::show('master_footer'); ?>