<?php

class ContactForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormInputText(),
      'subject' => new sfWidgetFormInputText(),
      'email'   => new sfWidgetFormInputText(),
      'content' => new sfWidgetFormTextarea(),
    ));

    $this->widgetSchema->setNameFormat('contact[%s]');

    $this->setValidators(array(
      'name'    => new sfValidatorString(array('required' => true), array('required'   => 'Your name can not be empty.',)),
      'email'   => new sfValidatorEmail(array('required' => true), array(
          'invalid' => 'Invalid email address.',
          'required'   => 'Email can not be empty.'
      )),
      'subject' => new sfValidatorString(array('required' => true), array('required' => 'Subject can not be empty.')),
      'content' => new sfValidatorString(array('required' => true), array(
        //array('min_length' => 4)  ,'min_length' => 'The message "%value%" is too short. It must be of %min_length% characters at least.',
        'required'   => 'Content can not be empty.'
      )),
    ));
  }
}