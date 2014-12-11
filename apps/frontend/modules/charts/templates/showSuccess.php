<? if ( $ajaxType != 'tab' ): ?>
    <div class="box-white" id="box-top">
        <img src="images/texts/charts-top-30.gif" alt="Charts Top 30" />
        <div class="bw-div1">
            <?if($subsection=='this_week'):?>
                <?=TextsPeer::getTextValue('Charts-This-Week-main-text')?>
            <?elseif($subsection=='last_3_months'):?>
                <?=TextsPeer::getTextValue('Charts-Last-3-months-main-text')?>
            <?else:?>
                <?=TextsPeer::getTextValue('Charts-All-time-main-text')?>
            <?endif;?>
        </div>
        <div class="bw-div8">
            <div class="bookmark<?if($subsection=='this_week'):?> bookmark-active<?elseif($subsection=='last_3_months'):?> bookmark-nobgr-right<?endif;?>">
                <a class="ajax-tab" href="<?=url_for('charts')?>">THIS WEEK</a>
                <div class="bookmark-bgr-left"></div>
                <div class="bookmark-bgr-right"></div>
            </div>

            <div class="bookmark<?if($subsection=='last_3_months'):?> bookmark-active<?elseif($subsection=='all_time'):?> bookmark-nobgr-right<?endif;?>">
                <a class="ajax-tab" href="<?=url_for('charts_3months')?>">LAST 3 MONTHS</a>
                <div class="bookmark-bgr-left"></div>
                <div class="bookmark-bgr-right"></div>
            </div>

            <div class="bookmark<?if($subsection=='all_time'):?> bookmark-active<?else:?> bookmark-nobgr-right<?endif;?>">
                <a class="ajax-tab" href="<?=url_for('charts_all')?>">ALL TIME</a>
                <div class="bookmark-bgr-left"></div>
                <div class="bookmark-bgr-right"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="tab-content">
<? endif; ?>            
            <div class="bw-tracks">
                <?$counter=1; foreach ($tracks as $track):?>
                    <?php include_component('metadata', 'record', array('track' => $track, 'charts' => true, 'charts_num' => $counter)) ?>
                <?$counter++; endforeach;?>
                <div class="clear"></div>
            </div>
<? if ( $ajaxType != 'tab' ): ?>
        </div>
            <div class="bw-div2">
                <div class="bw-div2-text">
                    <strong>See also:</strong>  <a class="ajax-centerside" href="<?=url_for('artists')?>">TOP ARTISTS</a>, <a class="ajax-centerside" href="<?=url_for('new-tracks')?>">NEW TRACKS</a>
                </div>
                <div class="clear"></div>
            </div>
    </div>
    <?php include_partial('metadata/footer') ?>
<? endif; ?>