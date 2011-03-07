<?php

/**
 * register actions.
 *
 * @package    smashintracks
 * @subpackage register
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function executeShow(sfWebRequest $request)
  {
    $this->form = new ProfilesForm();

    if ($request->isMethod('post'))
    {
       $this->form->bind($request->getParameter('profiles'));
       if ($this->form->isValid())
       {

           $mail = $this->form->getProfilesEmail();
           $mail_name = $this->form->getProfilesName();

          // send an email
          $message = $this->getMailer()->compose(
            array(sfConfig::get('app_contact_form_mail_from') => 'Smashintracks.com'),
            array($mail => $mail_name),
            'Welcome to SmashinTracks.com',
            '<html><head><title>Welcome to SmashinTracks.com</title></head><body><strong>Welcome to SmashinTracks.com</strong><br /><br /><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris cursus lobortis odio at malesuada. Aenean adipiscing neque eu augue faucibus sit amet aliquet lacus aliquam. Vestibulum eleifend scelerisque interdum. Suspendisse laoreet dignissim mauris, id lacinia mi consectetur eu. Proin nibh turpis, suscipit vel fermentum id, auctor aliquam dui. Sed dapibus augue ut leo iaculis blandit. Ut consectetur, lorem vel iaculis lacinia, risus nulla consectetur nisi, sit amet fringilla ligula purus vel libero. Nunc quis lorem in ante commodo tempus ut vel quam. Duis ac orci ante. Donec sit amet eros turpis, nec tristique massa. Maecenas id tellus urna.</p><br /><br />We wish you a great day. <br />    <strong>Smashintracks.com Team</strong><br /><br />    <a href="'."http://{$_SERVER['SERVER_NAME']}{$request->getRelativeUrlRoot()}/".'">www.smashintracks.com</a><br /><br />    <a href="'."http://{$_SERVER['SERVER_NAME']}{$request->getRelativeUrlRoot()}/".'"><img style="float: left;" src="http://smashintracks.com/images/logo_email.jpg" alt="" width="200" height="32" /></a><br />    </body>    </html>'
          );

          $this->getMailer()->send($message);

          $this->form->save();
          $this->redirect('register_welcome');
       }
    }

  }

  public function executeWelcome(sfWebRequest $request) {
      
  }
}
