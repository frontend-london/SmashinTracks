
                <div class="box-white" id="box-top">
                    <img src="images/texts/new-tracks.gif" alt="New Tracks" />
                    <div class="bw-div1">
                        <?=TextsPeer::getTextValue('New-tracks-main-text')?>
                    </div>
                    <div class="bw-tracks">
                        <?foreach ($pager->getResults() as $track):?>
                            <?php include_component('metadata', 'record', array('track' => $track)) ?>
                        <?endforeach;?>
                        <div class="clear"></div>
                    </div>
                    <div class="bw-div2">
                        <div class="bw-div2-text">
                            <strong>See also:</strong>  <a href="<?=url_for('artists')?>">TOP ARTISTS</a>, <a href="#">CHARTS</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_name' => 'new-tracks')) ?>
                </div>

                <?php include_partial('metadata/footer') ?>