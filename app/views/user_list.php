<?php View::show('master_header',[
    'title'=>'Lista de usuarios'
]); ?>

<div>
    <h2>Lista de usuarios</h2>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($data as $indice => $user):?>
    <tr>
      <td><?php echo $user['id'] ?></td>
      <td><?php echo $user['name'] ?></td>
      <td><?php echo $user['email'] ?></td>
    </tr>
    <?php endforeach; ?>

  </tbody>
</table>

</div>

<?php View::show('master_footer'); ?>
