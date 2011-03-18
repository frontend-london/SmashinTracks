                <div class="box-silver" id="box-order">
                    <div class="bs-inner">
                        <img src="images/texts/order.gif" alt="Order:" id="bo-img1" />
                        <div id="bo-div1"># <?=$transaction->getTransactionsId()?></div>
                        <div class="clear"></div>
                        <div id="bo-div2">Ponizej tracki ktore kupiles <span class="blue">gotowe do sciagniecia.</span> Mozesz je sciagnac 3 razy, linki do nich beda dzialaly 24.</div>
                        <div id="bo-tracks">
                            <?foreach ($tracks as $track):?>
                                <?php include_partial('metadata/record', array('track' => $track->getTracks(), 'download' => true, 'transactions_tracks' => $track)) ?>
                            <?endforeach;?>
                            <div class="clear"></div>
                        </div>
                        <div id="bo-footer">
                            <?if(is_object($profile)):?>
                                <div class="left">
                                    <strong>See also:</strong>  <a href="<?=url_for('members_my-downloads')?>">MY DOWNLOADS</a>, <a href="<?=url_for('members_my-wishlist')?>">MY WISHLIST</a>
                                </div>
                            <?endif;?>
                            <div class="right">
                                <strong>Back to:</strong>  <a href="<?=url_for('homepage')?>">HOMEPAGE</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>