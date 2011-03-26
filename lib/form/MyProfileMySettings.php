<?php

function passValidatorExtended($validator, $values)
{
  if($values['profiles_url_add_action'] || $values['profiles_url_edit_action']) { // przypadek, gdy hasło do profilu nie jest sprawdzane
      return $values; 
  } else {
      $profile = ProfilesPeer::getCurrentProfile();
      if(!empty($values['profiles_password']) && ProfilesPeer::isPassCorrect($profile->getProfilesId(), $values['profiles_password']))
      {
        return $values;
      } else {
        throw new sfValidatorError($validator, 'invalid');
      }
  }
}

class MyProfileMySettingsForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'profiles_name' => new sfWidgetFormInputText(),
      'profiles_email'                  => new sfWidgetFormInputText(),
      'profiles_password'               => new sfWidgetFormInputPassword(),
      'profiles_new_password'           => new sfWidgetFormInputPassword(),
      'profiles_new_password_confirm'   => new sfWidgetFormInputPassword(),
    ));

    $this->widgetSchema->setNameFormat('settings[%s]');

    $this->setValidators(array(
      'profiles_name'   => new sfValidatorString(),
      'profiles_email'   => new sfValidatorEmail(array(), array('invalid' => "Your email is invalid.", 'required'  => "Your email can not be empty.")),
      'profiles_password'   => new sfValidatorString(array('min_length' => 5, 'trim' => true), array('min_length' => "Your password is too short (min %min_length% characters).", 'max_length' => "Your password is too long (max %max_length% characters).", 'required' => "Your password can not be empty.", 'invalid',"Your password is invalid.")),
      'profiles_new_password'   => new sfValidatorString(array('min_length' => 5, 'trim' => true), array('min_length' => "New password is too short (min %min_length% characters).", 'max_length' => "New password is too long (max %max_length% characters).", 'required' => "New password can not be empty.", 'invalid',"New password is invalid.")),
      'profiles_new_password_confirm' => new sfValidatorString(array(), array('required' => "Confirm password can not be empty.")),
    ));

    $this->validatorSchema->setPostValidator(new sfValidatorCallback(
        array('callback'  => 'passValidatorExtended',),
        array('invalid'  => 'You have specified an incorrect password. <br />Please check your password and try again.')
    ));
  }

}