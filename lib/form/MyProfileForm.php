<?php

function passValidator($validator, $values)
{
  $profile = ProfilesPeer::getCurrentProfile();
  if(ProfilesPeer::isPassCorrect($profile->getProfilesId(), $values['profiles_password']))
  {
    return $values;
  } else {
    throw new sfValidatorError($validator, 'invalid');
  }
}

class MyProfileForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'profiles_text' => new sfWidgetFormTextarea(),
      'profiles_photo' => new sfWidgetFormInputFile(),
      'profiles_password'    => new sfWidgetFormInputPassword(),
    ));

    $this->widgetSchema->setNameFormat('profile[%s]');

    $this->setValidators(array(
      'profiles_text'   => new sfValidatorString(array('required' => false)),
      'profiles_photo'  => new sfValidatorFile(array(
                              'max_size' => 500000,
                              'mime_types' => 'web_images', //you can set your own of course
                              'path' => '/web/images/profiles/upload',
                              'required' => false,
//                              'validated_file_class' => 'sfValidatedFileCustom'
                          )),

        

      'profiles_password' => new sfValidatorString(array('required' => true), array('required' => 'Password is required.')),




    ));

    $this->validatorSchema->setPostValidator(new sfValidatorCallback(
        array('callback'  => 'passValidator',),
        array('invalid'  => 'You have specified an incorrect password. <br />Please check your password and try again.')
    ));
  }

}