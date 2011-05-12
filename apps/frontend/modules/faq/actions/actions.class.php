<?php

/**
 * faq actions.
 *
 * @package    smashintracks
 * @subpackage faq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faqActions extends sfActions
{
 
  public function executeShow(sfWebRequest $request) {
      $this->faq = TextsFaqPeer::getTexts();
  }
}
