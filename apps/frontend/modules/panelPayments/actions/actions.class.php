<?php

/**
 * panelPayments actions.
 *
 * @package    smashintracks
 * @subpackage panelPayments
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelPaymentsActions extends sfActions
{

  public function executeShow(sfWebRequest $request)
  {
    $pager = new sfPropelPager('Withdraws',sfConfig::get('app_max_withdraws_on_panel_list'));
    $pager->setCriteria(WithdrawsPeer::getLastDoneWithdrawsCriteria(0));
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();
    $this->pager = $pager;
  }

  public function executeShowArchive(sfWebRequest $request)
  {
    $pager = new sfPropelPager('Withdraws',sfConfig::get('app_max_withdraws_on_panel_list'));
    $pager->setCriteria(WithdrawsPeer::getLastDoneWithdrawsCriteria(1));
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();
    $this->pager = $pager;
  }

  public function executeShowProblem(sfWebRequest $request)
  {
    $pager = new sfPropelPager('Withdraws',sfConfig::get('app_max_withdraws_on_panel_list'));
    $pager->setCriteria(WithdrawsPeer::getLastDoneWithdrawsCriteria(2));
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();
    $this->pager = $pager;
  }

  public function executeSetProblem(sfWebRequest $request) {
      $withdraw = $this->getRoute()->getObject();
      $withdraw->setWithdrawsStatus(2);
      $withdraw->save();
      $this->redirect('panel_artists_problem');
  }

  public function executeSetDone(sfWebRequest $request) {
      $withdraw = $this->getRoute()->getObject();
      $withdraw->setWithdrawsStatus(1);
      $withdraw->save();
      $this->redirect('panel_payments_archive');
  }
}
