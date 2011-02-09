<h1>Genress List</h1>

<table>
  <thead>
    <tr>
      <th>Genres</th>
      <th>Genres name</th>
      <th>Genres path</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($genress as $genres): ?>
    <tr>
      <td><a href="<?php echo url_for('genres/show?genres_id='.$genres->getGenresId()) ?>"><?php echo $genres->getGenresId() ?></a></td>
      <td><?php echo $genres->getGenresName() ?></td>
      <td><?php echo $genres->getGenresPath() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('genres/new') ?>">New</a>
