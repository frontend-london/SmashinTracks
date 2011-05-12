<?php

/**
 * TextsFaq form.
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Your name here
 */
class TextsFaqForm extends BaseTextsFaqForm
{
  public function setup()
  {
    parent::setup();
    sfValidatorBase::setDefaultMessage('required', 'Wartość nie może być pusta.');
    sfValidatorBase::setDefaultMessage('invalid', 'Nieprawidowa wartość.');
    $this->useFields(array('texts_faq_question', 'texts_faq_answer'));
  }

  public function configure()
  {
    $this->setWidgets(array(
      'texts_faq_question'               => new sfWidgetFormInputText(),
      'texts_faq_answer'                 => new sfWidgetFormTextarea(),
    ));

    $this->widgetSchema->setNameFormat('texts[%s]');

    $field = 'Pytanie';
    $field_name = 'texts_faq_question';
    $this->getValidator($field_name)->addOption('min_length',3);
    $this->getValidator($field_name)->addOption('trim',true);
    $this->getValidator($field_name)->setMessage('min_length',"$field jest za krótkie (min %min_length% znaków).");
    $this->getValidator($field_name)->setMessage('max_length',"$field jest za długie (max %max_length% znaków).");
    $this->getValidator($field_name)->setMessage('required',"$field nie może być puste.");
    $this->getValidator($field_name)->setMessage('invalid',"$field jest nieprawidłowe.");

    $field = 'Odpowiedź';
    $field_name = 'texts_faq_answer';
    $this->getValidator($field_name)->addOption('min_length',3);
    $this->getValidator($field_name)->addOption('trim',true);
    $this->getValidator($field_name)->setMessage('min_length',"$field jest za krótka (min %min_length% znaków).");
    $this->getValidator($field_name)->setMessage('max_length',"$field jest za długa (max %max_length% znaków).");
    $this->getValidator($field_name)->setMessage('required',"$field nie może być pusta.");
    $this->getValidator($field_name)->setMessage('invalid',"$field jest nieprawidłowa.");
  }
}
