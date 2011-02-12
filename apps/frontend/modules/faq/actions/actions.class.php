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
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  public function executeShow(sfWebRequest $request) {
      $this->faq = TextsFaqPeer::doSelect(new Criteria());
  }
}
