<?php


/**
 * Skeleton subclass for representing a row from the 'withdraws' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * 02/03/11 19:41:25
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Withdraws extends BaseWithdraws {

    /**
     * Initializes internal state of Withdraws object.
     * @see        parent::__construct()
     */
    public function __construct()
    {
            // Make sure that parent constructor is always invoked, since that
            // is where any default values for this object are set.
            parent::__construct();
    }

    public function getWithdrawsDatePolish() {
        return Smashin::generateDateInPolish($this->getWithdrawsDate(null));
    }

    public function getWithdrawsSaldoValuePrize() {
        return Smashin::generate_prize($this->getWithdrawsSaldoValue()/100);
    }

} // Withdraws
