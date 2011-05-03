<?php

/**
 * terms actions.
 *
 * @package    smashintracks
 * @subpackage terms
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class termsActions extends sfActions
{

  public function executeShow(sfWebRequest $request) {
    $this->terms = TextsPeer::doSelectText('terms');
  }
}
