                <? slot('head-facebook'); ?>
                    <meta property="og:url" content="<?=url_for('track', $track, true)?>" />
                    <meta property="og:image" content="http://<?=$_SERVER['SERVER_NAME'].$sf_request->getRelativeUrlRoot()?>/images/profiles/big/<?=$profile->getProfilesPath(); ?>.jpg" />
                    <meta property="og:title" content="<?=$profile->getProfilesName()?> | Download MP3 | SmashinTracks.com" />
                    <meta property="og:description" content="<?=$profile->getProfilesName()?> - <?=$track->getTracksTitle()?> | Download MP3 | SmashinTracks.com" />
                    <meta name="medium" content="video" />
                    <meta property="og:type" content="video" />
                    <meta property="og:video:height" content="93" />
                    <meta property="og:video:width" content="414" />
                    <meta property="og:video:type" content="application/x-shockwave-flash" />
                    <meta property="og:video" content="http://<?=$_SERVER['SERVER_NAME'].$sf_request->getRelativeUrlRoot()?>/swf/fbPlayer/fbPlayer.swf?configUrl=http://<?=$_SERVER['SERVER_NAME'].$sf_request->getRelativeUrlRoot()?>/swf/fbPlayer/<?=$track->getTracksId()?>" />
                    <?if(0):?>
                        <!--
                        <meta property="og:audio" content="http://<?=$_SERVER['SERVER_NAME'].$sf_request->getRelativeUrlRoot()?>/mp3/<?=$track->getTracksPath(); ?>.mp3" />
                        <meta property="og:audio:title" content="<?=$track->getTracksTitle()?>" />
                        <meta property="og:audio:artist" content="<?=$profile->getProfilesName()?>" />
                        <meta property="og:audio:type" content="application/mp3" />        
                        -->                    
                    <?endif?>
                <? end_slot(); ?>
                
                <div class="box-silver" id="box-trackinfo">
                    <div class="bs-inner">
                        <h1><?=$track->getTracksArtist()?> -  <?=$track->getTracksTitle()?></h1><br />
                        <div id="bt-tracks">
                            <?php include_component('metadata', 'record', array('track' => $track, 'admin_icons' => $isAdmin, 'no_icon_wishlist' => $isAdmin)) ?>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="fb-like-outer">
                            <div class="fb-like" data-href="<?=url_for('track', $track, true)?>" data-send="false" data-width="533" data-show-faces="false" data-font="tahoma"></div>
                        </div>
                        
                        <div class="fb-comments-outer">
                            <div class="fb-comments" data-href="<?=url_for('track', $track, true)?>" data-num-posts="2" data-width="533"></div>
                            <div class="fb-comments-bottom"></div>
                        </div>                        
                        
                        <div class="vote-track">
                            <?if($track->hasVoted(ProfilesPeer::getCurrentProfileId())):?>
                                <div class="vt-text">You have voted for this track</div>
                                <span class="vt-star2"></span>
                            <?else:?>
                                <div class="vt-text">Vote for this track:</div>
                                <a href="<?=url_for('vote_track', $track, true)?>" class="vt-star"></a>
                            <?endif?>
                            <div class="vt-rating"></div>
                            <div class="vt-status">Rating <span><?=$track->getVotesCount()?></span> stars</div>
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
