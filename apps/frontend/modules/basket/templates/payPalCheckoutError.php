                <? slot('head-after'); ?>
                    <meta http-equiv="refresh" content="10;url=<?=$sf_request->getUri();?>" />
                <? end_slot(); ?>

                <div class="box-white" id="box-top">
                    <img src="images/texts/members-checkout.gif" alt="Members Checkout" />
                    <div class="bw-div1">
                        Checkout not complete. Refresh site after 10 seconds to check again..
                    </div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>

                <? slot('box-message'); ?>
                    <div id="bm5-container">
                        <div class="box-message">
                            <div class="bm5-outer">
                                <div class="bm5-inner">
                                    <img src="images/texts/wait-a-moment.gif" alt="Wait a moment" class="bm5-img1" />
                                    <div class="bm5-div1">
                                        <?=TextsPeer::getTextValue('Koszyk-Order-Oczekiwanie-main-text')?>
                                        <div class="bm5-div2">
                                            <img src="images/icons/loader.gif" alt="" />
                                        </div>
                                    </div>
                                    <div class="button-silver-cancel">
                                        <div class="button-silver-left"></div>
                                        <div class="button-silver-right"></div>
                                        <a href="#" id="bm5-a-close">CANCEL</a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="bm5-bgr-top"></div>
                            <div class="bm5-bgr-bottom"></div>
                        </div>
                    </div>
                <? end_slot(); ?>