
                <div class="box-white" id="box-top">
                    <img src="images/genres/<?=$genres->getGenresPath();?>.gif" alt="<?=$genres->getGenresName();?>" />
                    <div class="bw-div1">                        
						Here are the latest <span class="blue"><?=$genres->getGenresName();?></span> tracks that have been uploaded through producers on <a href="#" class="underline">Smashintracks.com</a> Check this out!
                    </div>                
                    
                        <div class="bw-tracks">
                            <?//print_r($tracks);?>
                            <?foreach ($tracks as $track):?>
                                <div class="track">
                                    <a href="#" class="track-player tp-new"><img src="images/profiles/<?=$track->getTracks()->getProfiles()->getProfilesPhotoPath(); ?>" alt="" /></a>
                                    <div class="track-row1">
                                        <div class="track-artist"><a href="#"><?=$track->getTracks()->getTracksArtistUppercase(); ?></a></div>
                                        <div class="track-brand">
                                            <?$counter=0; foreach($track->getTracks()->getTracksGenressJoinGenres() as $trackgenre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genres', $trackgenre->getGenres())?>"><?echo $trackgenre->getGenres()->getGenresName();?></a><?$counter++; endforeach;?>
                                        </div>
                                        <div class="clear"></div>
                                    </div>                                <a href="#" class="track-right">
                                        <span class="track-cart"></span>
                                        <span class="track-buy">BUY NOW</span>
                                        <span class="track-prize">£1.50</span>
                                    </a>
                                    <div class="track-row2">
                                        <div class="track-name"><a href="#"><?=$track->getTracks()->getTracksTitleShorted(); ?></a></div>
                                        <div class="track-time"><?=$track->getTracks()->getTracksTimeFormatted(); ?></div>
                                        <a href="#" class="track-star"></a>
                                        <div class="track-added">Added: <?=$track->getTracks()->getTracksDate('Y-m-d'); ?></div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>

                            <?endforeach;?>
                                

                            
                        
                            
                            <div class="clear"></div>
                            
                        </div>                
                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>See also:</strong>  
                                <?$counter=0; foreach ($seeAlsoGenres as $seeAlsoGenre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genres', $seeAlsoGenre)?>"><?=$seeAlsoGenre->getGenresName(); ?></a><?$counter++; endforeach;?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bw-div3">
                            <div class="bw-div3-inner">
                                <ul>
                                    <li><a href="#" class="active">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><span class="bw-ellipsis">...</span></li>
                                    <li><a href="#">123</a></li>
                                    <li><a href="#">124</a></li>
                                    <li><a href="#">125</a></li>
                                    <li><a href="#">123</a></li>
                                    <li class="button-next" id="bw-next">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <a href="#">NEXT</a>
                                    </li>
                                </ul>
                        	</div>
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
            