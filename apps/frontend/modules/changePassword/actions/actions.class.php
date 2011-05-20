<?php

/**
 * changePassword actions.
 *
 * @package    smashintracks
 * @subpackage changePassword
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class changePasswordActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $profile = $this->getRoute()->getObject();
    
    $this->forward404Unless($profile->isActive()); // tylko aktywne konta

    $form = new ChangePasswordForm();

    if ($request->isMethod('post') && $request->hasParameter('change_password'))
    {
        $form->bind($request->getParameter('change_password'));
        if ($form->isValid())
        {
            $profile->setProfilesPasswordUrl(null);
            $profile->setProfilesPassword($form->getValue('password'));
            $profile->save();
            $this->redirect('homepage');
        }
    }
    $this->form = $form;
    $this->profile = $profile;
  }
}
