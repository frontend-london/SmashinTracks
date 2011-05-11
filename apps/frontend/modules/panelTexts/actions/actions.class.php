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
    $text_name = $request->getParameter('texts_name');
    if($text_name!='') {
        $text = TextsPeer::doSelectText($text_name);
        if(is_object($text)) {
            $text_value = $request->getParameter('texts_value');
            $text->setTextsValue($text_value);
            $text->save();
        }
    }
  }

  public function executeEdit(sfWebRequest $request)
  {
      $text = $this->getRoute()->getObject();
      $this->text = $text;
  }
}
