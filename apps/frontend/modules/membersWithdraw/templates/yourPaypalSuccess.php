                <div class="box-silver" id="box-yourpaypal2">
                    <div class="bs-inner">
                        <form action="<?php echo url_for('members_withdraw_your-paypal') ?>" method="POST" id="form_withdraw" name="form_withdraw">
                        <img src="images/texts/your-paypal.gif" alt="Your Paypal" id="by2-img1" />
                        <div id="by2-div1">
                            Enter your Paypal email adress bellow to withdraw your money.
                        </div>
                        <div id="by2-div2">
                            <div class="bm3-left">
                                <?php echo $form['email']->renderLabel('Your Paypal<br /> email adress:') ?>
                            </div>
                            <div class="bm3-right">
                                <?php echo $form['email']->render(array('class' => 'input-290px'.($form['email']->hasError()?' input-err':''))) ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="by2-div3">
                            <div class="bm3-left">
                                <?php echo $form['password']->renderLabel('Your password on SmashinTracks:') ?>
                            </div>
                            <div class="bm3-right">
                                <?php echo $form['password']->render(array('class' => 'input-290px'.($form['password']->hasError()?' input-err':''))) ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php if ($form->hasGlobalErrors()): ?>
                            <div class="div-error-message" id="by2-div5">
                                <?php echo $form['email']->renderError() ?>
                                <?php echo $form['password']->renderError() ?>
                                <?php echo $form->renderGlobalErrors() ?>
                            </div>
                        <?php endif; ?>
                        <div id="by2-div4">
                            <?php echo $form->renderHiddenFields() ?>
                            <div class="button-withdrawmoney">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="javascript: document.form_withdraw.submit();">Withdraw Money</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>