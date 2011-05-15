<div id="bm5-container-loginbox" <?if($form->isBound()):?>style="display:block"<?endif;?>>
                <div id="loginbox">
                    <div id="lb-outer">
                        <div id="lb-inner">
                            <img src="images/texts/log-in.gif" alt="Log In" id="lb-img1" />
                            <div id="lb-div1">
                                Not a member yet? <a href="<?=url_for('register')?>">Sign up here</a>
                            </div>
                            <div id="lb-div2"></div>
                            <div id="lb-divs">
                                <form action="<?php echo url_for('homepage') ?>" method="POST" id="form_login" name="form_login">
                                    <div id="lb-div3">
                                        <div class="lb-left">
                                            <?php echo $form['email']->renderLabel('Your email address:') ?>
                                        </div>
                                        <div class="lb-right">
                                            <?php echo $form['email']->render(array('class' => 'input-230px'.($form['email']->hasError()?' input-err':''))) ?>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div id="lb-div4">
                                        <div class="lb-left">
                                            <?php echo $form['password']->renderLabel('Password:') ?>
                                        </div>
                                        <div class="lb-right">
                                            <?php echo $form['password']->render(array('class' => 'input-230px'.($form['password']->hasError()?' input-err':''))) ?>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div id="lb-div5">
                                        <label>
                                            <?php echo $form['remember_me']->render() ?> <?php echo $form['remember_me']->renderLabel('Remember me') ?>
                                        </label>
                                    </div>
                                    <?php if ($form->hasGlobalErrors()): ?>
                                        <div class="div-error-message" id="lb-div10">
                                            <?php echo $form['email']->renderError() ?>
                                            <?php echo $form['password']->renderError() ?>
                                            <?php echo $form['remember_me']->renderError() ?>
                                            <?php echo $form->renderGlobalErrors() ?>
                                        </div>
                                    <?php endif; ?>
                                    <div id="lb-div6">
                                        <?php echo $form->renderHiddenFields() ?>
                                        <input type="submit" class="input-submit" />
                                        <div class="button-silver-cancel">
                                            <div class="button-silver-left"></div>
                                            <div class="button-silver-right"></div>
                                            <a href="#" id="a-loginbox-close">Cancel</a>
                                        </div>
                                        <div class="button-login">
                                            <div class="button-left"></div>
                                            <div class="button-right"></div>
                                            <a href="javascript: document.form_login.submit();">Login</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div id="lb-div7">
                                        <a href="#" id="a-forget-password">Forgot password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="lb-bgr-top"></div>
                    <div id="lb-bgr-bottom"></div>
                </div>
            </div>