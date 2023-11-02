<?php View::show('master_header', [
  'title' => 'Lista de usuarios'
]); ?>

<div>
  <h2>Lista de usuarios</h2>
  <div>
    
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col"></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($data as $indice => $user) : ?>
        <tr>
          <td><?php echo $user['id'] ?></td>
          <td><?php echo $user['name'] ?></td>
          <td><?php echo $user['email'] ?></td>
          <td>
            <a href="<?php echo $app->make_url('usuarios/' . $user['id']); ?>">Editar</a>
            <a href="<?php echo $app->make_url('usuarios/' . $user['id'] . '/delete'); ?>">Apagar</a>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>

</div>

<?php View::show('master_footer'); ?>