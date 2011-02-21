
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
                        <a href="<?=url_for('basket_paypal_checkout');?>"><img src="images/buttons/pay-paypal.gif" alt="Check out with PayPal" id="bp-img1" width="143" height="37" /></a>
<!--
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="2FED52QFEAYUG">
    <input type="image" src="https://www.paypal.com/en_GB/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
    <img alt="" border="0" src="https://www.paypal.com/pl_PL/i/scr/pixel.gif" width="1" height="1">
</form>
-->
<form name="paypal" id="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <? $order_id = 123; // test ?>
             <input type="hidden" name="business" value="office@smashintracks.com" /> <!-- odbiorca -->
             <input type="hidden" name="invoice" value="<?=$order_id?>" />  <!-- nr faktury, w tym przypadku ten sam co w linku zwrotnym -->

            <?$counter=1; foreach ($tracks as $track):?>
                <input type="hidden" name="item_name_<?=$counter?>" value="MP3 Download: <?=$track->getTracksTitle()?> - <?=$track->getTracksArtist()?>" />
                <input type="hidden" name="item_number_<?=$counter?>" value="<?=$order_id?> / <?=$track->getTracksId()?>-<?=$track->getProfilesId()?>" /> <!-- 150273464 / 124109-631  = id_faktury / id_tracka-id_artysty -->
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
              <input type="hidden" name="return" value="http://smashintracks.localhost/frontend_dev.php/basket/paypal-checkout/<?=$order_id?>" /> <!-- url complete :D -->
              <input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" border="0" align="top" alt="PayPal" style="padding-left:5px;padding-right:5px;padding-top:9px;padding-bottom:9px;"/>
</form>


<!--<form name="paypal" id="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
              <input type="hidden" name="business" value="bigtunesltd@btinternet.com" />
              <input type="hidden" name="invoice" value="150273464" />
              <input type="hidden" name="item_name_1" value="MP3 Download: Never Over (Jack Got Groovy) - DaFt JacK" />
              <input type="hidden" name="item_number_1" value="150273464 / 124109-631" />
              <input type="hidden" name="amount_1" value="1.50" />
              <input type="hidden" name="quantity_1" value="1" />
              <input type="hidden" name="item_name_2" value="MP3 Download: House Jackerz Meets Rue Jay - Dont Mean a Thing (Jackin Mix) - Joe Hunt" />
              <input type="hidden" name="item_number_2" value="150273464 / 124108-575" />
              <input type="hidden" name="amount_2" value="1.50" />
              <input type="hidden" name="quantity_2" value="1" />
              <input type="hidden" name="item_name_3" value="MP3 Download:  No Stress - DJ Browny " />
              <input type="hidden" name="item_number_3" value="150273464 / 124107-59" />
              <input type="hidden" name="amount_3" value="1.50" />
              <input type="hidden" name="quantity_3" value="1" />
              <input type="hidden" name="item_name_4" value="MP3 Download: Don&#039;t mess with my man Vocal mix - B-TWO" />
              <input type="hidden" name="item_number_4" value="150273464 / 124106-689" />
              <input type="hidden" name="amount_4" value="1.50" />
              <input type="hidden" name="quantity_4" value="1" />
              <input type="hidden" name="discount_amount_cart" value="0.00" />
              <input type="hidden" name="upload" value="1" />
              <input type="hidden" name="cmd" value="_cart" />
              <input type="hidden" name="no_shipping" value="2" />
              <input type="hidden" name="no_note" value="1" />
              <input type="hidden" name="currency_code" value="GBP" />
              <input type="hidden" name="lc" value="GB" />
              <input type="hidden" name="return" value="http://bigtunesmp3.co.uk/order_complete/150273464" />
              <input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" border="0" align="top" alt="PayPal" style="padding-left:5px;padding-right:5px;padding-top:9px;padding-bottom:9px;"/>
</form>-->

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