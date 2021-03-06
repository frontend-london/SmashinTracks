<? if ( $ajaxType != 'tab' ): ?>            
    <div class="box-white" id="box-top">
        <img src="images/texts/artists.gif" alt="Artists" />
        <div class="bw-div1">
            <?=TextsPeer::getTextValue('Artists-all-main-text')?>
        </div>
        <div class="bw-div8">
            <div class="bookmark bookmark-nobgr-right">
                <a class="ajax-tab" href="<?=url_for('artists')?>">30 MOST POPULAR</a>
                <div class="bookmark-bgr-left"></div>
                <div class="bookmark-bgr-right"></div>
            </div>
            <div class="bookmark bookmark-active bookmark-nobgr-right">
                <a class="ajax-tab" href="<?=url_for('artists_all')?>">ALL ARTIST</a>
                <div class="bookmark-bgr-left"></div>
                <div class="bookmark-bgr-right"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="tab-content">
<? endif; ?>
            <div class="bw-tracks">
                <? $previous_letter = '';
                  foreach ($artists as $artist):
                    $letter=strtoupper($artist->getProfilesNameFirstLetter());?>
                    <?if(Smashin::is_in_alphabet($letter)):?>
                        <?if($letter != $previous_letter):?>
                            <div class="letter" id="letter-<?=strtolower($letter);?>"><?=$letter?></div>
                        <?endif; $previous_letter = $letter;?>                            
                    <?elseif($previous_letter!='OTHER'):?>
                        <div class="letter" id="letter-other">OTHER</div>
                    <?$previous_letter = 'OTHER'; endif;?>
                    <?php include_partial('artists/record', array('artist' => $artist)) ?>
                <?endforeach;?>
                <div class="clear"></div>
            </div>
            <div class="bw-div2">
                <div class="bw-div2-text">
                    <strong>See also:</strong>  <a class="ajax-centerside" href="<?=url_for('artists')?>">30 MOST POPULAR</a>, <a class="ajax-centerside" href="<?=url_for('charts')?>">CHARTS</a>
                </div>
                <div class="clear"></div>
            </div>
<? if ( $ajaxType != 'tab' ): ?>
        </div>
    </div>
    <?php include_partial('metadata/footer') ?>
<? endif; ?>