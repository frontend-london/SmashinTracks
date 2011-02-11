

                <div class="box-silver" id="box-trackinfo">
                    <div class="bs-inner">
                        <h1><?=$profile->getProfilesName()?> - <?=$track->getTracksTitle()?></h1><br />
                        <div id="bt-tracks">
                            <?php include_partial('metadata/record', array('track' => $track)) ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('profile/artistinfo', array('profile' => $profile)) ?>

                <div class="box-white" id="box-mymusic">
                    <img src="images/texts/other-tracks.gif".gif" alt="Other Tracks" />

                    <div class="bw-tracks">
                        <?foreach ($pager->getResults() as $track):?>
                            <?php include_partial('metadata/record', array('track' => $track)) ?>
                        <?endforeach;?>
                        <div class="clear"></div>
                    </div>
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_object' => $track, 'route_name' => 'track', 'border' => true)) ?>

                </div>

                <div id="box-footer-border">
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
