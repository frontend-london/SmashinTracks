                <div class="box-silver" id="box-order">
                    <div class="bs-inner">
                        <img src="images/texts/order.gif" alt="Order:" id="bo-img1" />
                        <div id="bo-div1"># <?=$transaction->getTransactionsId()?></div>
                        <div class="clear"></div>
                        <div id="bo-div2">Ponizej tracki ktore kupiles <span class="blue">gotowe do sciagniecia.</span> Mozesz je sciagnac 3 razy, linki do nich beda dzialaly 24.</div>
                        <div id="bo-tracks">
                            <?//print_r($tracks)?>
                            <?foreach ($tracks as $track):?>
                                <?php include_partial('metadata/record', array('track' => $track->getTracks(), 'download' => true, 'transactions_tracks' => $track)) ?>
                            <?endforeach;?>

                            <div class="clear"></div>

                        </div>
                        <div id="bo-footer">
                        	<div class="left">
								<strong>See also:</strong>  <a href="#">MY DOWNLOADS</a>, <a href="#">MY WISHLIST</a>
                            </div>
                            <div class="right">
	                            <strong>Back to:</strong>  <a href="#">HOMEPAGE</a>
                            </div>
                            <div class="clear"></div>
                        </div>
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