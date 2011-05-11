                <div class="box-white" id="box-withdraw">
                    <img src="images/texts/withdraw-money.gif" alt="Withdraw Money" />
                    <?=Smashin::generate_injected_text(TextsPeer::getTextValue('ZALOGOWANY-Wyplata-pieniedzy-main-text'), array('__BALANCE__' => $profile->getProfilesBalanceText()))?>
                    <img src="images/texts/spend-it-on-smashintracks.gif" alt="Spend It on SmashinTracks.com" />
                    <div id="bw3-div3">
                        <?=TextsPeer::getTextValue('ZALOGOWANY-Wyplata-pieniedzy-spend-it-on')?>
                    </div>
                    <img src="images/buttons/pay2-smashintracks.gif" alt="Pay with money earned on Smashin Tracks.com" id="bw3-img1" />
                </div>


                <div class="box-silver" id="box-yourpaypal">
                    <div class="bs-inner">
                        <img src="images/texts/your-paypal.gif" alt="Your Paypal" id="by-img1" />
                        <div id="by-div1">
                            <?=TextsPeer::getTextValue('ZALOGOWANY-Wyplata-pieniedzy-your-paypal')?>
                        </div>
                        <div class="button-withdrawmoneytopaypal">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="<?=url_for('members_withdraw_your-paypal');?>">Withdraw Money to PayPal</a>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>

                <?if($withdraw_nomoney_alert):?>
                    <? slot('box-message'); ?>
                        <div id="bm5-container">
                            <div class="box-message">
                                <div class="bm5-outer">
                                    <div class="bm5-inner">
                                        <img src="images/texts/sorry.gif" alt="Sorry" class="bm5-img1" />
                                        <div class="bm5-div1">
                                            <?=TextsPeer::getTextValue('ZALOGOWANY-Wyplata-pieniedzy-sorry')?>
                                        </div>
                                        <div class="button-close">
                                            <div class="button-left"></div>
                                            <div class="button-right"></div>
                                            <a href="#" id="bm5-a-close">CLOSE</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="bm5-bgr-top"></div>
                                <div class="bm5-bgr-bottom"></div>
                            </div>
                        </div>
                    <? end_slot(); ?>
                <?endif;?>