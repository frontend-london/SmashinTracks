<?php

/**
 * TextsFaq filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTextsFaqFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'texts_faq_question' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'texts_faq_answer'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'texts_faq_order'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'texts_faq_question' => new sfValidatorPass(array('required' => false)),
      'texts_faq_answer'   => new sfValidatorPass(array('required' => false)),
      'texts_faq_order'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('texts_faq_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TextsFaq';
  }

  public function getFields()
  {
    return array(
      'texts_faq_id'       => 'Number',
      'texts_faq_question' => 'Text',
      'texts_faq_answer'   => 'Text',
      'texts_faq_order'    => 'Number',
    );
  }
}
