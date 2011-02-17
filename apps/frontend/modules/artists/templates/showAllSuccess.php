                <div class="box-white" id="box-top">
                    <img src="images/texts/artists.gif" alt="Artists" />
                    <div class="bw-div1">
                        Sed vitae tellus dui, <span class="blue">non condimentum</span> purus. Sed vitae tellus dui, non <br />
                        condimentum purus. See also other 'CHARTS'.
                    </div>
                    <div class="bw-div8">
                    	<div class="bookmark bookmark-nobgr-right">
                            <a href="<?=url_for('artists')?>">30 MOST POPULAR</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                    	<div class="bookmark bookmark-active bookmark-nobgr-right">
                            <a href="<?=url_for('artists_all')?>">ALL ARTIST</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                        <div class="clear"></div>
                    </div>

                        <div class="bw-tracks">

                        

                        <? $previous_letter = '';
                          foreach ($artists as $artist):
                            $letter=strtoupper($artist->getProfilesNameFirstLetter());?>
                            <?if($letter != $previous_letter):?>
                                <div class="letter" id="letter-<?=strtolower($letter);?>"><?=$letter?></div>
                            <?endif; $previous_letter = $letter;?>
                                
                            <?php include_partial('artists/record', array('artist' => $artist)) ?>
                            
                        <?endforeach;?>

							

                            <div class="clear"></div>

                        </div>

                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>See also:</strong>  <a href="<?=url_for('artists')?>">30 MOST POPULAR</a>, <a href="<?=url_for('charts')?>">CHARTS</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                </div>

                <?php include_partial('metadata/footer') ?>