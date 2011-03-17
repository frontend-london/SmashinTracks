                <div class="box-white" id="box-top">
                    <img src="images/texts/members-checkout.gif" alt="Members Checkout" />
                    <div class="bw-div1">
                        Do zakupu trackow uzyles pieniedzy zarobionych na <a href="#" class="underline">SmashinTracks.com</a><br />
						Ponizej masz szczegóły transakcji...
                    </div>
                    <div class="bw-div6">
                        <dl>
                            <dt>Your balance (srodki):</dt>	<dd><?=$profile_balance;?></dd>
                            <dt>Basket total:</dt>		<dd><?=$basket_prize;?></dd>
                            <dt>New balance:</dt>		<dd><?=$new_balance?></dd>
                        </dl>
                    </div>
                    <div class="bw-div7">
                        <form action="<?php echo url_for('members_checkout') ?>" method="POST" id="form_checkout" name="form_checkout">
                        <div>
                            Wpisz <span class="blue">twoje hasło</span> którym posługujesz sie na <a href="http://smashintracks.com/" class="underline">SmashinTracks.com</a> aby <br />
                            potwierdzić tą platność...
                        </div>
                        <?php echo $form['password']->render(array('class' => 'input-290px'.(($form['password']->hasError() || $form->hasGlobalErrors())?' input-err':''), 'id' => 'input-bw-div7')) ?>
                        <?php echo $form->renderHiddenFields() ?>
                        <div class="button-paynow" id="bw-paynow">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="javascript: document.form_checkout.submit();">PAY NOW</a>
                        </div>
                        </form>
                    </div>
                    <div class="clear"></div>
                    <?php if ($form->hasGlobalErrors()): ?>
                        <div class="div-error-message" id="bw-div10">
                            <?php echo $form['password']->renderError() ?>
                            <?php echo $form->renderGlobalErrors() ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>