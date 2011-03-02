
                <div class="box-white" id="box-top">
                    <img src="images/texts/new-tracks.gif" alt="New Tracks" />
                    <div class="bw-div1">
                        Here are the latest <span class="blue">tunes</span> on <a href="#" class="underline">Smashintracks.com</a> that have been uploaded <br />
                        through producers FROM all genres. Check this out!
                    </div>

                        <div class="bw-tracks">

                            <?foreach ($pager->getResults() as $track):?>
                                <?php include_partial('metadata/record', array('track' => $track)) ?>
                            <?endforeach;?>

                            <div class="clear"></div>

                        </div>
                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>See also:</strong>  <a href="<?=url_for('artists')?>">TOP ARTISTS</a>, <a href="#">CHARTS</a>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <?php include_partial('metadata/paging', array('pager' => $pager, 'route_name' => 'new-tracks')) ?>
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