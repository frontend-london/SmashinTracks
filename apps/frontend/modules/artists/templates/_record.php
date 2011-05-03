<?
    if(!isset($panel)) $panel = false;
    if(!isset($panel_blocked)) $panel_blocked = false;
?>
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
                                    <?if($panel):?>
                                        <a href="#" class="track-edit">EDIT</a>
                                    <?elseif($panel_blocked):?>
                                        <div class="track-right">
                                            <div class="track-edit-320">
                                                <a href="#" class="track-edit">EDIT</a>
                                            </div>
                                            <a href="#" class="button-accept"></a>
                                        </div>
                                    <?else:?>
                                        <a href="<?=url_for('profile', $artist)?>" class="track-check">CHECK</a>
                                    <?endif;?>
                                    <?if($panel_blocked):?>
                                        <div class="track-row2">
                                            <a href="#" class="track-bin2"></a>
                                            <div class="clear"></div>
                                        </div>
                                    <?else:?>
                                        <div class="track-row2-long">
                                            <div class="artist-desc"><?=$artist->getProfilesTextShorted()?> </div>
                                            <div class="clear"></div>
                                        </div>
                                    <?endif;?>
                                    <div class="clear"></div>
                                </div>