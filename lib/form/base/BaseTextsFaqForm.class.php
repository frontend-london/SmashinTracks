<?php

/**
 * TextsFaq form base class.
 *
 * @method TextsFaq getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTextsFaqForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'texts_faq_id'       => new sfWidgetFormInputHidden(),
      'texts_faq_question' => new sfWidgetFormInputText(),
      'texts_faq_answer'   => new sfWidgetFormTextarea(),
      'texts_faq_order'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'texts_faq_id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->getTextsFaqId()), 'empty_value' => $this->getObject()->getTextsFaqId(), 'required' => false)),
      'texts_faq_question' => new sfValidatorString(array('max_length' => 300)),
      'texts_faq_answer'   => new sfValidatorString(),
      'texts_faq_order'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('texts_faq[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TextsFaq';
  }


}
