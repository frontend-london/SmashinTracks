<?php

/**
 * panelTransactionsHistory actions.
 *
 * @package    smashintracks
 * @subpackage panelTransactionsHistory
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelTransactionsHistoryActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $pager = new sfPropelPager('Transactions',sfConfig::get('app_max_transactions_on_panel_list'));
    $pager->setCriteria(TransactionsPeer::getLastDoneTransactionsCriteria());
    $pager->setPage($request->getParameter('page', 1)); // 1 = domyślna wartość
    $pager->init();

    $this->pager = $pager;
  }
}
