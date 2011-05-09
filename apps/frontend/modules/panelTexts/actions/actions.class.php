<?php

/**
 * panelTexts actions.
 *
 * @package    smashintracks
 * @subpackage panelTexts
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelTextsActions extends sfActions
{

  public function executeShow(sfWebRequest $request)
  {
  }

  public function executeEdit(sfWebRequest $request)
  {
      if(0) $text = new Texts();
      $text = $this->getRoute()->getObject();
  }
}
