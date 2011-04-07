                <div class="box-white" id="box-withdraw">
                    <img src="images/texts/withdraw-money.gif" alt="Withdraw Money" />
                    <div class="bw-div1">
                        Your current balance available to spend or withdraw is...
                    </div>
                    <div id="bw3-div1">
                        Your balance:    <strong><?=$profile->getProfilesBalanceText();?></strong>
                    </div>
                    <div id="bw3-div2">
                        If you would like your money paying to you via <span class="blue">PayPal</span> you will need a minimum ballance of <span class="blue"><?=Smashin::generate_prize(sfConfig::get('app_min_withdraw'))?></span> first.
                    </div>
                    <img src="images/texts/spend-it-on-smashintracks.gif" alt="Spend It on SmashinTracks.com" />
                    <div id="bw3-div3">
                        You can spend what you have earned instantly on <a href="#" class="underline">Smashintracks.com</a><br /><br />

                        When goto the checkout click <span class="blue">Pay with money earned on <a href="#" class="underline">Smashintracks.com</a></span><br />
                        and what you spend on tunes will be deducted from your earnings.
                    </div>
                    <img src="images/buttons/pay2-smashintracks.gif" alt="Pay with money earned on Smashin Tracks.com" id="bw3-img1" />
                </div>


                <div class="box-silver" id="box-yourpaypal">
                    <div class="bs-inner">
                        <img src="images/texts/your-paypal.gif" alt="Your Paypal" id="by-img1" />
                        <div id="by-div1">
                            Click the link bellow and we will send you your earnings on <span class="blue">your PayPal</span> account.
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
                                            Sorry but the minimum withrawal limit is <strong>£10</strong>
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