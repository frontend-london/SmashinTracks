                <div class="box-white" id="box-top">
                    <img src="images/texts/artists.gif" alt="Artists" />
                    <div class="bw-div1">
                        W tym miejscu masz podgląd na wszystkich artystów na <a href="#" class="underline">Smashintracks.com</a>, ilość tracków jakie udostepniają, krótki opis oraz możliwość edytowania profili.
                    </div>
                    <div class="bw-div8">
                    	<div class="bookmark bookmark-nobgr-right">
                            <a href="<?=url_for('panel_artists')?>">OSTATNIO DODANI</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                    	<div class="bookmark bookmark-active">
                            <a href="<?=url_for('panel_artists_alphabetically')?>">WSZYSCY</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                    	<div class="bookmark bookmark-nobgr-right">
                            <a href="<?=url_for('panel_artists_blocked')?>">ZABLOKOWANI</a>
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
                                
                            <?php include_partial('artists/record', array('artist' => $artist, 'panel' => true)) ?>
                            
                        <?endforeach;?>

                        <div class="clear"></div>
                    </div>
                </div>