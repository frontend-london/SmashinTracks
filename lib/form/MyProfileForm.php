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

class MyProfileForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'profiles_text' => new sfWidgetFormTextarea(),
      'profiles_photo' => new sfWidgetFormInputFile(),
      'profiles_photo_delete' => new sfWidgetFormInputCheckbox(),
      'profiles_url_add' => new sfWidgetFormInputText(),
      'profiles_url_add_action' => new sfWidgetFormInputHiddenPassword(),
      'profiles_url_edit' => new sfWidgetFormInputText(),
      'profiles_url_edit_id' => new sfWidgetFormInputHidden(),
      'profiles_url_edit_action' => new sfWidgetFormInputHiddenPassword(),
      'profiles_password'    => new sfWidgetFormInputPassword(),
    ));

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->setValidators(array(
      'profiles_text'   => new sfValidatorString(array('required' => false)),
      'profiles_photo'  => new sfValidatorFile(array(
                              'max_size' => 102400,
                              'mime_types' => 'web_images', //you can set your own of course
                              'required' => false,
                          )),
      'profiles_photo_delete' => new sfValidatorBoolean(array('required' => false)),
      'profiles_url_add' => new sfValidatorUrlHttp(array('required' => false), array('invalid'  => 'Invalid URL.')),
      'profiles_url_add_action' => new sfValidatorBoolean(array('required' => false)),
      'profiles_url_edit' => new sfValidatorUrlHttp(array('required' => false), array('invalid'  => 'Invalid URL.')),
      'profiles_url_edit_action' => new sfValidatorBoolean(array('required' => false)),
      'profiles_url_edit_id' => new sfValidatorInteger(array('required' => false)),
      'profiles_password' => new sfValidatorString(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(new sfValidatorCallback(
        array('callback'  => 'passValidatorExtended',),
        array('invalid'  => 'You have specified an incorrect password. <br />Please check your password and try again.')
    ));
  }

}