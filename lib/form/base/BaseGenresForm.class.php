<?php

/**
 * Genres form base class.
 *
 * @method Genres getObject() Returns the current form's model object
 *
 * @package    smashintracks
 * @subpackage form
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseGenresForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'genres_id'   => new sfWidgetFormInputHidden(),
      'genres_name' => new sfWidgetFormInputText(),
      'genres_path' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'genres_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getGenresId()), 'empty_value' => $this->getObject()->getGenresId(), 'required' => false)),
      'genres_name' => new sfValidatorString(array('max_length' => 45)),
      'genres_path' => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Genres', 'column' => array('genres_name'))),
        new sfValidatorPropelUnique(array('model' => 'Genres', 'column' => array('genres_path'))),
      ))
    );

    $this->widgetSchema->setNameFormat('genres[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Genres';
  }


}
