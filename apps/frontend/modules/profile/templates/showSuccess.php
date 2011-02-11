                <div id="artistpage-top<?if(!$profile->isContent()):?>-nocontent<?endif;?>">
                    <h1><?=$profile->getProfilesName();?></h1><?if($profile->isContent()):?><br /><?endif;?>
                    <?if($profile->getProfilesPhoto()):?>
                        <div id="at-left">
                            <img src="images/profiles/big/<?=$profile->getProfilesPath(); ?>.jpg" alt="<?=$profile->getProfilesName();?>" />
                        </div>
                        <div id="at-right">
                            <?if($profile->getProfilesText()):?>
                                <?=html_entity_decode($profile->getProfilesText());?><br />
                            <?endif;?>
                            <?foreach($profile->getProfilesUrlss() as $profileurl):?><a class="at-url" href="<?=$profileurl->getProfilesUrlsUrl();?>"><?echo $profileurl->getProfilesUrlsUrl();?></a><?endforeach;?>
                        </div>
                    <?else:?>
                        <div id="at-both">
                            <?if($profile->getProfilesText()):?>
                                <?=html_entity_decode($profile->getProfilesText());?><br />
                            <?endif;?>
                            <?foreach($profile->getProfilesUrlss() as $profileurl):?><a class="at-url" href="<?=$profileurl->getProfilesUrlsUrl();?>"><?echo $profileurl->getProfilesUrlsUrl();?></a><?endforeach;?>
                        </div>
                    <?endif;?>
                    <div class="clear"></div>
                </div>

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
