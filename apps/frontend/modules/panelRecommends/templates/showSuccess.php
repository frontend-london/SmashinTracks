                <div class="box-silver" id="box-rekomendacje">
                    <div class="bs-inner">
                        <img src="images/texts/recommends-10-smashin-tracks.gif" alt="Recommends 10 Smashin Tracks" id="br2-img1" />
                        <div id="br2-div1">
                            Ponizej zestaw 10 obecnie rekomendowanych trackow na stronie glownej. <br />
							Zaznacz checkbox aby usunac dany track i zastapic go nowym z <span class="blue">listy propozycji.</span>
                        </div>

                        <form name="tracks_recommends_delete" id="tracks_recommends_delete" method="post" action="<?=url_for('panel_recommends')?>">

                        <a href="javascript: document.tracks_recommends_delete.submit()" class="track-bin3"></a>

                        <div id="br2-tracks">
                            <?$counter = 0; foreach ($active_recommends as $recom):?>
                                <?
                                    if($counter!=0) $recommends_active_prev = $active_recommends[$counter-1]->getTracks()->getTracksId(); else $recommends_active_prev = null;
                                    if($counter!=(count($active_recommends)-1)) $recommends_active_next = $active_recommends[$counter+1]->getTracks()->getTracksId(); else $recommends_active_next = null;
                                ?>
                                <?php include_partial('metadata/record', array('track' => $recom->getTracks(), 'tracks_recommends' => $recom, 'recommends_active' => true, 'no_icon_wishlist' => true, 'recommends_active_prev' => $recommends_active_prev, 'recommends_active_next' => $recommends_active_next,)) ?>
                            <?$counter++; endforeach;?>

                            <div class="clear"></div>
                        </div>

                        </form>

                        <img src="images/texts/nowe-propozycje.gif" alt="Nowe Propozycje" id="br2-img2" />
                        <div id="br2-div2">
                            Ponizej <span class="blue">lista propozycji</span> trackow ktore moga sie znalezc w rekomendowanych.<br />
                            Dodaj je do nowej listy, zostaw na pozniej badz usun.
                        </div>

                        <div id="br2-tracks2">
                            <?foreach ($inactive_recommends as $recom):?>
                                <?php include_partial('metadata/record', array('track' => $recom->getTracks(), 'recommends_inactive' => true, 'no_icon_wishlist' => true,)) ?>
                            <?endforeach;?>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track5.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">MADOGZ</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                	<input type="checkbox" name="#" value="#" class="br2-checkbox" />
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Pussy Marijuana (Bassline 2 Donkline...</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-bin2"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="clear"></div>
                        </div>

                        <div id="br2-div4">
                            <div class="button-aktualizuj">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">Aktualizuj</a>
                            </div>
                            <div class="clear"></div>
                        </div>

					</div>
                    <div class="bs-bgr-bottom"></div>
                </div>
