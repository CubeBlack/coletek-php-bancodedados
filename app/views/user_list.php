<?php View::show('master_header', [
  'title' => 'Lista de usuarios'
]); ?>

<div class="container page">
  <h2>Lista de usuarios</h2>

  <a class="btn btn-primary" href="<?php echo $app->make_url('users/add') ?>">Cadastrar Usuario</a>

  <form class="card my-2 " action="" method="GET">

    <div class="my-2 mx-2">
      <input class="" type="text" placeholder="Nome do usuario a ser pesquisado" name="pesquisa">

      <select name="setor" id="">
        <?php foreach ($data['setores'] as $indice => $setor): ?>
          <option value="<?php echo  $setor['id'] ?>"><?php echo  $setor['name'] ?></option>
        <?php endforeach ?>
        
      </select>
      <input type="checkbox" name="filtrar_por_setor" id="filtrar_por_setor">
      <label for="filtrar_por_setor">Filtrar por setor</label>

      <button class="btn btn-primary" type="submit">Pesquisar</button>
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