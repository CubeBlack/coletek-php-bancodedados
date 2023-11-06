<?php View::show('master_header', [
  'title' => 'Lista de usuários'
]); ?>

<div class="container page">
  <h2>Lista de usuários</h2>

  <a class="btn btn-primary" href="<?php echo $app->make_url('users/add') ?>">Cadastrar Usuário</a>

  <form class="card my-2 " action="<?php echo $app->make_url('users') ?>" method="GET">

    <div class="my-2 mx-2 row">
      <select name="setor" id="" class="form-select col" style="max-width: 200px;">
        <option value="">Todos</option>
        <?php foreach ($data['setores'] as $indice => $setor) : ?>
          <option value="<?php echo  $setor['id'] ?>" 
            <?php if($setor['id'] == $data['setor']){ echo 'selected'; } ?>>
              <?php echo  $setor['name'] ?>
          </option>
        <?php endforeach ?>

      </select>

      <button class="btn btn-primary col mx-2" type="submit" style="max-width: 100px;">Filtrar</button>
    </div>

  </form>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Setores</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($data['users'] as $indice => $user) : ?>
        <tr>
          <td><?php echo $user['id'] ?></td>
          <td><?php echo $user['name'] ?></td>
          <td><?php echo $user['email'] ?></td>
          <td><?php echo $user['setores'] ?></td>
          <td>
            <a class="btn btn-primary" href="<?php echo $app->make_url('users/' . $user['id']); ?>">Editar</a>
            <a class="btn btn-danger" href="<?php echo $app->make_url('users/' . $user['id'] . '/delete'); ?>">Apagar</a>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>

</div>

<?php View::show('master_footer'); ?>