<?
    if(!isset($profile_page)) $profile_page = false;
?>
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
                            <?foreach($profile->getProfilesUrlss() as $profileurl):?><a class="at-url" target="_blank" href="<?=$profileurl->getProfilesUrlsUrl();?>"><?echo $profileurl->getProfilesUrlsUrl();?></a><?endforeach;?>
                            <?if($profile_page && $profile->getProfilesId()==ProfilesPeer::getCurrentProfileId()):?>
                                <div class="button-editprofile" id="at-edytuj">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="<?=url_for('members_my-profile')?>">EDIT PROFILE</a>
                                </div>
                            <?endif;?>
                        </div>
                    <?else:?>
                        <div id="at-both">
                            <?if($profile->getProfilesText()):?>
                                <?=html_entity_decode($profile->getProfilesText());?><br />
                            <?endif;?>
                            <?foreach($profile->getProfilesUrlss() as $profileurl):?><a class="at-url" target="_blank" href="<?=$profileurl->getProfilesUrlsUrl();?>"><?echo $profileurl->getProfilesUrlsUrl();?></a><?endforeach;?>
                            <?if($profile->getProfilesId()==ProfilesPeer::getCurrentProfileId()):?>
                                <div class="button-editprofile" id="at-edytuj">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="<?=url_for('members_my-profile')?>">EDIT PROFILE</a>
                                </div>
                            <?endif;?>
                        </div>
                    <?endif;?>
                    <div class="clear"></div>
                </div>