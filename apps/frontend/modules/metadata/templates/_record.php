<?
    if(!isset($charts)) $charts = false;
    if(!isset($charts_num)) $charts_num = false;
    if(!isset($basket)) $basket = false;
    if(!isset($download)) $download = false;
    if(!isset($my_tracks)) $my_tracks = false;
    if(!isset($my_tracks_in_wishlists)) $my_tracks_in_wishlists = false;
    if(!isset($transactions_tracks)) $transactions_tracks = false;
    if(!isset($wishlist)) $wishlist = false;
    if(!isset($not_accepted)) $not_accepted = false;
    if(!isset($not_accepted_url_accept)) $not_accepted_url_accept = false;
    if(!isset($not_accepted_url_disapprove)) $not_accepted_url_disapprove = false;

    if(!isset($subsection)) $subsection = null;
    if(!isset($icon_wishlist)) $icon_wishlist = true;

?>
                                <div class="track">
                                    <a href="mp3/<?=$track->getTracksPath(); ?>.mp3" class="track-player<?if($charts):?> tp-num tp-num-<?=$charts_num?><?elseif($track->isTrackNew()):?> tp-new<?endif;?>">
                                        <span class="fp_src" title="mp3/<?=$track->getTracksPath(); ?>.mp3"></span><span class="fp_ico" title="<?=$track->getProfiles()->getProfilesPhotoPath();?>"></span><span class="fp_artist" title="<?=$track->getTracksArtistUppercase(); ?>"></span><span class="fp_address" title="<?=url_for('basket_add', $track)?>"></span><span class="fp_title" title="<?=$track->getTracksTitle(); ?>"></span><span class="fp_prize" title="<?=Smashin::generate_prize(sfConfig::get('app_default_prize'))?>"></span><span class="fp_add_wishlist" title="<?=url_for('members_my-wishlist_add', $track)?>"></span><span class="fp_remove_wishlist" title="<?=url_for('members_my-wishlist_remove', $track)?>"></span><span class="fp_item_id" title="<?=$track->getTracksId();?>"></span><img src="images/icons/player-off.png" style="background-image:url('<?=$track->getProfiles()->getProfilesPhotoPath();?>');" alt="" />
                                    </a>
                                    <div class="track-row1">
                                        <div class="track-artist"><a href="<?=url_for('profile', $track->getProfiles())?>"><?=$track->getTracksArtistUppercase(); ?></a></div>
                                        <div class="track-brand">
                                            <?$counter=0; foreach($track->getTracksGenressJoinGenres() as $trackgenre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genre', $trackgenre->getGenres())?>"><?echo $trackgenre->getGenres()->getGenresName();?></a><?$counter++; endforeach;?>
                                        </div>
                                        <?if($charts && $track->isTrackNew()):?><div class="track-new"></div><?endif;?>
                                        <div class="clear"></div>
                                    </div>
                                    <?if($basket):?>
                                        <a href="<?=url_for('basket_remove', $track)?>" class="track-right">
                                            <div class="track-bin"></div>
                                            <div class="track-remove">REMOVE</div>
                                            <span class="track-prize"><?=Smashin::generate_prize(sfConfig::get('app_default_prize'))?></span>
                                        </a>
                                    <?elseif($download):?>
                                        <a href="<?='mp3/download/'.$transactions_tracks->getTransactionsTracksId().'/'.$transactions_tracks->getTransactionsTracksPath()?>" class="track-right">
                                            <div class="track-download">DOWNLOAD</div>
                                            <div class="track-download2">TRACK</div>
                                        </a>
                                    <?elseif($my_tracks):?>
                                        <?if($my_tracks_in_wishlists):?>
                                            <div class="track-right">
                                                    <div class="track-users">
                                                    Users: <span><?=$track->countProfilesWishlistss()?></span>
                                                </div>
                                            </div>
                                        <?else:?>
                                            <div class="track-right">
                                                    <div class="track-plays">
                                                    Plays: <span><?=$track->countTracksPlayeds()?></span><br />
                                                    Bought: <span><?=$track->countTransactionsTrackss()?></span>
                                                </div>
                                            </div>
                                        <?endif;?>
                                    <?elseif($not_accepted):?>
                                        <div class="track-right">
                                            <div class="track-edit-320">
                                                <a href="#" class="track-edit">EDIT</a>
                                                <a href="<?='mp3/download/?id='.$track->getTracksId().'&admin=1&pass='.sfConfig::get('app_fullmp3_admin_access_pass')?>" class="track-320">320</a>
                                            </div>
                                            <div class="button-ok-big">
                                                <div class="button-left-28px"></div>
                                                <div class="button-right-28px"></div>
                                                <a href="<?=url_for($not_accepted_url_accept, $track)?>">OK</a>
                                            </div>
                                        </div>
                                    <?else:?>
                                        <a href="<?=url_for('basket_add', $track)?>" class="track-right">
                                            <span class="track-cart"></span>
                                            <span class="track-buy">BUY NOW</span>
                                            <span class="track-prize"><?=Smashin::generate_prize(sfConfig::get('app_default_prize'))?></span>
                                        </a>
                                    <?endif;?>
                                    <div class="track-row2">
                                        <div class="track-name"><a href="<?=url_for('track', $track)?>"><?=$track->getTracksTitleShorted(); ?></a></div>
                                        <div class="track-time"><?=$track->getTracksTimeFormatted(); ?></div>
                                        <?if($wishlist):?>
                                            <?if($subsection=='last_added'):?>
                                                <a href="<?=url_for('members_my-wishlist_remove', $track)?>" class="track-bin2"></a>
                                            <?else:?>
                                                <a href="<?=url_for('members_my-wishlist_by_artist_remove', $track)?>" class="track-bin2"></a>
                                            <?endif;?>
                                        <?elseif($not_accepted):?>
                                            <a href="<?=url_for($not_accepted_url_disapprove, $track)?>" class="track-bin2"></a>
                                        <?elseif($icon_wishlist):?>
                                                <?if($track->isInWishlist()):?>
                                                    <a href="<?=url_for('members_my-wishlist_remove', $track)?>" class="track-star ts-active"></a>
                                                <?else:?>
                                                    <a href="<?=url_for('members_my-wishlist_add', $track)?>" class="track-star"></a>
                                                <?endif;?>
                                        <?endif;?>
                                        <div class="track-added">Added: <?=$track->getTracksDate('Y-m-d'); ?></div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
