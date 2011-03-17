<?php

function passValidator($validator, $values)
{
  $profile = ProfilesPeer::getCurrentProfile();
  if(ProfilesPeer::isPassCorrect($profile->getProfilesId(), $values['password']))
  {
    return $values;
  } else {
    throw new sfValidatorError($validator, 'invalid');
  } 
}

class WithdrawForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'email'       => new sfWidgetFormInputText(),
      'password'    => new sfWidgetFormInputPassword(),
    ));

    $this->widgetSchema->setNameFormat('withdraw[%s]');

    $this->setValidators(array(
      'email'   => new sfValidatorEmail(array('required' => true), array(
          'invalid' => 'Invalid email address.',
          'required'   => 'Email can not be empty.'
      )),
      'password' => new sfValidatorString(array('required' => true), array('required' => 'Password is required.')),
    ));

    $this->validatorSchema->setPostValidator(new sfValidatorCallback(
        array('callback'  => 'passValidator',),
        array('invalid'  => 'You have specified an incorrect password. <br />Please check your password and try again.')
    ));
  }

}