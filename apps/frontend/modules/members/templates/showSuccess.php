                <div class="box-silver" id="box-membershomepage">
                    <div class="bs-inner">
                        <img src="images/texts/members-homepage.gif" alt="Members Homepage" id="bm-img1" />
                        <div id="bm-div1"><?=TextsPeer::getTextValue('ZALOGOWANY-Home-welcome-text')?></div>
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
                                <?=Smashin::generate_injected_text(TextsPeer::getTextValue('ZALOGOWANY-Home-Twoich-trackow'), array('__ILOSC__' => $profile->countTrackssActive()))?>
                                <?=Smashin::generate_injected_text(TextsPeer::getTextValue('ZALOGOWANY-Home-Odwiedzin-Twojego'), array('__ILOSC__' => $profile->getProfilesViewedCount()))?>
                            </div>
                            <div id="bm-div3-right">
                                <?=Smashin::generate_injected_text(TextsPeer::getTextValue('ZALOGOWANY-Home-twoich-trackow-w-wishlist'), array('__ILOSC__' => $profile->getProfilesInWishlistCount()))?>
                                <?=Smashin::generate_injected_text(TextsPeer::getTextValue('ZALOGOWANY-Home-twoja-wishlist-zawiera'), array('__ILOSC__' => $profile->getProfilesWishlistCount()))?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <div id="zalogowany-boxes">
                	<div class="box-zalogowany bz-left bz-c1">
                    	<a href="<?=url_for('members_my-sales');?>"><img src="images/texts/my-sales.gif" alt="My Sales" /></a>
                        <?=TextsPeer::getTextValue('ZALOGOWANY-Home-my-sales')?>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="<?=url_for('members_my-sales');?>">Check</a>
                        </div>
                    </div>
                    <div class="box-zalogowany bz-right bz-c1">
                    	<a href="<?=url_for('members_upload-track');?>"><img src="images/texts/upload-track.gif" alt="Upload Track" /></a>
                        <?=TextsPeer::getTextValue('ZALOGOWANY-Home-upload-track')?>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="<?=url_for('members_upload-track');?>">Check</a>
                        </div>
                    </div>
                	<div class="box-zalogowany bz-left">
                    	<a href="<?=url_for('members_my-tracks');?>"><img src="images/texts/my-tracks.gif" alt="My Tracks" /></a>
                        <?=TextsPeer::getTextValue('ZALOGOWANY-Home-my-tracks')?>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="<?=url_for('members_my-tracks');?>">Check</a>
                        </div>
                    </div>
                    <div class="box-zalogowany bz-right">
                    	<a href="<?=url_for('members_my-downloads');?>"><img src="images/texts/my-downloads.gif" alt="My Downloads" /></a>
                        <?=TextsPeer::getTextValue('ZALOGOWANY-Home-my-downloads')?>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="<?=url_for('members_my-downloads');?>">Check</a>
                        </div>
                    </div>
                	<div class="box-zalogowany bz-left bz-c3">
                    	<a href="<?=url_for('members_my-wishlist');?>"><img src="images/texts/my-wishlist.gif" alt="My Wishlist" /></a>
                        <?=TextsPeer::getTextValue('ZALOGOWANY-Home-my-wishlist')?>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="<?=url_for('members_my-wishlist');?>">Check</a>
                        </div>
                    </div>
                    <div class="box-zalogowany bz-right bz-c3">
                    	<a href="<?=url_for('members_my-profile');?>"><img src="images/texts/my-profile.gif" alt="My Profile" /></a>
                        <?=TextsPeer::getTextValue('ZALOGOWANY-Home-my-profile')?>
                        <div class="button-check">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="<?=url_for('members_my-profile');?>">Check</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>

                <?if($withdraw_complete_message):?>
                    <? slot('box-message'); ?>
                        <div id="bm5-container">
                            <div class="box-message">
                                <div class="bm5-outer">
                                    <div class="bm5-inner">
                                        <img src="images/texts/ok.gif" alt="OK" class="bm5-img1" />
                                        <div class="bm5-div1">
                                            <?=TextsPeer::getTextValue('ZALOGOWANY-Wyplata-pieniedzy-zgloszenie-wysla')?>
                                        </div>
                                        <div class="button-close">
                                            <div class="button-left"></div>
                                            <div class="button-right"></div>
                                            <a href="#" id="bm5-a-close">CLOSE</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="bm5-bgr-top"></div>
                                <div class="bm5-bgr-bottom"></div>
                            </div>
                        </div>
                    <? end_slot(); ?>
                <?endif;?>