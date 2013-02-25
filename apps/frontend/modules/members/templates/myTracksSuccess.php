                <div class="box-white" id="box-top">
                    <img src="images/texts/my-tracks.gif" alt="My Tracks" />
                    <div class="bw-div1">
                        <?if($subsection=='all_tracks'):?>
                            <?=TextsPeer::getTextValue('ZALOGOWANY-My-Tracks-All')?>
                        <?elseif($subsection=='most_popular'):?>
                            <?=TextsPeer::getTextValue('ZALOGOWANY-My-Tracks-Most-Popular')?>
                        <?else:?>
                            <?=TextsPeer::getTextValue('ZALOGOWANY-My-Tracks-in-wishlists')?>
                        <?endif;?>
                    </div>
                    <div class="bw-div8">
                    	<div class="bookmark<?if($subsection=='all_tracks'):?> bookmark-active<?elseif($subsection=='most_popular'):?> bookmark-nobgr-right<?endif;?>">
                            <a href="<?=url_for('members_my-tracks')?>">MY ALL TRACKS  (<?=$tracks_count?>)</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                    	<div class="bookmark<?if($subsection=='most_popular'):?> bookmark-active<?elseif($subsection=='in_wishlists'):?> bookmark-nobgr-right<?endif;?>">
                            <a href="<?=url_for('members_my-tracks_most_popular')?>">MOST POPULAR</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                    	<div class="bookmark<?if($subsection=='in_wishlists'):?> bookmark-active<?else:?> bookmark-nobgr-right<?endif;?>">
                            <a href="<?=url_for('members_my-tracks_in_wishlists')?>">IN WISHLISTS</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                        <div class="bw-tracks">

                            <?foreach ($tracks as $track):?>
                                <?php include_component('metadata', 'record', array('track' => $track, 'my_tracks' => true, 'no_icon_wishlist' => true, 'my_tracks_in_wishlists' => $in_wishlists)) ?>
                            <?endforeach;?>

                            <div class="clear"></div>

                        </div>
                </div>

                <div id="dialog-confirm" title="Delete track?" style="display: none;">
                    <p style="line-height: 25px;">
                        <span class="ui-icon ui-icon-alert" style="float: left; margin: 6px 7px 10px 0;"></span>
                        Track will be permanently deleted and cannot be recovered. Are you sure?
                    </p>
                </div>

                <?php include_partial('metadata/footer', array('share' => false, 'border' => true)) ?>