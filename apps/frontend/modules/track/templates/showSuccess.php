                <? slot('head-facebook'); ?>
                    <meta property="og:image" content="images/profiles/big/<?=$profile->getProfilesPath(); ?>.jpg" />
                    <meta property="og:type" content="song" />
                    <meta property="og:audio" content="mp3/<?=$track->getTracksPath(); ?>.mp3" />
                    <meta property="og:audio:title" content="<?=$track->getTracksTitle()?>" />
                    <meta property="og:audio:artist" content="<?=$profile->getProfilesName()?>" />
                    <meta property="og:audio:type" content="application/mp3" />        
                <? end_slot(); ?>

                <div class="box-silver" id="box-trackinfo">
                    <div class="bs-inner">
                        <h1><?=$profile->getProfilesName()?> - <?=$track->getTracksTitle()?></h1><br />
                        <div id="bt-tracks">
                            <?php include_component('metadata', 'record', array('track' => $track, 'admin_icons' => $isAdmin, 'no_icon_wishlist' => $isAdmin)) ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('profile/artistinfo', array('profile' => $profile)) ?>

                <div class="box-white" id="box-mymusic">
                    <img src="images/texts/other-tracks.gif" alt="Other Tracks" />

                    <div class="bw-tracks">
                        <?foreach ($pager->getResults() as $track):?>
                            <?php include_component('metadata', 'record', array('track' => $track, 'admin_icons' => $isAdmin, 'no_icon_wishlist' => $isAdmin)) ?>
                        <?endforeach;?>
                        <div class="clear"></div>
                    </div>
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_object' => $track, 'route_name' => 'track', 'border' => true)) ?>

                </div>

                <?php include_partial('metadata/footer', array('border' => true)) ?>
