
                <div class="box-white" id="box-top">
                    <img src="images/texts/your-basket2.gif" alt="Your Basket" />
                    <div class="bw-div1">
                        Gdy dokonasz zaplaty dostaniesz <span class="blue">unikalne linki</span> gotowe do sciagniecia trackow <br />
                        ktore zakupiles. Mozesz <span class="blue">sciagnac 3 razy kazdy track</span>. Linki beda dzialaly <span class="blue">24 godziny.</span>
                    </div>

                        <div class="bw-tracks">

                            <?foreach ($tracks as $track):?>
                                <?php include_partial('metadata/record', array('track' => $track, 'basket' => true)) ?>
                            <?endforeach;?>

                            <div class="clear"></div>

                        </div>
                        <div class="bw-div4">
                            Total Amount:  <strong><?=$prize?></strong>
                        </div>
                </div>

                <div class="box-silver" id="box-paymethod">
                    <div class="bs-inner">
                        <!--<a href="<?=url_for('basket_paypal_checkout');?>"><img src="images/buttons/pay-paypal.gif" alt="Check out with PayPal" id="bp-img1" width="143" height="37" /></a>-->

                        <form name="paypal"  action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="business" value="office@smashintracks.com" /> <!-- odbiorca -->
                            <input type="hidden" name="invoice" value="<?=$transaction->getTransactionsId();?>" />  <!-- nr faktury, w tym przypadku ten sam co w linku zwrotnym -->
                            <?$counter=1; foreach ($tracks as $track):?>
                                <input type="hidden" name="item_name_<?=$counter?>" value="MP3 Download: <?=$track->getTracksTitle()?> - <?=$track->getTracksArtist()?>" />
                                <input type="hidden" name="item_number_<?=$counter?>" value="<?=$transaction->getTransactionsId();?> <?=$track->getTracksId()?>-<?=$track->getProfilesId()?>" /> <!-- 150273464 / 124109-631  = id_faktury / id_tracka-id_artysty -->
                                <input type="hidden" name="amount_<?=$counter?>" value="0.01" /> <!-- <?=sfConfig::get('app_default_prize')?> -->
                                <input type="hidden" name="quantity_<?=$counter?>" value="1" />
                            <?$counter++; endforeach;?>
                            <input type="hidden" name="discount_amount_cart" value="0.00" /> <!-- zniżka -->
                            <input type="hidden" name="upload" value="1" /> <!-- ma powiązanie z cmd -->
                            <input type="hidden" name="cmd" value="_cart" /> <!-- Its value determines which Website Payments Standard checkout experience you are using to obtain payment. -->
                            <input type="hidden" name="no_shipping" value="2" /> <!--  prompt for an address, and require one-->
                            <input type="hidden" name="no_note" value="1" /> <!-- Do not prompt payers to include a note with their payments -->
                            <input type="hidden" name="currency_code" value="GBP" /> <!-- waluta -->
                            <input type="hidden" name="lc" value="GB" /> <!-- waluta -->
                            <input type="hidden" name="return" value="http://modul.ayz.pl/basket/paypal-checkout/<?=$transaction->getTransactionsId();?>" /> <!-- url complete http://smashintracks.localhost/frontend_dev.php/basket/paypal-checkout/<?=$transaction->getTransactionsId();?> -->
                            <input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" border="0" align="top" alt="PayPal" id="bp-img1" />
                        </form>

                        <a href="#"><img src="images/buttons/pay2-smashintracks.gif" alt="Zapłać pieniędzmi zarobionymi na SmashinTracks.com" id="bp-img2" width="144" height="51" /></a>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <div id="box-footer">
                    <div id="bf-paypal">
                        <a href="#"><img src="images/icons/paypal.gif" alt="PayPal" /></a>
                    </div>
                    <div id="bf-addthis">
                        <!-- AddThis Button BEGIN -->
                        <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=modul"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
                        <script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
                        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=modul"></script>
                        <!-- AddThis Button END -->
                    </div>
                    <div class="clear"></div>
                </div>