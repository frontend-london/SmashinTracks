<?php

/**
 * ajax actions.
 *
 * @package    smashintracks
 * @subpackage ajax
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ajaxActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeForgetPassword(sfWebRequest $request)
  {
      $this->setLayout(false);
  }

  public function executeForgetPasswordSubmit(sfWebRequest $request)
  {
      $this->setLayout(false);

      $email = $request->getParameter('forget_password_email');
      $email = Smashin::PHP_slashes($email);
      $profile = ProfilesPeer::getProfileByEmail($email);
      if(is_object($profile)) {
            $password_url = Smashin::generate_random_pass(32);
            $profile->setProfilesPasswordUrl($password_url);
            $profile->save();

            if(sfConfig::get('app_send_mail')) {

                $message = $this->getMailer()->compose();
                $message->setSubject('Smashintracks.com - Reset Password Link');
                $message->setTo($profile->getProfilesEmail());
                $message->setFrom(array(sfConfig::get('app_contact_form_mail_from') => 'Smashintracks.com'));

                $html = $this->getPartial('ajax/forgetPasswordEmailHtml', array('profile' => $profile));
                $message->setBody($html, 'text/html');
                $text = $this->getPartial('ajax/forgetPasswordEmailPlain', array('profile' => $profile));
                $message->addPart($text, 'text/plain');

                $this->getMailer()->send($message);

                $this->logMessage('Email (Forget Password URL) send', 'info');
            } else {
                $this->logMessage('Email (Forget Password URL) not send', 'alert');
            }

      } else {
        return sfView::ERROR;
      }

  }
}
