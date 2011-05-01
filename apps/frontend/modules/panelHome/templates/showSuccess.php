                <div class="box-silver" id="box-trackiakceptacja">
                    <div class="bs-inner">
                        <img src="images/texts/podeslane-tracki-do-zaakceptowania.gif" alt="Podeslane tracki do zaakceptowania" id="bt2-img1" />
                        <div id="bt2-div1">
                            Lista <span class="blue">10 zuploadowanych przez uzytkownikow trackow</span> w kolejnosci od najstarszej do najnowszej, po rozwinieciu pojawi sie spis wszystkich podeslanych trackow.
                        </div>

                        <div id="bt2-tracks">
                            <?$counter=0; foreach ($not_accepted as $track):?>
                                <?php include_partial('metadata/record', array('track' => $track, 'not_accepted' => true, 'not_accepted_url_accept' => 'panel_home_accept_track', 'not_accepted_url_disapprove' => 'panel_home_disapprove_track')) ?>
                            <?$counter++; endforeach;?>

                            <div class="clear"></div>

                        </div>
                        <div id="bt2-div2">
                            <div class="button-fulllist">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="<?=url_for('panel_acceptances')?>">Full List</a>
                            </div>
                            <div class="clear"></div>
                        </div>
					</div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <div class="box-silver" id="box-ostatniosprzedane">
                    <div class="bs-inner">
                        <img src="images/texts/ostatnio-sprzedane.gif" alt="Ostatnio Sprzedane" id="bo2-img1" />
                        <div id="bo2-div1">
                            Lista <span class="blue">10 ostatnio sprzedanych trackow.</span> Aby obejrzec pelna liste kliknij w button <br /><span class="blue">FULL LIST.</span>
                        </div>

                        <div id="bo2-tracks">
                            <?$last_date = ''; $counter = 0; foreach ($last_sold_trancations as $transaction):?>
                                <?if($last_date!=$transaction->getTransactionsDatePolish()):?>
                                    <div class="track-date">
                                        <?$last_date = $transaction->getTransactionsDatePolish(); echo $last_date;?>
                                    </div>
                                <?endif?>
                                <?foreach($transaction->getTransactionsTrackssJoinTracks() as $transaction_track): $counter++; if($counter>10) break(2);?>
                                    <?php include_partial('metadata/record', array('transaction_list' => true, 'transactions_tracks' => $transaction_track, 'track' => $transaction_track->getTracks(), 'icon_wishlist' => false)) ?>
                                <?endforeach;?>

                            <?endforeach;?>

                            <div class="clear"></div>

                        </div>
                        <div id="bo2-div2">
                            <div class="button-fulllist">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="<?=url_for('panel_transactions-history')?>">Full List</a>
                            </div>
                            <div class="clear"></div>
                        </div>
					</div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <div class="box-silver" id="box-recommends2">
                    <div class="bs-inner">
                        <img src="images/texts/recommends-10-smashin-tracks.gif" alt="Recommends 10 Smashin Tracks" id="br-img1" />
                        <div id="br-div1">Here's a hand picked selection of smashing tracks personally recommended by <a href="#" class="underline">Smashintracks.com</a> in this week.</div>
                        <div id="br-tracks">

                            <?$counter=0; $hidden_recom = false; foreach ($recommended as $recom):?>
                                <?if($counter==5): $hidden_recom = true;?>
                                    <div id="br-hidden">
                                <?endif;?>
                                <?php include_partial('metadata/record', array('track' => $recom->getTracks())) ?>
                            <?$counter++; endforeach;?>
                            <?if($hidden_recom):?>
                                </div>
                            <?endif;?>

                            <div class="clear"></div>

                        </div>
                        <a href="#" class="arrow-bottom-big" id="bs-arrow"></a>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>
                <div class="box-white">
                    <img src="images/texts/new-tracks.gif" alt="New Tracks" />
                    <div class="bw-div1">
                        Here are the latest <span class="blue">10 tunes</span> on <a href="#" class="underline">Smashintracks.com</a><br />
                        Click the button 'FULL LIST' if you want see list of new tracks from latest months.
                    </div>

                        <div class="bw-tracks">

                            <?$counter=0; foreach ($newtracks as $track):?>
                                <?php include_partial('metadata/record', array('track' => $track)) ?>
                            <?$counter++; endforeach;?>

                            <div class="clear"></div>

                        </div>
                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>New tracks in:</strong>
                                <?$counter=0; foreach($newtracks_genres as $genre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genre', $genre)?>"><?echo $genre->getGenresName();?></a><?$counter++; endforeach;?>
                            </div>
                            <div class="button-fulllist bw-div2-button">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="<?=url_for('new-tracks')?>">Full List</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                </div>

                <div class="box-white">
                    <img src="images/texts/bestsellers-tracks.gif" alt="Bestsellers Tracks" />
                    <div class="bw-div1">
                        Here are <span class="blue">10 most popular tracks</span> on <a href="#" class="underline">Smashintracks.com</a> from latest week.<br />
                        Click the button 'FULL LIST' if you want see lists of new more charts.
                    </div>

                        <div class="bw-tracks">

                            <?$counter=0; foreach ($bestsellerstracks as $track):?>
                                <?php include_partial('metadata/record', array('track' => $track)) ?>
                            <?$counter++; endforeach;?>

                            <div class="clear"></div>

                        </div>
                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>See also:</strong>  <a href="#">CHARTS</a>, <a href="#">TOP ARTISTS</a>, <a href="#">NEW TRACKS</a>
                            </div>
                            <div class="button-fulllist bw-div2-button">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">Full List</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                </div>