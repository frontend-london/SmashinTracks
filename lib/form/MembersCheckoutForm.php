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

class MembersCheckoutForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'password'    => new sfWidgetFormInputPassword(),
    ));

    $this->widgetSchema->setNameFormat('checkout[%s]');

    $this->setValidators(array(
      'password' => new sfValidatorString(array('required' => true), array('required' => 'Password is required.')),
    ));

    $this->validatorSchema->setPostValidator(new sfValidatorCallback(
        array('callback'  => 'passValidator',),
        array('invalid'  => 'You have specified an incorrect password. <br />Please check your password and try again.')
    ));
  }

}