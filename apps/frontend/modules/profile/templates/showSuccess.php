
                <div id="artistpage-top">
                    <h1><?=$profile->getProfilesName();?></h1><br />
					<div id="at-left">
                    	<img src="images/tmp/artist1.gif" alt="" />
                    </div>
					<div id="at-right">
                        <?=html_entity_decode($profile->getProfilesText());?>
                        <a href="#" id="at-url">www.youtube.com/martinob2007</a>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="box-white" id="box-mymusic">
                    <img src="images/texts/my-music.gif" alt="My Music" />

                        <div class="bw-tracks">
                            <?foreach ($profile->getTrackss() as $track):?>
                                <div class="track">
                                    <a href="#" class="track-player tp-new"><img src="images/profiles/<?=$profile->getProfilesPath(); ?>.jpg" alt="" /></a>
                                    <div class="track-row1">
                                        <div class="track-artist"><a href="<?=url_for('profile', $profile)?>"><?=$track->getTracksArtistUppercase(); ?></a></div>
                                        <div class="track-brand">
                                            <?$counter=0; foreach($track->getTracksGenressJoinGenres() as $trackgenre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genres', $trackgenre->getGenres())?>"><?echo $trackgenre->getGenres()->getGenresName();?></a><?$counter++; endforeach;?>
                                        </div>
                                        <div class="clear"></div>
                                    </div>                                <a href="#" class="track-right">
                                        <span class="track-cart"></span>
                                        <span class="track-buy">BUY NOW</span>
                                        <span class="track-prize">£1.50</span>
                                    </a>
                                    <div class="track-row2">
                                        <div class="track-name"><a href="#"><?=$track->getTracksTitleShorted(); ?></a></div>
                                        <div class="track-time"><?=$track->getTracksTimeFormatted(); ?></div>
                                        <a href="#" class="track-star"></a>
                                        <div class="track-added">Added: <?=$track->getTracksDate('Y-m-d'); ?></div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            <?endforeach;?>                            

                            <div class="clear"></div>

                        </div>
                        <div class="bw-div5">
	                        This profile has been viewed <strong>77 times</strong>  / <strong>6 added</strong> to favorites
                        </div>
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
