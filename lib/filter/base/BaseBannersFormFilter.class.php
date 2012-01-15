<?php

/**
 * Banners filter form base class.
 *
 * @package    smashintracks
 * @subpackage filter
 * @author     Piotr Kołodziejczyk
 */
abstract class BaseBannersFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'banners_type'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'banners_path'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'banners_url'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'banners_order'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'banners_active' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'banners_type'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'banners_path'   => new sfValidatorPass(array('required' => false)),
      'banners_url'    => new sfValidatorPass(array('required' => false)),
      'banners_order'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'banners_active' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('banners_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banners';
  }

  public function getFields()
  {
    return array(
      'banners_id'     => 'Number',
      'banners_type'   => 'Number',
      'banners_path'   => 'Text',
      'banners_url'    => 'Text',
      'banners_order'  => 'Number',
      'banners_active' => 'Number',
    );
  }
}
