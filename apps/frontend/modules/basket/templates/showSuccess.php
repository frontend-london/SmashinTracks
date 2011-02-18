
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
						<a href="#"><img src="images/buttons/pay-paypal.gif" alt="Check out with PayPal" id="bp-img1" width="143" height="37" /></a>
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