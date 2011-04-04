                <div class="box-silver" id="box-changepassword">
                    <div class="bs-inner">
                        <form name="form_reset_password" id="form_reset_password" action="<?=url_for('change-password', $profile)?>" method="post">
                            <img src="images/texts/change-your-password.gif" alt="Change your password" id="bc-img1" />
                            <div id="bc-div1">Please select a clever new password below.</div>
                            <div id="bc-div2">
                                    <div class="bc-left">Your new password:</div>
                                <div class="bc-right">
                                    <input type="text" class="input-230px" name="#" value="" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="bc-div3">
                                    <div class="bc-left">Re-type password:</div>
                                <div class="bc-right">
                                    <input type="text" class="input-230px" name="#" value="" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="bc-div4">
                                <div class="button-submit">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">SUBMIT</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>