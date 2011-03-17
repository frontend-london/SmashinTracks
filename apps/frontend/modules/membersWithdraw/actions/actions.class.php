<?php

/**
 * membersWithdraw actions.
 *
 * @package    smashintracks
 * @subpackage membersWithdraw
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class membersWithdrawActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $this->profile = ProfilesPeer::getCurrentProfile();
    $this->withdraw_nomoney_alert = $this->getUser()->getFlash('withdraw_nomoney_alert', false);
  }

  public function executeYourPaypal(sfWebRequest $request)
  {
    $profile = ProfilesPeer::getCurrentProfile();

    if($profile->getProfilesBalanceReal()<(sfConfig::get('app_min_withdraw'))) { // za mało środków na wypłacenie
        $this->getUser()->setFlash('withdraw_nomoney_alert', true); // wyświetli komunikat Sorry..
        $this->redirect('members_withdraw');
    }

    $form = new WithdrawForm();

    if ($request->isMethod('post') && $request->hasParameter('withdraw'))
    {
        $form->bind($request->getParameter('withdraw'));
        if ($form->isValid())
        {
            $withdraw = new Withdraws();
            $withdraw->setProfiles($profile);
            $withdraw->setWithdrawsPaypalAddress($form->getValue('email'));
            $withdraw->setWithdrawsDate(date('U'));
            $withdraw->setWithdrawsSaldoValue($profile->getProfilesBalance());
            $withdraw->save();
            $profile->setProfilesBalance(0);
            $profile->save();

            $this->getUser()->setFlash('withdraw_complete_message', true); // wyświetli komunikat OK..
            $this->redirect('members');
        }
    }
    $this->form = $form;

  }
}
