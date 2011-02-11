
                <div id="artistpage-top">
                    <h1><?=$profile->getProfilesName();?></h1><br />
					<div id="at-left">
                    	<img src="images/tmp/artist1.gif" alt="" />
                    </div>
					<div id="at-right">
                        <?=html_entity_decode($profile->getProfilesText());?><br />
                        <?foreach($profile->getProfilesUrlss() as $profileurl):?><a class="at-url" href="<?=$profileurl->getProfilesUrlsUrl();?>"><?echo $profileurl->getProfilesUrlsUrl();?></a><?endforeach;?>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="box-white" id="box-mymusic">
                    <img src="images/texts/my-music.gif" alt="My Music" />
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
