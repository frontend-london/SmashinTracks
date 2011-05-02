                <div class="box-silver" id="box-rekomendacje">
                    <div class="bs-inner">
                        <img src="images/texts/recommends-10-smashin-tracks.gif" alt="Recommends 10 Smashin Tracks" id="br2-img1" />
                        <div id="br2-div1">
                            Ponizej zestaw 10 obecnie rekomendowanych trackow na stronie glownej. <br />
							Zaznacz checkbox aby usunac dany track i zastapic go nowym z <span class="blue">listy propozycji.</span>
                        </div>

                        <a href="#" class="track-bin3"></a>

                        <div id="br2-tracks">
                            <?foreach ($active_recommends as $recom):?>
                                <?php include_partial('metadata/record', array('track' => $recom->getTracks(), 'recommends_active' => true)) ?>
                            <?endforeach;?>

                            <div class="clear"></div>
                        </div>

                        <img src="images/texts/nowe-propozycje.gif" alt="Nowe Propozycje" id="br2-img2" />
                        <div id="br2-div2">
                            Ponizej <span class="blue">lista propozycji</span> trackow ktore moga sie znalezc w rekomendowanych.<br />
                            Dodaj je do nowej listy, zostaw na pozniej badz usun.
                        </div>

                        <div id="br2-tracks2">

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track1.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">NEFTI</a></div>
                                    <div class="track-brand"><a href="#">OLD SKOOL</a>, <a href="#">HARDCORE BREAKS</a>, <a href="#">PIANO</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                	<input type="checkbox" name="#" value="#" class="br2-checkbox" />
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Strike It Up (VIP Mix)</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-bin2"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track2.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">URBAN IMPULZ</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                	<input type="checkbox" name="#" value="#" class="br2-checkbox" />
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Missing U</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-bin2"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track3.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">CJ REIGN</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE 4x4</a>, <a href="#">GARAGE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                	<input type="checkbox" name="#" value="#" class="br2-checkbox" />
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Garridge Bassline</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-bin2"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track4.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">SURANG</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                	<input type="checkbox" name="#" value="#" class="br2-checkbox" />
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Bubblin</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-bin2"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

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
