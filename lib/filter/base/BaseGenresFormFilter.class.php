<?php

/**
 * Genres filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseGenresFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'genres_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'genres_path' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'genres_name' => new sfValidatorPass(array('required' => false)),
      'genres_path' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('genres_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Genres';
  }

  public function getFields()
  {
    return array(
      'genres_id'   => 'Number',
      'genres_name' => 'Text',
      'genres_path' => 'Text',
    );
  }
}
