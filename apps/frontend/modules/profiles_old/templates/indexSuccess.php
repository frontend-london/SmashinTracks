<h1>Profiless List</h1>

<table>
  <thead>
    <tr>
      <th>Profiles</th>
      <th>Profiles name</th>
      <th>Profiles email</th>
      <th>Profiles password</th>
      <th>Profiles text</th>
      <th>Profiles date</th>
      <th>Profiles photo path</th>
      <th>Profiles balance</th>
      <th>Profiles blocked</th>
      <th>Profiles deleted</th>
      <th>Profiles password url</th>
      <th>Profiles newsletter</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($profiless as $profiles): ?>
    <tr>
      <td><a href="<?php echo url_for('profiles/show?profiles_id='.$profiles->getProfilesId()) ?>"><?php echo $profiles->getProfilesId() ?></a></td>
      <td><?php echo $profiles->getProfilesName() ?></td>
      <td><?php echo $profiles->getProfilesEmail() ?></td>
      <td><?php echo $profiles->getProfilesPassword() ?></td>
      <td><?php echo $profiles->getProfilesText() ?></td>
      <td><?php echo $profiles->getProfilesDate() ?></td>
      <td><?php echo $profiles->getProfilesPhotoPath() ?></td>
      <td><?php echo $profiles->getProfilesBalance() ?></td>
      <td><?php echo $profiles->getProfilesBlocked() ?></td>
      <td><?php echo $profiles->getProfilesDeleted() ?></td>
      <td><?php echo $profiles->getProfilesPasswordUrl() ?></td>
      <td><?php echo $profiles->getProfilesNewsletter() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('profiles/new') ?>">New</a>
