<?php

/**
 * panelTextsFaq actions.
 *
 * @package    smashintracks
 * @subpackage panelTextsFaq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelTextsFaqActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $texts = TextsFaqPeer::getTexts();

    $text_edit_error = false;

    if($request->getParameter('subsection')=='text-edit') {
        $active_text = $this->getRoute()->getObject();
    } else {
        $active_text = null;
    }
    $form = new TextsFaqForm($active_text);
    $this->form = $form;
    $this->active_text = $active_text;
    $this->texts = $texts;
  }

  public function executeDelete(sfWebRequest $request) {
    $text = $this->getRoute()->getObject();
    $text->delete();
    $this->redirect('panel_texts_faq');
  }

  public function executeChangeOrder(sfWebRequest $request) {
    $text = $this->getRoute()->getObject();
    if(0) $text = new TextsFaq();

    $second_text_id = $request->getParameter('second_texts_faq_id');
    $second_text = TextsFaqPeer::getTextById($second_text_id);
    $this->forward404Unless(is_object($second_text));

    $text_order = $text->getTextsFaqOrder();
    $second_text_order = $second_text->getTextsFaqOrder();

    $text->setTextsFaqOrder($second_text_order);
    $second_text->setTextsFaqOrder($text_order);

    $text->save();
    $second_text->save();
    $this->redirect('panel_texts_faq');
  }
}
