<?php

/**
 * Tracks filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseTracksFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tracks_title'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tracks_artist'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'profiles_id'     => new sfWidgetFormPropelChoice(array('model' => 'Profiles', 'add_empty' => true)),
      'tracks_path'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tracks_time'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tracks_accepted' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tracks_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'tracks_deleted'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'tracks_title'    => new sfValidatorPass(array('required' => false)),
      'tracks_artist'   => new sfValidatorPass(array('required' => false)),
      'profiles_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Profiles', 'column' => 'profiles_id')),
      'tracks_path'     => new sfValidatorPass(array('required' => false)),
      'tracks_time'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tracks_accepted' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tracks_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tracks_deleted'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tracks_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tracks';
  }

  public function getFields()
  {
    return array(
      'tracks_id'       => 'Number',
      'tracks_title'    => 'Text',
      'tracks_artist'   => 'Text',
      'profiles_id'     => 'ForeignKey',
      'tracks_path'     => 'Text',
      'tracks_time'     => 'Number',
      'tracks_accepted' => 'Number',
      'tracks_date'     => 'Date',
      'tracks_deleted'  => 'Number',
    );
  }
}
