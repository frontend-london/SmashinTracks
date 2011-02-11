                                <div class="track">
                                    <a href="#" class="track-player<?if($track->isTrackNew()):?> tp-new<?endif;?>">
                                        <?if($track->getProfiles()->getProfilesPhoto()):?><img src="images/profiles/small/<?=$track->getProfiles()->getProfilesPath(); ?>.jpg" alt="<?=$track->getTracksArtist()?>" /><?else:?><img src="images/icons/default_profile.png" alt="" /><?endif;?></a>
                                    <div class="track-row1">
                                        <div class="track-artist"><a href="<?=url_for('profile', $track->getProfiles())?>"><?=$track->getTracksArtistUppercase(); ?></a></div>
                                        <div class="track-brand">
                                            <?$counter=0; foreach($track->getTracksGenressJoinGenres() as $trackgenre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genre', $trackgenre->getGenres())?>"><?echo $trackgenre->getGenres()->getGenresName();?></a><?$counter++; endforeach;?>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <a href="#" class="track-right">
                                        <span class="track-cart"></span>
                                        <span class="track-buy">BUY NOW</span>
                                        <span class="track-prize"><?=sfConfig::get('app_default_prize_string')?></span>
                                    </a>
                                    <div class="track-row2">
                                        <div class="track-name"><a href="<?=url_for('track', $track)?>"><?=$track->getTracksTitleShorted(); ?></a></div>
                                        <div class="track-time"><?=$track->getTracksTimeFormatted(); ?></div>
                                        <a href="#" class="track-star"></a>
                                        <div class="track-added">Added: <?=$track->getTracksDate('Y-m-d'); ?></div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>