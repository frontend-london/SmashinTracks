<?php

/**
 * panelNewLabelSettings actions.
 *
 * @package    smashintracks
 * @subpackage panelNewLabelSettings
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelNewLabelSettingsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {

      $period = $request->getParameter('period');
      $periods = array(1, 3, 7, 14, 30);
      if(isset($period) && in_array($period, $periods)) {
          $record = ConfigurationsPeer::getNewLabelPeriodRecord();
          $record->setConfiguratkonsValue($period);
          $record->save();
      } else {
          $period = ConfigurationsPeer::getNewLabelPeriod();
      }

      $this->period = $period;
  }
}
