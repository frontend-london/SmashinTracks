                <?php include_partial('profile/artistinfo', array('profile' => $profile)) ?>

                <div class="box-white" id="box-mymusic">
                    <?if($pager->getResults()->count()):?>
                        <img src="images/texts/my-music.gif" alt="My Music" />
                    <?endif;?>
                    <div class="bw-tracks">
                        <?foreach ($pager->getResults() as $track):?>
                            <?php include_partial('metadata/record', array('track' => $track)) ?>
                        <?endforeach;?>
                        <div class="clear"></div>
                    </div>
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_object' => $profile, 'route_name' => 'profile', 'border' => true)) ?>
                    <div class="bw-div5">
                        This profile has been viewed <strong>77 times</strong>  / <strong>6 added</strong> to favorites
                    </div>
                </div>
                <?php include_partial('metadata/footer', array('border' => true)) ?>
