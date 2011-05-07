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
                                        if($counter!=0) $recommends_active_prev = $active_recommends[$counter-1]->getTracksRecommendsId(); else $recommends_active_prev = null;
                                        if($counter!=(count($active_recommends)-1)) $recommends_active_next = $active_recommends[$counter+1]->getTracksRecommendsId(); else $recommends_active_next = null;
                                    ?>
                                    <?php include_component('metadata', 'record', array('track' => $recom->getTracks(), 'tracks_recommends' => $recom, 'recommends_active' => true, 'no_icon_wishlist' => true, 'recommends_active_prev' => $recommends_active_prev, 'recommends_active_next' => $recommends_active_next,)) ?>
                                <?$counter++; endforeach;?>

                                <div class="clear"></div>
                            </div>

                        </form>

                        <img src="images/texts/nowe-propozycje.gif" alt="Nowe Propozycje" id="br2-img2" />
                        <div id="br2-div2">
                            Ponizej <span class="blue">lista propozycji</span> trackow ktore moga sie znalezc w rekomendowanych.<br />
                            Dodaj je do nowej listy, zostaw na pozniej badz usun.
                        </div>

                        <form name="tracks_recommends_accept" id="tracks_recommends_accept" method="post" action="<?=url_for('panel_recommends')?>">

                            <div id="br2-tracks2">
                                <?foreach ($inactive_recommends as $recom):?>
                                    <?php include_component('metadata', 'record', array('track' => $recom->getTracks(), 'tracks_recommends' => $recom, 'recommends_inactive' => true, 'no_icon_wishlist' => true,)) ?>
                                <?endforeach;?>

                                <div class="clear"></div>
                            </div>

                            <div id="br2-div4">
                                <div class="button-aktualizuj">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.tracks_recommends_accept.submit()">Aktualizuj</a>
                                </div>
                                <div class="clear"></div>
                            </div>

                        </form>

                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>
