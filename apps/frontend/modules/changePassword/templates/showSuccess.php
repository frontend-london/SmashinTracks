                <div class="box-silver" id="box-changepassword">
                    <div class="bs-inner">
                        <form name="form_reset_password" id="form_reset_password" action="<?=url_for('change-password', $profile)?>" method="post">
                            <img src="images/texts/change-your-password.gif" alt="Change your password" id="bc-img1" />
                            <div id="bc-div1"><?=TextsPeer::getTextValue('Zmiana-hasla-main-text')?></div>
                            <div id="bc-div2">
                                <div class="bc-left"><?php echo $form['password']->renderLabel('Your new password:') ?></div>
                                <div class="bc-right">
                                    <?php echo $form['password']->render(array('class' => 'input-230px'.(($form['password']->hasError() || $form->hasGlobalErrors())?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['password']->hasError()): ?>
                                <div class="div-error-message" id="bc-div5">
                                    <?php echo $form['password']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bc-div3">
                                <div class="bc-left"><?php echo $form['password_confirm']->renderLabel('Re-type password:') ?></div>
                                <div class="bc-right">
                                    <?php echo $form['password_confirm']->render(array('class' => 'input-230px'.(($form['password_confirm']->hasError() || $form->hasGlobalErrors())?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['password_confirm']->hasError() || $form->hasGlobalErrors()): ?>
                                <div class="div-error-message" id="bc-div6">
                                    <?php echo $form['password_confirm']->renderError() ?>
                                    <?php echo $form->renderGlobalErrors() ?>
                                </div>
                            <?php endif; ?>
                            <?php echo $form->renderHiddenFields() ?>
                            <div id="bc-div4">
                                <div class="button-submit">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.form_reset_password.submit();">SUBMIT</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>