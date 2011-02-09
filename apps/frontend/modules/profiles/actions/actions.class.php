<?php

/**
 * profiles actions.
 *
 * @package    smashintracks
 * @subpackage profiles
 * @author     Your name here
 */
class profilesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->profiless = ProfilesPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->profiles = ProfilesPeer::retrieveByPk($request->getParameter('profiles_id'));
    $this->forward404Unless($this->profiles);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new profilesForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new profilesForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($profiles = ProfilesPeer::retrieveByPk($request->getParameter('profiles_id')), sprintf('Object profiles does not exist (%s).', $request->getParameter('profiles_id')));
    $this->form = new profilesForm($profiles);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($profiles = ProfilesPeer::retrieveByPk($request->getParameter('profiles_id')), sprintf('Object profiles does not exist (%s).', $request->getParameter('profiles_id')));
    $this->form = new profilesForm($profiles);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($profiles = ProfilesPeer::retrieveByPk($request->getParameter('profiles_id')), sprintf('Object profiles does not exist (%s).', $request->getParameter('profiles_id')));
    $profiles->delete();

    $this->redirect('profiles/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $profiles = $form->save();

      $this->redirect('profiles/edit?profiles_id='.$profiles->getProfilesId());
    }
  }
}
