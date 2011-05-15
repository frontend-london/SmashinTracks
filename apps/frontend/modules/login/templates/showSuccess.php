                <div class="box-silver" id="box-logowanie">
                    <div class="bs-inner">
                        <form action="<?php echo url_for('login') ?>" method="POST" id="form_login_page" name="form_login_page">
                            <img src="images/texts/log-in.gif" alt="Log In" id="bl-img1" />
                            <div id="bl-div5">
                                Not a member yet? <a href="<?=url_for('register')?>">Sign up here</a>
                            </div>
                            <div class="clear"></div>
                            <div id="bl-div6"></div>
                            <div id="bl-div1">
                                <div class="bm3-left">
                                    <?php echo $form['email']->renderLabel('Your email:') ?>
                                </div>
                                <div class="bm3-right">
                                    <?php echo $form['email']->render(array('class' => 'input-290px'.($form['email']->hasError()?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="bl-div2">
                                <div class="bm3-left">
                                    <?php echo $form['password']->renderLabel('Password:') ?>
                                </div>
                                <div class="bm3-right">
                                    <?php echo $form['password']->render(array('class' => 'input-290px'.($form['password']->hasError()?' input-err':''))) ?>
                                </div>                                
                                <div class="clear"></div>
                            </div>
                            <div id="bl-div3">
                                <label>
                                    <?php echo $form['remember_me']->render() ?> <?php echo $form['remember_me']->renderLabel('Remember me') ?>
                                </label>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form->hasGlobalErrors()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['email']->renderError() ?>
                                    <?php echo $form['password']->renderError() ?>
                                    <?php echo $form['remember_me']->renderError() ?>
                                    <?php echo $form->renderGlobalErrors() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bl-div4">                           
                                <?php echo $form->renderHiddenFields() ?>
                                <input type="submit" class="input-submit" />
                                <div class="button-silver-back">
                                    <div class="button-silver-left"></div>
                                    <div class="button-silver-right"></div>
                                    <a href="javascript: history.go(-1)">Back</a>
                                </div>
                                <div class="button-login">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.form_login_page.submit();">Login</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="bl-div7">
                                <a href="#" id="a-forget-password">Forgot password?</a>
                            </div>
                            <div class="clear"></div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>