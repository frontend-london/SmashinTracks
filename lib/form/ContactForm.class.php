<?php

class ContactForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormInputText(),
      'subject' => new sfWidgetFormInputText(),
      'email'   => new sfWidgetFormInputText(),
      'message' => new sfWidgetFormTextarea(),
    ));
  }
}