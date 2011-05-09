<?php

/**
 * panelSales actions.
 *
 * @package    smashintracks
 * @subpackage panelSales
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panelSalesActions extends sfActions
{

  public function executeShow(sfWebRequest $request)
  {
    $profile = $this->getRoute()->getObject();
    $transactions = $profile->getAllTransactions();

    $pager = new myArrayPager(null, sfConfig::get('app_max_transactions_on_list'));
    $pager->setResultArray($transactions);
    $pager->setPage($this->getRequestParameter('page',1));
    $pager->init();

    $this->pager = $pager;
    $this->profile = $profile;
  }
}
