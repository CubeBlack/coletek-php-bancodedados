<?php View::show('master_header', [
  'title' => 'Lista de setores'
]); ?>

<div class="container page">
  <h2>Lista de setores</h2>

  <a class="btn btn-primary mb-2" href="<?php echo $app->make_url('setores/add') ?>">Cadastrar Setor</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($data as $indice => $setor) : ?>
        <tr>
          <td><?php echo $setor['id'] ?></td>
          <td><?php echo $setor['name'] ?></td>
          <td>
            <a class="btn btn-primary" href="<?php echo $app->make_url('setores/' . $setor['id']); ?>">Editar</a>
            <a class="btn btn-danger" href="<?php echo $app->make_url('setores/' . $setor['id'] . '/delete'); ?>">Apagar</a>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>

</div>

<?php View::show('master_footer'); ?>