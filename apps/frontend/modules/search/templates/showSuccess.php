                <div class="box-silver" id="box-searchresults">
                    <div class="bs-inner">
                        <img src="images/texts/results-for.gif" alt="Results for:" id="bs-img1" />
                        <div id="bs-div1"><?=$keyword;?></div>
                        <div class="clear"></div>
                        <div id="bs-div2">Here's a hand picked selection of smashing tracks personally recommended by <a href="#" class="underline">Smashintracks.com</a> in this week.</div>

                        <div id="bs-tracks">
                            <?foreach ($pager->getResults() as $track):?>
                                <?php include_component('metadata', 'record', array('track' => $track)) ?>
                            <?endforeach;?>
                            <div class="clear"></div>
                        </div>
                        
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <div class="box-white" id="box-top">
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_name' => 'search', 'noborder' => true, 'path' => '&k='.$keyword)) ?>
                </div>

                <?php include_partial('metadata/footer') ?>
