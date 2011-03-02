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
                        <div id="box-message">
                            <div id="bm5-outer">
                                <div id="bm5-inner">
                                    <img src="images/texts/wait-a-moment.gif" alt="Wait a moment" id="bm5-img1" />
                                    <div id="bm5-div1">
                                        <strong>Transakcja jest w trakcie realizacji.</strong> Zaczekaj parę chwil i nie zamykaj tej strony. Za moment otrzymasz tutaj link do zakupionych  przez ciebie tracków...
                                        <img src="images/icons/loader.gif" alt="" id="bm5-img2" />
                                    </div>
                                    <div class="button-close">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <a href="<?="http://{$_SERVER['SERVER_NAME']}{$sf_request->getRelativeUrlRoot()}/"?>" id="bm5-a1-close">CLOSE</a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div id="bm5-bgr-top"></div>
                            <div id="bm5-bgr-bottom"></div>
                        </div>
                    </div>
                <? end_slot(); ?>