                <div class="box-silver" id="box-rejestracja">
                    <div class="bs-inner">
                        <img src="images/texts/register.gif" alt="Register" id="br3-img1" />
                        <form action="<?php echo url_for('register') ?>" method="POST" id="form_register" name="form_register">
                            <div id="br3-div1">
                                <div class="bm3-left"><?php echo $form['profiles_name']->renderLabel('Your name:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['profiles_name']->render(array('class' => 'input-290px'.($form['profiles_name']->hasError()?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['profiles_name']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_name']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="br3-div2">
                                    <div class="bm3-left"><?php echo $form['profiles_email']->renderLabel('Your email:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['profiles_email']->render(array('class' => 'input-290px'.($form['profiles_email']->hasError()?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <?php if ($form['profiles_email']->hasError()): ?>
                            <div class="div-error-message">
                                <?php echo $form['profiles_email']->renderError() ?>
                            </div>
                        <?php endif; ?>
                            <div id="br3-div3">
                                    <div class="bm3-left"><?php echo $form['profiles_password']->renderLabel('Password:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['profiles_password']->render(array('class' => 'input-290px'.($form['profiles_password']->hasError()?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['profiles_password']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_password']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="br3-div4">
                                <div class="bm3-left"><?php echo $form['profiles_password_confirm']->renderLabel('Confirm password:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['profiles_password_confirm']->render(array('class' => 'input-290px'.($form['profiles_password_confirm']->hasError()?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['profiles_password_confirm']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_password_confirm']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="br3-div5">
                                <label>
                                    <!--<input type="checkbox" name="#" value="" class="input-checkbox" />-->
                                    <?php echo $form['profiles_newsletter']->render(array('class' => 'input-checkbox')) ?>
                                    <span><?php echo $form['profiles_newsletter']->renderLabel('Yes, sign me up for all the latest news and info') ?></span>
                                </label>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['profiles_newsletter']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_newsletter']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="br3-div6">
                                <label>
                                    <!--<input type="checkbox" name="#" value="" class="input-checkbox" />-->
                                    <?php echo $form['profiles_terms']->render(array('class' => 'input-checkbox')) ?>
                                    <span><?php echo $form['profiles_terms']->renderLabel('I agree to the <a href="#" class="bold blue">Terms &amp; Conditions</a> of<br /> Smashintracks.com ') ?></span>
                                </label>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['profiles_terms']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_terms']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($form->hasGlobalErrors()): ?>
                                <div class="div-error-message">
                                    <?php echo $form->renderGlobalErrors() ?>
                                </div>
                            <?php endif; ?>
                            <div id="br3-div7">
                                <?php echo $form->renderHiddenFields() ?>
                                <div class="button-silver-cancel">
                                    <div class="button-silver-left"></div>
                                    <div class="button-silver-right"></div>
                                    <a href="#">Cancel</a>
                                </div>
                                <div class="button-register">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.form_register.submit();">Register</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>