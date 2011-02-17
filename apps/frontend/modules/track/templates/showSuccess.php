

                <div class="box-silver" id="box-trackinfo">
                    <div class="bs-inner">
                        <h1><?=$profile->getProfilesName()?> - <?=$track->getTracksTitle()?></h1><br />
                        <div id="bt-tracks">
                            <?php include_partial('metadata/record', array('track' => $track)) ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('profile/artistinfo', array('profile' => $profile)) ?>

                <div class="box-white" id="box-mymusic">
                    <img src="images/texts/other-tracks.gif".gif" alt="Other Tracks" />

                    <div class="bw-tracks">
                        <?foreach ($pager->getResults() as $track):?>
                            <?php include_partial('metadata/record', array('track' => $track)) ?>
                        <?endforeach;?>
                        <div class="clear"></div>
                    </div>
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_object' => $track, 'route_name' => 'track', 'border' => true)) ?>

                </div>

                <?php include_partial('metadata/footer', array('border' => true)) ?>
