                <div class="box-white" id="box-top">
                    <img src="images/texts/my-wishlist.gif" alt="My Wishlist" />
                    <div class="bw-div1">
                        <?if($subsection=='last_added'):?>
                            <?=TextsPeer::getTextValue('ZALOGOWANY-My-Wishlist-last-added')?>
                        <?else:?>
                            <?=TextsPeer::getTextValue('ZALOGOWANY-My-Wishlist-by-artist')?>
                        <?endif;?>
                    </div>

                    <div class="bw-div8">
                        <div class="bookmark<?if($subsection=='last_added'):?> bookmark-active<?elseif($subsection=='by_artist'):?> bookmark-nobgr-right<?endif;?>">
                            <a href="<?=url_for('members_my-wishlist')?>">LAST ADDED</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                        <div class="bookmark<?if($subsection=='by_artist'):?> bookmark-active<?else:?> bookmark-nobgr-right<?endif;?>">
                            <a href="<?=url_for('members_my-wishlist_by_artist')?>">BY ARTIST</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                        <div class="clear"></div>
                    </div>

                    <div class="bw-tracks">

                            <?foreach ($tracks as $track):?>
                                <?php include_component('metadata', 'record', array('track' => $track, 'wishlist' => true, 'subsection' => $subsection)) ?>
                            <?endforeach;?>

                            <div class="clear"></div>

                        </div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false, 'border' => true)) ?>