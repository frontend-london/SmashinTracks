<?php

class SalesEmailForm extends BaseForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'on_sale'    => new sfWidgetFormInputCheckbox(),
      'daily' => new sfWidgetFormInputCheckbox(),
      'weekly'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->widgetSchema->setNameFormat('sales_email[%s]');

    $this->setValidators(array(
      'on_sale'    => new sfValidatorBoolean(array('required' => false)),
      'daily'    => new sfValidatorBoolean(array('required' => false)),
      'weekly'    => new sfValidatorBoolean(array('required' => false)),
    ));
  }
}