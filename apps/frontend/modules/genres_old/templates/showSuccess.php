<table>
  <tbody>
    <tr>
      <th>Genres:</th>
      <td><?php echo $genres->getGenresId() ?></td>
    </tr>
    <tr>
      <th>Genres name:</th>
      <td><?php echo $genres->getGenresName() ?></td>
    </tr>
    <tr>
      <th>Genres path:</th>
      <td><?php echo $genres->getGenresPath() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('genres/edit?genres_id='.$genres->getGenresId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('genres/index') ?>">List</a>
