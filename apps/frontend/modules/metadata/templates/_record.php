<?
    if(!isset($charts)) $charts = false;
    if(!isset($charts_num)) $charts_num = false;
    if(!isset($basket)) $basket = false;
?>
                                <div class="track">
                                    <a href="mp3/<?=$track->getTracksPath(); ?>.mp3" class="track-player<?if($charts):?> tp-num tp-num-<?=$charts_num?><?elseif($track->isTrackNew()):?> tp-new<?endif;?>">
                                        <span class="fp_src" title="mp3/<?=$track->getTracksPath(); ?>.mp3"></span><span class="fp_ico" title="<?=$track->getProfiles()->getProfilesPhotoPath();?>"></span><span class="fp_artist" title="<?=$track->getTracksArtistUppercase(); ?>"></span><span class="fp_address" title="<?=url_for('track', $track, true)?>"></span><span class="fp_title" title="<?=$track->getTracksTitle(); ?>"></span><span class="fp_prize" title="<?=sfConfig::get('app_default_prize_string')?>"></span><span class="fp_add_wishlist" title="#"></span><span class="fp_remove_wishlist" title="#"></span><img src="images/icons/player-off.png" style="background-image:url('<?=$track->getProfiles()->getProfilesPhotoPath();?>');" alt="" />
                                    </a>
                                    <div class="track-row1">
                                        <div class="track-artist"><a href="<?=url_for('profile', $track->getProfiles())?>"><?=$track->getTracksArtistUppercase(); ?></a></div>
                                        <div class="track-brand">
                                            <?$counter=0; foreach($track->getTracksGenressJoinGenres() as $trackgenre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genre', $trackgenre->getGenres())?>"><?echo $trackgenre->getGenres()->getGenresName();?></a><?$counter++; endforeach;?>
                                        </div>
                                        <?if($charts && $track->isTrackNew()):?><div class="track-new"></div><?endif;?>
                                        <div class="clear"></div>
                                    </div>
                                    <?if(!$basket):?>
                                    <a href="<?=url_for('basket_add', $track)?>" class="track-right">
                                        <span class="track-cart"></span>
                                        <span class="track-buy">BUY NOW</span>
                                        <span class="track-prize"><?=sfConfig::get('app_default_prize_string')?></span>
                                    </a>
                                    <?else:?>
                                        <a href="<?=url_for('basket_remove', $track)?>" class="track-right">
                                            <div class="track-bin"></div>
                                            <div class="track-remove">REMOVE</div>
                                            <span class="track-prize"><?=sfConfig::get('app_default_prize_string')?></span>
                                        </a>
                                    <?endif;?>
                                    <div class="track-row2">
                                        <div class="track-name"><a href="<?=url_for('track', $track)?>"><?=$track->getTracksTitleShorted(); ?></a></div>
                                        <div class="track-time"><?=$track->getTracksTimeFormatted(); ?></div>
                                        <a href="#" class="track-star"></a>
                                        <div class="track-added">Added: <?=$track->getTracksDate('Y-m-d'); ?></div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
