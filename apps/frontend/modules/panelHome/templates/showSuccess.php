                <div class="box-silver" id="box-trackiakceptacja">
                    <div class="bs-inner">
                        <img src="images/texts/podeslane-tracki-do-zaakceptowania.gif" alt="Podeslane tracki do zaakceptowania" id="bt2-img1" />
                        <div id="bt2-div1">
                            Lista <span class="blue">10 zuploadowanych przez uzytkownikow trackow</span> w kolejnosci od najstarszej do najnowszej, po rozwinieciu pojawi sie spis wszystkich podeslanych trackow.
                        </div>

                        <div id="bt2-tracks">
                            <!-- <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track6.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">NEFTI</a></div>
                                    <div class="track-brand"><a href="#">OLD SKOOL</a>, <a href="#">HARDCORE BREAKS</a>, <a href="#">PIANO</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                    <div class="track-edit-320">
                                        <a href="#" class="track-edit">EDIT</a>
                                        <a href="#" class="track-320">320</a>
                                    </div>
                                    <div class="button-ok-big">
                                        <div class="button-left-28px"></div>
                                        <div class="button-right-28px"></div>
                                        <a href="#">OK</a>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Strike It Up (VIP Mix)</a></div>
                                    <div class="track-time">5:41</div>
                                    <a href="#" class="track-bin2"></a>
                                    <div class="track-added">2010-10-24</div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div> -->

                            <?$counter=0; foreach ($not_accepted as $track):?>
                                <?php include_partial('metadata/record', array('track' => $track)) ?>
                            <?$counter++; endforeach;?>

                            <div class="clear"></div>

                        </div>
						<div id="bt2-div2">
                            <div class="button-fulllist">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">Full List</a>
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

                        	<div class="track-date">
                            	2 stycznia 2010, wtorek
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track6.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">NEFTI</a></div>
                                    <div class="track-brand"><a href="#">OLD SKOOL</a>, <a href="#">HARDCORE BREAKS</a>, <a href="#">PIANO</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                    <div class="track-plays">
                                        £7.50<br />
                                        <span>#149001314</span>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Strike It Up (VIP Mix)</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track7.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">URBAN IMPULZ</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                    <div class="track-plays">
                                        £7.50<br />
                                        <span>#149001314</span>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Missing U</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track8.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">CJ REIGN</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE 4x4</a>, <a href="#">GARAGE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                    <div class="track-plays">
                                        £7.50<br />
                                        <span>#149001314</span>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Garridge Bassline</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track9.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">SURANG</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                    <div class="track-plays">
                                        £7.50<br />
                                        <span>#149001314</span>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Bubblin</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track10.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">MADOGZ</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                    <div class="track-plays">
                                        £7.50<br />
                                        <span>#149001314</span>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Pussy Marijuana (Bassline 2 Donkline...</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                        	<div class="track-date">
                            	1 stycznia 2010, wtorek
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track1.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">NEFTI</a></div>
                                    <div class="track-brand"><a href="#">OLD SKOOL</a>, <a href="#">HARDCORE BREAKS</a>, <a href="#">PIANO</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                    <div class="track-plays">
                                        £7.50<br />
                                        <span>#149001314</span>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Strike It Up (VIP Mix)</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
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
                                    <div class="track-plays">
                                        £7.50<br />
                                        <span>#149001314</span>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Missing U</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track3.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">CJ REIGN</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE 4x4</a>, <a href="#">GARAGE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                    <div class="track-plays">
                                        £7.50<br />
                                        <span>#149001314</span>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Garridge Bassline</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
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
                                    <div class="track-plays">
                                        £7.50<br />
                                        <span>#149001314</span>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Bubblin</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track5.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">MADOGZ</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-right">
                                    <div class="track-plays">
                                        £7.50<br />
                                        <span>#149001314</span>
                                    </div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Pussy Marijuana (Bassline 2 Donkline...</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="clear"></div>

                        </div>
						<div id="bo2-div2">
                            <div class="button-fulllist">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">Full List</a>
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

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track1.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">NEFTI</a></div>
                                    <div class="track-brand"><a href="#">OLD SKOOL</a>, <a href="#">HARDCORE BREAKS</a>, <a href="#">PIANO</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Strike It Up (VIP Mix)</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
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
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Missing U</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
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
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Garridge Bassline</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
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
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Bubblin</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
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
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Pussy Marijuana (Bassline 2 Donkline...</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

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

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track6.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">NEFTI</a></div>
                                    <div class="track-brand"><a href="#">OLD SKOOL</a>, <a href="#">HARDCORE BREAKS</a>, <a href="#">PIANO</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Strike It Up (VIP Mix)</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track7.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">URBAN IMPULZ</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Missing U</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track8.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">CJ REIGN</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE 4x4</a>, <a href="#">GARAGE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Garridge Bassline</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track9.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">SURANG</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Bubblin</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track10.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">MADOGZ</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Pussy Marijuana (Bassline 2 Donkline...</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track1.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">NEFTI</a></div>
                                    <div class="track-brand"><a href="#">OLD SKOOL</a>, <a href="#">HARDCORE BREAKS</a>, <a href="#">PIANO</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Strike It Up (VIP Mix)</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track2.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">URBAN IMPULZ</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Missing U</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
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
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Garridge Bassline</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track4.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">SURANG</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Bubblin</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
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
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Pussy Marijuana (Bassline 2 Donkline...</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="clear"></div>

                        </div>
                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>New tracks in:</strong>  <a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a>, <a href="#">HARDCORE BREAKS</a>
                            </div>
                            <div class="button-fulllist bw-div2-button">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">Full List</a>
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

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track6.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">NEFTI</a></div>
                                    <div class="track-brand"><a href="#">OLD SKOOL</a>, <a href="#">HARDCORE BREAKS</a>, <a href="#">PIANO</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Strike It Up (VIP Mix)</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track7.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">URBAN IMPULZ</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Missing U</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track8.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">CJ REIGN</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE 4x4</a>, <a href="#">GARAGE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Garridge Bassline</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track9.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">SURANG</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Bubblin</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track10.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">MADOGZ</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Pussy Marijuana (Bassline 2 Donkline...</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player tp-new"><img src="images/tmp/track1.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">NEFTI</a></div>
                                    <div class="track-brand"><a href="#">OLD SKOOL</a>, <a href="#">HARDCORE BREAKS</a>, <a href="#">PIANO</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Strike It Up (VIP Mix)</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
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
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Missing U</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="track">
                                <a href="#" class="track-player"><img src="images/tmp/track3.gif" alt="" /></a>
                                <div class="track-row1">
                                    <div class="track-artist"><a href="#">CJ REIGN</a></div>
                                    <div class="track-brand"><a href="#">BASSLINE 4x4</a>, <a href="#">GARAGE</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Garridge Bassline</a></div>
                                    <div class="track-time">5:41</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
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
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Bubblin</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
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
                                <div class="track-row2">
                                    <div class="track-name"><a href="#">Pussy Marijuana (Bassline 2 Donkline...</a></div>
                                    <div class="track-time">6:50</div>
                                    <div class="track-added">2010-10-24</div>
                                    <a href="#" class="track-r"></a>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="clear"></div>

                        </div>
                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>See also:</strong>  <a href="#">CHARTS</a>, <a href="#">TOP ARTISTS</a>, <a href="#">OUR RECOMENNDS TRACKS</a>, <a href="#">NEW TRACKS</a>
                            </div>
                            <div class="button-fulllist bw-div2-button">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">Full List</a>
                            </div>
                            <div class="clear"></div>
                        </div>
				</div>
