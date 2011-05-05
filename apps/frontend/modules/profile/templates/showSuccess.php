                <?php include_partial('profile/artistinfo', array('profile' => $profile, 'profile_page' => true, 'isAdmin' => $isAdmin)) ?>

                <div class="box-white" id="box-mymusic">
                    <?if($pager->getResults()->count()):?>
                        <img src="images/texts/my-music.gif" alt="My Music" />
                    <?endif;?>
                    <div class="bw-tracks">
                        <?foreach ($pager->getResults() as $track):?>
                            <?php include_partial('metadata/record', array('track' => $track, 'admin_icons' => $isAdmin, 'no_icon_wishlist' => $isAdmin)) ?>
                        <?endforeach;?>
                        <div class="clear"></div>
                    </div>
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_object' => $profile, 'route_name' => 'profile', 'border' => true)) ?>
                    <div class="bw-div5">
                        This profile has been viewed <strong><?=$profile->getProfilesViewedTimes()?> times</strong>
                    </div>
                </div>
                <?php include_partial('metadata/footer', array('border' => true)) ?>
