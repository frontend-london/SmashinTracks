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
    if(!isset($transaction_list)) $transaction_list = false;
    if(!isset($recommends_active)) $recommends_active = false;
    if(!isset($recommends_inactive)) $recommends_inactive = false;
    if(!isset($no_icon_wishlist)) $no_icon_wishlist = false;

    if(!isset($subsection)) $subsection = null;
    if(!isset($tracks_recommends)) $tracks_recommends = false;
    if(!isset($recommends_active_next)) $recommends_active_next = null;
    if(!isset($recommends_active_prev)) $recommends_active_prev = null;
    

?>
                                <div class="track">
<?/* FLASH PLAYER */?>
                                    <a href="mp3/<?=$track->getTracksPath(); ?>.mp3" class="track-player<?if($charts):?> tp-num tp-num-<?=$charts_num?><?elseif($track->isTrackNew()):?> tp-new<?endif;?>">
                                        <span class="fp_src" title="mp3/<?=$track->getTracksPath(); ?>.mp3"></span><span class="fp_ico" title="<?=$track->getProfiles()->getProfilesPhotoPath();?>"></span><span class="fp_artist" title="<?=$track->getTracksArtistUppercase(); ?>"></span><span class="fp_address" title="<?=url_for('basket_add', $track)?>"></span><span class="fp_title" title="<?=$track->getTracksTitle(); ?>"></span><span class="fp_prize" title="<?=Smashin::generate_prize(sfConfig::get('app_default_prize'))?>"></span><span class="fp_add_wishlist" title="<?=url_for('members_my-wishlist_add', $track)?>"></span><span class="fp_remove_wishlist" title="<?=url_for('members_my-wishlist_remove', $track)?>"></span><span class="fp_item_id" title="<?=$track->getTracksId();?>"></span><img src="images/icons/player-off.png" style="background-image:url('<?=$track->getProfiles()->getProfilesPhotoPath();?>');" alt="" />
                                    </a>
<?/* TRACK ROW 1 */?>
                                    <div class="track-row1">
                                        <div class="track-artist"><a href="<?=url_for('profile', $track->getProfiles())?>"><?=$track->getTracksArtistUppercase(); ?></a></div>
                                        <div class="track-brand">
                                            <?$counter=0; foreach($track->getTracksGenressJoinGenres() as $trackgenre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genre', $trackgenre->getGenres())?>"><?echo $trackgenre->getGenres()->getGenresName();?></a><?$counter++; endforeach;?>
                                        </div>
                                        <?if($charts && $track->isTrackNew()):?><div class="track-new"></div><?endif;?>
                                        <div class="clear"></div>
                                    </div>
<?/* TRACK RIGHT */?>
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
                                    <?elseif($transaction_list):?>
                                        <div class="track-right">
                                            <div class="track-plays">
                                                <?=$transactions_tracks->getTransactionsTracksValue();?><br />
                                                <a href="#" class="a-transactiontrack-info">#<?=$transactions_tracks->getTransactionsTracksId()?></a>
                                            </div>
                                        </div>
                                    <?elseif($recommends_active):?>
                                        <div class="track-right">
                                            <div class="br2-arrows">
                                                <?if($recommends_active_prev):?>
                                                    <a href="<?=url_for('panel_recommends_order', array('tracks_recommends_id' => $tracks_recommends->getTracksRecommendsId(), 'second_tracks_recommends_id' => $recommends_active_prev))?>" class="arrow-top"></a>
                                                <?endif;?>
                                                <?if($recommends_active_next):?>
                                                    <a href="<?=url_for('panel_recommends_order', array('tracks_recommends_id' => $tracks_recommends->getTracksRecommendsId(), 'second_tracks_recommends_id' => $recommends_active_next))?>" class="arrow-bottom<?if(!$recommends_active_prev):?> arrow-bottom-first<?endif;?>"></a>
                                                <?endif;?>
                                            </div>
                                            <input type="checkbox" name="delete_recommends[<?=$tracks_recommends->getTracksRecommendsId()?>]" value="1" class="br2-checkbox" />
                                        </div>
                                    <?elseif($recommends_inactive):?>
                                        <div class="track-right">
                                            <input type="checkbox" name="accept_recommends[<?=$tracks_recommends->getTracksRecommendsId()?>]" value="1" class="br2-checkbox" />
                                        </div>
                                    <?else:?>
                                        <a href="<?=url_for('basket_add', $track)?>" class="track-right">
                                            <span class="track-cart"></span>
                                            <span class="track-buy">BUY NOW</span>
                                            <span class="track-prize"><?=Smashin::generate_prize(sfConfig::get('app_default_prize'))?></span>
                                        </a>
                                    <?endif;?>
<?/* TRACK ROW 2 */?>
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
                                        <?elseif($recommends_inactive):?>
                                            <a href="<?=url_for('panel_recommends_delete', $tracks_recommends)?>" class="track-bin2"></a>
                                        <?elseif(!$no_icon_wishlist):?>
                                            <?if($track->isInWishlist()):?>
                                                <a href="<?=url_for('members_my-wishlist_remove', $track)?>" class="track-star ts-active"></a>
                                            <?else:?>
                                                <a href="<?=url_for('members_my-wishlist_add', $track)?>" class="track-star"></a>
                                            <?endif;?>
                                        <?elseif($transaction_list):?>
                                            <a href="<?=url_for('panel_recommends_add', $track)?>" class="track-r"></a>
                                        <?endif;?>
                                        <div class="track-added">Added: <?=$track->getTracksDate('Y-m-d'); ?></div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
<?/* TRANSACTION LIST */?>
                                <?if($transaction_list):?>
                                    <?
                                        $transactions = $transactions_tracks->getTransactions();
                                        if($transactions->getTransactionsPaymethod()=='1') $transactions_paypal = true; else $transactions_paypal = false;
                                    ?>
                                    <div class="tracksale">
                                        <div class="tracksale-row1">
                                            <div class="ts1-div1">
                                                Kupiony przez:
                                                <?if($transactions_paypal):?>
                                                <a href="mailto:<?=$transactions->getPaypalPaymentInfo()->getBuyerEmail()?>" class="bold"><?=$transactions->getPaypalPaymentInfo()->getBuyerEmail()?></a>
                                                <?elseif($transactions->getProfiles()):?>
                                                    <a href="mailto:<?=$transactions->getProfiles()->getProfilesEmail();?>" class="bold"><?=$transactions->getProfiles()->getProfilesEmail();?></a>
                                                <?else:?>
                                                    Brak danych
                                                <?endif?>
                                            </div>
                                            <?if($transactions->getProfiles()):?><a href="<?=url_for('profile', $transactions->getProfiles())?>" class="track-profil">Profil</a><?endif;?>
                                            <div class="ts1-div2">
                                                    &nbsp; l &nbsp; <?=$transactions->getTransactionsDate('H:i')?>  <br />
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="tracksale-row2">
                                                Metoda: <strong><?if($transactions_paypal):?>PAYPAL<?else:?>SMASHIN TRACKS<?endif?></strong>  &nbsp; l &nbsp;  
                                                Ściągnięte: <strong>
                                                    <?$counter2 = 0; foreach($transactions_tracks->getTransactionsTracksDownloadss() as $download): $counter2++;?>
                                                        <?if($counter2>1) echo '-';?> <?=$counter2?> (<?=$download->getTransactionsTracksDownloadsDate('H:i')?>)
                                                    <?endforeach;?>
                                                </strong>
                                        </div>
                                    </div>
                                <?endif;?>