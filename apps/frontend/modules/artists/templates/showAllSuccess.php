                <div class="box-white" id="box-top">
                    <img src="images/texts/artists.gif" alt="Artists" />
                    <div class="bw-div1">
                        Sed vitae tellus dui, <span class="blue">non condimentum</span> purus. Sed vitae tellus dui, non <br />
                        condimentum purus. See also other 'CHARTS'.
                    </div>
                    <div class="bw-div8">
                    	<div class="bookmark bookmark-nobgr-right">
                            <a href="<?=url_for('artists')?>">30 MOST POPULAR</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                    	<div class="bookmark bookmark-active bookmark-nobgr-right">
                            <a href="<?=url_for('artists_all')?>">ALL ARTIST</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                        <div class="clear"></div>
                    </div>

                        <div class="bw-tracks">

                        

                        <? $previous_letter = '';
                          foreach ($artists as $artist):
                            $letter=strtoupper($artist->getProfilesNameFirstLetter());?>
                            <?if($letter != $previous_letter):?>
                                <div class="letter" id="letter-<?=strtolower($letter);?>"><?=$letter?></div>
                            <?endif; $previous_letter = $letter;?>
                                
                            <div class="track">
                                <span class="track-player">
                                    <?if($artist->getProfilesPhoto()):?><img src="images/profiles/small/<?=$artist->getProfilesPath(); ?>.jpg" alt="<?=$artist->getProfilesName()?>" /><?else:?><img src="images/icons/default_profile.png" alt="" /><?endif;?></a>
                                </span>
                                <div class="track-row1">
                                    <div class="track-artist bold"><a href="<?=url_for('profile', $artist)?>"><?=$artist->getProfilesName()?></a></div>
                                    <div class="track-artist-num">(<?=$artist->countTrackss()?>)</div>
                                    <div class="track-brand"><?$counter=0; foreach($artist->getProfilesGenres() as $artist_genre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genre', $artist_genre)?>"><?=$artist_genre->getGenresName();?></a><?$counter++; endforeach;?></div>
                                    <div class="clear"></div>
                                </div>
                                <a href="<?=url_for('profile', $artist)?>" class="track-check">CHECK</a>
                                <div class="track-row2-long">
                                	<div class="artist-desc"><?=$artist->getProfilesTextShorted()?> </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <?endforeach;?>

							

                            <div class="clear"></div>

                        </div>

                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>See also:</strong>  <a href="#">30 MOST POPULAR</a>, <a href="#">ARTIST WITH FRESH TRACKS</a>, <a href="#">CHARTS</a>
                            </div>
                            <div class="clear"></div>
                        </div>
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