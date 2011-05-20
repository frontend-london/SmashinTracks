<?
    if(!isset($panel)) $panel = false;
    if(!isset($panel_blocked)) $panel_blocked = false;
    if(!isset($panel_withdraw)) $panel_withdraw = false;
    if(!isset($panel_withdraw_archive)) $panel_withdraw_archive = false;
    if(!isset($panel_withdraw_problem)) $panel_withdraw_problem = false;
    if(!isset($panel_accept_route)) $panel_accept_route = null;
    if(!isset($panel_delete_route)) $panel_delete_route = null;
    if(!isset($withdraw)) $withdraw = null;

    if(0) $artist = new Profiles(); // wlaczenie podpowiedzi w edytorze
    if(0) $withdraw = new Withdraws();
?>
                                <div class="track<?if($panel_withdraw):?> nomargin<?endif?>">
<?/* ARTIST LOGO */?>
                                    <span class="track-player">
                                        <?if($artist->getProfilesPhoto()):?><img src="images/profiles/small/<?=$artist->getProfilesPath(); ?>.jpg" alt="<?=$artist->getProfilesName()?>" /><?else:?><img src="images/icons/default_profile.png" alt="" /><?endif;?></a>
                                    </span>
<?/* TRACK ROW 1 */?>
                                    <?if($panel_withdraw):?>
                                        <div class="track-row1">
                                            <div class="track-artist uppercase"><a href="<?=url_for('profile', $artist)?>"><?=$artist->getProfilesName()?></a></div>
                                            <div class="track-brand"><?$counter=0; foreach($artist->getProfilesGenres() as $artist_genre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genre', $artist_genre)?>"><?=$artist_genre->getGenresName();?></a><?$counter++; endforeach;?></div>
                                            <div class="clear"></div>
                                        </div>
                                    <?else:?>
                                        <div class="track-row1">
                                            <div class="track-artist bold"><a class="ajax-centerside" href="<?=url_for('profile', $artist)?>"><?=$artist->getProfilesName()?></a></div>
                                            <div class="track-artist-num">(<?=$artist->countTrackssActive()?>)</div>
                                            <div class="track-brand"><?$counter=0; foreach($artist->getProfilesGenres() as $artist_genre):?><?if($counter>0):?>, <?endif;?><a class="ajax-centerside" href="<?=url_for('genre', $artist_genre)?>"><?=$artist_genre->getGenresName();?></a><?$counter++; endforeach;?></div>
                                            <div class="clear"></div>
                                        </div>
                                    <?endif;?>
<?/* TRACK RIGHT */?>
                                    <?if($panel):?>
                                        <a href="<?=url_for('panel_edit-artist', $artist)?>" class="track-edit">EDIT</a>
                                    <?elseif($panel_blocked):?>
                                        <div class="track-right">
                                            <div class="track-edit-320">
                                                <a href="<?=url_for('panel_edit-artist', $artist)?>" class="track-edit">EDIT</a>
                                            </div>
                                            <a href="<?=url_for($panel_accept_route, $artist)?>" class="button-accept"></a>
                                        </div>
                                    <?elseif($panel_withdraw):?>
                                        <div class="track-right">
                                            <div class="track-saldo"><?if($panel_withdraw_archive):?>WYPŁATA:<?else:?>SALDO:<?endif;?> <span><?=$withdraw->getWithdrawsSaldoValuePrize()?></span></div>
                                            <div class="track-payment">Wypłata nr: <strong>#<?=$withdraw->getWithdrawsId()?></strong></div>
                                        </div>
                                    <?else:?>
                                        <a class="ajax-centerside track-check" href="<?=url_for('profile', $artist)?>">CHECK</a>
                                    <?endif;?>
<?/* TRACK ROW 2 */?>
                                    <?if($panel_blocked):?>
                                        <div class="track-row2">
                                            <a href="<?=url_for($panel_delete_route, $artist)?>" class="track-bin2"></a>
                                            <div class="clear"></div>
                                        </div>
                                    <?elseif($panel_withdraw):?>
                                        <div class="track-row2">
                                            <div class="track-joined">Dołączył:</div>
                                            <div class="track-added"><?=$artist->getProfilesDateStandartFormat()?></div>
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
<?/* WITHDRAW LIST */?>
                                <?if($panel_withdraw):?>
                                    <div class="tracksale">
                                        <div class="tracksale-row1">
                                            <div class="ts1-div1">
                                                PAYPAL USERA: <a href="mailto:<?=$withdraw->getWithdrawsPaypalAddress()?>" class="bold"><?=$withdraw->getWithdrawsPaypalAddress()?></a>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <?if($panel_withdraw_archive):?>
                                        <?elseif($panel_withdraw_problem):?>
                                            <div class="track-right">
                                                <div class="button-ponow">
                                                    <div class="button-left"></div>
                                                    <div class="button-right"></div>
                                                    <a href="http://www.paypal.pl/pl" target="_blank">PONÓW</a>
                                                </div>
                                                <div class="button-red-ok">
                                                    <div class="button-red-left"></div>
                                                    <div class="button-red-right"></div>
                                                    <a href="<?=url_for('panel_payments_set-done', $withdraw)?>">OK</a>
                                                </div>
                                            </div>
                                        <?else:?>
                                            <div class="track-right">
                                                <a href="<?=url_for('panel_payments_set-problem', $withdraw)?>" class="track-problem">PROBLEM</a>
                                                <div class="button-wyplac">
                                                    <div class="button-left"></div>
                                                    <div class="button-right"></div>
                                                    <a href="http://www.paypal.pl/pl" target="_blank">WYPŁAĆ</a>
                                                </div>
                                                <div class="button-red-ok">
                                                    <div class="button-red-left"></div>
                                                    <div class="button-red-right"></div>
                                                    <a href="<?=url_for('panel_payments_set-done', $withdraw)?>">OK</a>
                                                </div>
                                            </div>
                                        <?endif;?>
                                        <div class="tracksale-row2">
                                            <a href="<?=url_for('panel_sales', $artist)?>" class="bold">HISTORIA SPRZEDAŻY</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>   
                                <?endif;?>