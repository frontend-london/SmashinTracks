                <div class="box-silver" id="box-membershomepage">
                    <div class="bs-inner">
                        <img src="images/texts/members-homepage.gif" alt="Members Homepage" id="bm-img1" />
                        <div id="bm-div1">Witaj w panelu uzytkownika <a href="http://smashintracks.com/" class="underline">Smashintracks.com</a> ...</div>
                        <div id="bm-div2">
                        	<div id="bm-div2-left">
                            	<img src="images/texts/your-balance.gif" alt="Your Balance" id="bm-img2" />
                                <span><?=$profile->getProfilesBalanceText();?></span>
                                <div class="clear"></div>
                            </div>
                        	<div id="bm-div2-right">
                            	<img src="images/texts/tracks-sold.gif" alt="Track Sold" id="bm-img3" />
                                <span><?=$profile->getProfilesTracksSold();?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="bm-div3">
                        	<div id="bm-div3-left">
                                Twoich trackow na tej stronie: &nbsp;  <strong><?=$profile->countTrackssActive()?></strong><br />
                                Odwiedziny twojego profilu: &nbsp; <strong><?=$profile->getProfilesViewedCount()?></strong>
                            </div>
                        	<div id="bm-div3-right">
                                Twoich trackow w innych ‘Wishlist’: &nbsp;<strong><?=$profile->getProfilesInWishlistCount();?></strong><br />
                                Twoja ‘Wishlist’ zawiera trackow: &nbsp;<strong><?=$profile->getProfilesWishlistCount();?></strong>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <div id="zalogowany-boxes">
                	<div class="box-zalogowany bz-left bz-c1">
                    	<a href="#"><img src="images/texts/my-sales.gif" alt="My Sales" /></a>
                        <span>Jesli sprzedajesz tracki na <a href="#" class="underline">Smashintracks.com</a> tutaj mozesz obejrzec jak sie sprzedaja i ile juz zarobiles...</span>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="#">Check</a>
                        </div>
                    </div>
                    <div class="box-zalogowany bz-right bz-c1">
                    	<a href="#"><img src="images/texts/upload-track.gif" alt="Upload Track" /></a>
						<span>Uploaduj swoje tracki na <a href="#" class="underline">Smashintracks.com</a> i zacznij od tego momentu na nich zarabiac!</span>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="#">Check</a>
                        </div>
                    </div>
                	<div class="box-zalogowany bz-left">
                    	<a href="#"><img src="images/texts/my-tracks.gif" alt="My Tracks" /></a>
						<span>Jesli wrzuciles jakies tracki tutaj mozesz zobaczyc ile razy je kupiono, przesluchano, dodano do wishlist...</span>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="#">Check</a>
                        </div>
                    </div>
                    <div class="box-zalogowany bz-right">
                    	<a href="#"><img src="images/texts/my-downloads.gif" alt="My Downloads" /></a>
						<span>Jesli kupowales jakies tracki na <a href="#" class="underline">Smashintracks.com</a> tutaj zobaczysz pelna historie swoich zakupow...</span>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="#">Check</a>
                        </div>
                    </div>
                	<div class="box-zalogowany bz-left bz-c3">
                    	<a href="#"><img src="images/texts/my-wishlist.gif" alt="My Wishlist" /></a>
						<span>Jesli masz liste trackow ktore ci sie spodobaly, w tym miejscu mozesz je przesluchac, kupic lub skasowac...</span>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="#">Check</a>
                        </div>
                    </div>
                    <div class="box-zalogowany bz-right bz-c3">
                    	<a href="#"><img src="images/texts/my-profile.gif" alt="My Profile" /></a>
						<span>Tutaj mozesz zedytowac swoje dane takie jak zmiana hasla, maila, profil artysty, fota etc...</span>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="#">Check</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>