<?php


/**
 * Skeleton subclass for performing query and update operations on the 'transactions' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/03/11 19:41:24
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TransactionsPeer extends BaseTransactionsPeer {
    public static function getTransactionById($transaction_id, $criteria = null) {
        if ($criteria === null) {
                $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }
        $criteria->add(TransactionsPeer::TRANSACTIONS_ID, $transaction_id);
        return self::doSelectOne($criteria);
    }

    public static function getLastDoneTransactionsCriteria($amount = null, $criteria = null) {
        if ($criteria === null) {
                $criteria = new Criteria();
        }
        elseif ($criteria instanceof Criteria)
        {
                $criteria = clone $criteria;
        }
        if($amount!=null) $criteria->setLimit($amount); // limit dla transakcji a nie dla trackow, zakladam wiec najbardziej pesymistyczny przypadek - 1 transkakcja = 1  track
        $criteria->add(TransactionsPeer::TRANSACTIONS_DONE, true);
        $criteria->addDescendingOrderByColumn(TransactionsPeer::TRANSACTIONS_DATE);
        return $criteria;
    }

    public static function getLastDoneTransactions($amount = null, $criteria = null) {
        return self::doSelect(self::getLastDoneTransactionsCriteria($amount, $criteria));
    }

    public static function getTracksSoldLastPeriodAmount($from) {
        $criteria = self::getLastDoneTransactionsCriteria();
        $criteria->add(self::TRANSACTIONS_DATE, $from, Criteria::GREATER_EQUAL);
        $criteria->addJoin(TransactionsTracksPeer::TRANSACTIONS_ID, TransactionsPeer::TRANSACTIONS_ID);
        return TransactionsTracksPeer::doCount($criteria);
    }

    public static function getTracksSoldLastPeriodProfit($from) {
        $criteria = self::getLastDoneTransactionsCriteria();
        if(0) $criteria = new Criteria();
        $criteria->add(self::TRANSACTIONS_DATE, $from, Criteria::GREATER_EQUAL);
        $criteria->add(TransactionsSaldoPeer::PROFILES_ID, ProfilesPeer::getAdminProfileId());
        $criteria->addJoin(TransactionsTracksPeer::TRANSACTIONS_ID, TransactionsPeer::TRANSACTIONS_ID);
        $criteria->addJoin(TransactionsSaldoPeer::TRANSACTIONS_TRACKS_ID, TransactionsTracksPeer::TRANSACTIONS_TRACKS_ID);
        $criteria->addSelectColumn('SUM('.TransactionsSaldoPeer::TRANSACTIONS_SALDO_VALUE.')');
        $smtm = TransactionsSaldoPeer::doSelectStmt($criteria);
        $row = $smtm->fetch(PDO::FETCH_NUM);
        $saldo = $row[0];
        return Smashin::generate_prize($saldo/100);
    }

    public static function getTracksSoldTodayAmount() {
        $from = date('Y-m-d');
        return self::getTracksSoldLastPeriodAmount($from);
    }

    public static function getTracksSoldTodayProfit() {
        $from = date('Y-m-d');
        return self::getTracksSoldLastPeriodProfit($from);
    }

    public static function getTracksSoldThisMonthAmount() {
        $from = date('Y-m-01');
        return self::getTracksSoldLastPeriodAmount($from);
    }

    public static function getTracksSoldThisMonthProfit() {
        $from = date('Y-m-01');
        return self::getTracksSoldLastPeriodProfit($from);
    }
} // TransactionsPeer
