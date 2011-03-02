<?php

/**
 * Profiles form.
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
class ProfilesForm extends BaseProfilesForm
{
  public function configure()
  {
    //unset($this['profiles_id'], $this['profiles_id'], $this['profiles_date'], $this['profiles_path'],$this['profiles_photo'], $this['profiles_photo'], $this['profiles_balance'], $this['profiles_deleted'], $this['profiles_password_url']);
    $this->useFields(array('profiles_name', 'profiles_email', 'profiles_password', 'profiles_newsletter'));

    $this->validatorSchema['profiles_email'] = new sfValidatorAnd(array(
        $this->validatorSchema['profiles_email'],
        new sfValidatorEmail(),
    ));
  }
}
