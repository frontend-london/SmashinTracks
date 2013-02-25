                <div class="box-white" id="box-top">
                    <img src="images/texts/members-checkout.gif" alt="Members Checkout" />
                    <div class="bw-div1">
                        You have used Smashintracks payment for your purchase.<br />
                        Transactions details below…
                    </div>
                    <?if($new_balance_prize>=0):?>
                        <div class="bw-div6">
                            <dl>
                                <dt>Your balance:</dt>	<dd><?=$profile_balance;?></dd>
                                <dt>Basket total:</dt>		<dd><?=$basket_prize;?></dd>
                                <dt>New balance:</dt>		<dd><?=$new_balance?></dd>
                            </dl>
                        </div>
                        <div class="bw-div7">
                            <form action="<?php echo url_for('members_checkout') ?>" method="POST" id="form_checkout" name="form_checkout">
                                <div>                                    
                                    Enter <span class="blue">your password</span> you are using in <a href="http://smashintracks.com/" class="underline">SmashinTracks.com</a> <br />to confirm payment.
                                </div>
                                <?php echo $form['password']->render(array('class' => 'input-290px'.(($form['password']->hasError() || $form->hasGlobalErrors())?' input-err':''), 'id' => 'input-bw-div7')) ?>
                                <?php echo $form->renderHiddenFields() ?>
                                <input type="submit" class="input-submit" />
                                <div class="button-paynow" id="bw-paynow">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.form_checkout.submit();">PAY NOW</a>
                                </div>
                                </form>
                        </div>
                    <?else:?>
                        <div class="bw-div7">
                            <br />
                            <p>Sorry, You don't have enought money to buy this tracks</p>
                        </div>
                    <?endif;?>                    
                    <div class="clear"></div>
                    <?php if ($form->hasGlobalErrors()): ?>
                        <div class="div-error-message" id="bw-div10">
                            <?php echo $form['password']->renderError() ?>
                            <?php echo $form->renderGlobalErrors() ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>
                
                <?if($new_balance_prize<0):?>
                    <? slot('box-message'); ?>
                        <div id="bm5-container">
                            <div class="box-message">
                                <div class="bm5-outer">
                                    <div class="bm5-inner">
                                        <img src="images/texts/sorry.gif" alt="Sorry" class="bm5-img1" />
                                        <div class="bm5-div1">
                                            <strong>You don't have enought money to buy this tracks.</strong>
                                        </div>
                                        <div class="button-close">
                                            <div class="button-left"></div>
                                            <div class="button-right"></div>
                                            <a href="<?=url_for('basket')?>" id="bm5-a1-close">CLOSE</a>
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