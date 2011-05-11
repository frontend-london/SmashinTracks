
                <div class="box-white" id="box-top">
                    <img src="images/texts/your-basket2.gif" alt="Your Basket" />
                    <div class="bw-div1">
                        <?=TextsPeer::getTextValue('Koszyk-main-text')?>
                    </div>
                    <div class="bw-tracks">
                        <?foreach ($tracks as $track):?>
                            <?php include_component('metadata', 'record', array('track' => $track, 'basket' => true)) ?>
                        <?endforeach;?>

                        <div class="clear"></div>
                    </div>
                    <div class="bw-div4">
                        Total Amount:  <strong><?=$prize?></strong>
                    </div>
                </div>

                <div class="box-silver" id="box-paymethod">
                    <div class="bs-inner">
                        <form name="paypal"  action="https://www.paypal.com/cgi-bin/webscr" method="post">                        
                            <input type="hidden" name="business" value="office@smashintracks.com" />
                            <input type="hidden" name="invoice" value="<?=$transaction->getTransactionsId();?>" />
                            <?$counter=1; foreach ($tracks as $track):?>
                                <input type="hidden" name="item_name_<?=$counter?>" value="MP3 Download: <?=$track->getTracksTitle()?> - <?=$track->getTracksArtist()?>" />
                                <input type="hidden" name="item_number_<?=$counter?>" value="<?=$transaction->getTransactionsId();?> <?=$track->getTracksId()?>-<?=$track->getProfilesId()?>" /> <?// 150273464 / 124109-631  = id_faktury / id_tracka-id_artysty ?>
                                <input type="hidden" name="amount_<?=$counter?>" value="<?=sfConfig::get('app_default_prize')?>" />
                                <input type="hidden" name="quantity_<?=$counter?>" value="1" />
                            <?$counter++; endforeach;?>
                            <input type="hidden" name="discount_amount_cart" value="0.00" /> <?// zniżka ?>
                            <input type="hidden" name="upload" value="1" /> <?// ma powiązanie z cmd ?>
                            <input type="hidden" name="cmd" value="_cart" /> <?// Its value determines which Website Payments Standard checkout experience you are using to obtain payment. ?>
                            <input type="hidden" name="no_shipping" value="2" /> <?//  prompt for an address, and require one?>
                            <input type="hidden" name="no_note" value="1" /> <?// Do not prompt payers to include a note with their payments ?>
                            <input type="hidden" name="currency_code" value="GBP" />
                            <input type="hidden" name="lc" value="GB" />
                            <input type="hidden" name="return" value="http://<?=$_SERVER['SERVER_NAME'].$sf_request->getRelativeUrlRoot()?>/basket/paypal-checkout/<?=$transaction->getTransactionsId();?>" />
                            <input type="image" name="submit" src="images/buttons/pay-paypal.gif" border="0" align="top" alt="PayPal" id="bp-img1" />
                        </form>

                        <a href="<?=url_for('members_checkout');?>"><img src="images/buttons/pay2-smashintracks.gif" alt="Zapłać pieniędzmi zarobionymi na SmashinTracks.com" id="bp-img2" width="144" height="51" /></a>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>