                <div class="box-white" id="box-top">
                    <img src="images/texts/my-wishlist.gif" alt="My Wishlist" />
                    <div class="bw-div1">
                        W tym miejscu widzisz swoja liste <span class="blue">‘Wishlist’</span>. Dzieki niej mozesz zachowywac w pamieci swojego profilu tracki ktore chcialbys kupic w przyszlosci etc.
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
                                <?php include_partial('metadata/record', array('track' => $track, 'wishlist' => true, 'subsection' => $subsection)) ?>
                            <?endforeach;?>

                            <div class="clear"></div>

                        </div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false, 'border' => true)) ?>