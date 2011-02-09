<table>
  <tbody>
    <tr>
      <th>Profiles:</th>
      <td><?php echo $profiles->getProfilesId() ?></td>
    </tr>
    <tr>
      <th>Profiles name:</th>
      <td><?php echo $profiles->getProfilesName() ?></td>
    </tr>
    <tr>
      <th>Profiles email:</th>
      <td><?php echo $profiles->getProfilesEmail() ?></td>
    </tr>
    <tr>
      <th>Profiles password:</th>
      <td><?php echo $profiles->getProfilesPassword() ?></td>
    </tr>
    <tr>
      <th>Profiles text:</th>
      <td><?php echo $profiles->getProfilesText() ?></td>
    </tr>
    <tr>
      <th>Profiles date:</th>
      <td><?php echo $profiles->getProfilesDate() ?></td>
    </tr>
    <tr>
      <th>Profiles photo path:</th>
      <td><?php echo $profiles->getProfilesPhotoPath() ?></td>
    </tr>
    <tr>
      <th>Profiles balance:</th>
      <td><?php echo $profiles->getProfilesBalance() ?></td>
    </tr>
    <tr>
      <th>Profiles blocked:</th>
      <td><?php echo $profiles->getProfilesBlocked() ?></td>
    </tr>
    <tr>
      <th>Profiles deleted:</th>
      <td><?php echo $profiles->getProfilesDeleted() ?></td>
    </tr>
    <tr>
      <th>Profiles password url:</th>
      <td><?php echo $profiles->getProfilesPasswordUrl() ?></td>
    </tr>
    <tr>
      <th>Profiles newsletter:</th>
      <td><?php echo $profiles->getProfilesNewsletter() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('profiles/edit?profiles_id='.$profiles->getProfilesId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('profiles/index') ?>">List</a>
