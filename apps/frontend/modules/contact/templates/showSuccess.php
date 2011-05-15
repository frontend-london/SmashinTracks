                <div class="box-white" id="box-contactus">
                    <img src="images/texts/contact-us.gif" alt="Contact Us" />
                    <form action="<?php echo url_for('contact') ?>" method="POST" id="form_contact" name="form_contact">
                        <div class="bw-div1">
                            <?=TextsPeer::getTextValue('Kontakt-main-text')?>
                        </div>
                        <div id="bc2-div2">
                            <div class="bm3-left"><?php echo $form['name']->renderLabel('Your name:') ?></div>
                            <div class="bm3-right">
                                <?php echo $form['name']->render(array('class' => 'input-290px'.($form['name']->hasError()?' input-err':''))) ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php if ($form['name']->hasError()): ?>
                            <div class="div-error-message">
                                <?php echo $form['name']->renderError() ?>
                            </div>
                        <?php endif; ?>
                        <div id="bc2-div6">
                            <div class="bm3-left"><?php echo $form['subject']->renderLabel('Subject:') ?></div>
                            <div class="bm3-right">
                                <?php echo $form['subject']->render(array('class' => 'input-290px'.($form['subject']->hasError()?' input-err':''))) ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php if ($form['subject']->hasError()): ?>
                            <div class="div-error-message">
                                <?php echo $form['subject']->renderError() ?>
                            </div>
                        <?php endif; ?>
                        <div id="bc2-div3">
                            <div class="bm3-left"><?php echo $form['content']->renderLabel('Content:') ?></div>
                            <div class="bm3-right">
                                <div class="div-textarea-397px<?php echo($form['content']->hasError()?' div-textarea-err':'')?>">
                                    <?php echo $form['content']->render(array('class' => 'textarea-397px')) ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php if ($form['content']->hasError()): ?>
                            <div class="div-error-message">
                                <?php echo $form['content']->renderError() ?>
                            </div>
                        <?php endif; ?>
                        <div id="bc2-div5">
                            <input type="submit" class="input-submit" />
                            <div class="bm3-left"><?php echo $form['email']->renderLabel('Your email:') ?></div>
                            <div class="bm3-right">
                                <?php echo $form['email']->render(array('class' => 'input-290px'.($form['email']->hasError()?' input-err':''))) ?>
                                <?php echo $form->renderHiddenFields() ?>
                                <div class="button-save">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.form_contact.submit();">SEND</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php if ($form['email']->hasError()): ?>
                            <div class="div-error-message">
                                <?php echo $form['email']->renderError() ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($form->hasGlobalErrors()): ?>
                            <div class="div-error-message">
                                <?php echo $form->renderGlobalErrors() ?>
                            </div>
                        <?php endif; ?>
                        
                    </form>
                </div>

                <?php include_partial('metadata/footer', array('border' => true, 'share' => false)) ?>