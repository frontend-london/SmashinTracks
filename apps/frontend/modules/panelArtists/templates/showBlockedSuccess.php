<!--                <div class="box-white" id="box-top">-->
<div class="box-silver" id="box-artyscizablokowani">
                    <div class="bs-inner">

                    <img src="images/texts/artysci-zablokowani.gif" alt="Artyści Zablokowani" id="ba-img1" />
                    <div id="ba-div1">
                        Ponizej znajdziesz liste artystow ktorych profile z roznych przyczyn zostaly zablokowane. Mozesz je odblokowac, skasowac lub edytowac.
                    </div>
                    <div class="bw-div8">
                    	<div class="bookmark">
                            <a href="<?=url_for('panel_artists')?>">ODBLOKOWANI</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                    	<div class="bookmark bookmark-active">
                            <a href="<?=url_for('panel_artists_blocked')?>">OSTATNIO DODANI</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                    	<div class="bookmark bookmark-nobgr-right">
                            <a href="<?=url_for('panel_artists_blocked_alphabetically')?>">WSZYSCY</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                        <div class="clear"></div>
                    </div>

                        <div id="ba-tracks">

                            <?foreach ($pager->getResults() as $artist):?>
                                <?php include_partial('artists/record', array('artist' => $artist, 'panel_blocked' => true)) ?>
                            <?endforeach;?>

                            <div class="clear"></div>

                        </div>

                        <div class="box-white" id="box-top">
                            <?php include_partial('metadata/paging', array('pager' => $pager, 'route_name' => 'panel_artists', 'noborder' => true)) ?>
                        </div>

                <!--</div>-->
					</div>
                    <div class="bs-bgr-bottom"></div>
                </div>
