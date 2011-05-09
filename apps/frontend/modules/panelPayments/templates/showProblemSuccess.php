                <div class="box-silver" id="box-zgloszeniadowyplaty">
                    <div class="bs-inner">
                        <img src="images/texts/zgloszenia-do-wyplaty.gif" alt="Zgłoszenia do  wypłaty" id="bz2-img1" />
                        <div id="bz2-div1">
                            Ponizej pelna lista <span class="blue">zgloszonych wyplat</span> przez uzytkownikow <a href="http://smashintracks.com" class="underline">Smashintracks.com</a>
                        </div>
                        <div class="bw-div8">
                            <div class="bookmark">
                                <a href="<?=url_for('panel_payments')?>">OSTATNIE ZGŁOSZENIA</a>
                                <div class="bookmark-bgr-left"></div>
                                <div class="bookmark-bgr-right"></div>
                            </div>
                            <div class="bookmark bookmark-nobgr-right">
                                <a href="<?=url_for('panel_payments_archive')?>">ARCHIWUM</a>
                                <div class="bookmark-bgr-left"></div>
                                <div class="bookmark-bgr-right"></div>
                            </div>
                            <div class="bookmark bookmark-active">
                                <a href="<?=url_for('panel_artists_problem')?>">PROBLEM</a>
                                <div class="bookmark-bgr-left"></div>
                                <div class="bookmark-bgr-right"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="bz2-tracks">
                            <?$last_date = ''; foreach ($pager->getResults() as $withdraw):?>
                                <?if($last_date!=$withdraw->getWithdrawsDatePolish()):?>
                                    <div class="track-date">
                                        <?$last_date = $withdraw->getWithdrawsDatePolish(); echo $last_date;?>
                                    </div>
                                <?endif?>
                                <?php include_partial('artists/record', array('artist' => $withdraw->getProfiles(), 'withdraw' => $withdraw, 'panel_withdraw' => true, 'panel_withdraw_problem' => true)) ?>
                            <?endforeach;?>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>
                <div class="box-white" id="box-top">
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_name' => 'panel_payments', 'noborder' => true)) ?>
                </div>