                <div class="box-silver" id="box-trackiakceptacja">
                    <div class="bs-inner">
                        <img src="images/texts/podeslane-tracki-do-zaakceptowania.gif" alt="Podeslane tracki do zaakceptowania" id="bt2-img1" />
                        <div id="bt2-div1">
                            Lista <span class="blue">wszystkich zuploadowanych przez uzytkownikow trackow</span> w kolejnosci od najstarszej do najnowszej. Tracki powinny byc zaakceptowane badz odrzucone w przeciagu 24 godzin.
                        </div>

                        <div id="bt2-tracks">

                            <?foreach ($pager->getResults() as $track):?>
                                <?php include_component('metadata', 'record', array('track' => $track, 'not_accepted' => true, 'not_accepted_url_accept' => 'panel_acceptances_accept_track', 'not_accepted_url_disapprove' => 'panel_acceptances_disapprove_track')) ?>
                            <?endforeach;?>

                            <div class="clear"></div>

                        </div>
                        <div id="bt2-div2">
                            <div class="button-silver-back">
                                <div class="button-silver-left"></div>
                                <div class="button-silver-right"></div>
                                <a href="<?=url_for('panel_home')?>">Back</a>
                            </div>
                            <div class="clear"></div>
                        </div>

                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <div class="box-white" id="box-top">
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_name' => 'panel_acceptances', 'noborder' => true)) ?>
                </div>
