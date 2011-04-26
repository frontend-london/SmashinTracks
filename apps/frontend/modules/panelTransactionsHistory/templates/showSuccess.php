                <div class="box-silver" id="box-ostatniosprzedane">
                    <div class="bs-inner">
                        <img src="images/texts/historia-sprzedazy.gif" alt="Historia Sprzedaży" id="bo2-img1" />
                        <div id="bo2-div1">
                            Poniżej pełna lista <span class="blue">sprzedanych tracków</span> na Smashintracks.com
                        </div>

                        <div id="bo2-tracks">
                            <?$last_date = ''; foreach ($pager->getResults() as $transaction):?>
                                <?if($last_date!=$transaction->getTransactionsDatePolish()):?>
                                    <div class="track-date">
                                        <?$last_date = $transaction->getTransactionsDatePolish(); echo $last_date;?>
                                    </div>
                                <?endif?>
                                <?foreach($transaction->getTransactionsTrackssJoinTracks() as $transaction_track):?>
                                    <?php include_partial('metadata/record', array('transaction_list' => true, 'transactions_tracks' => $transaction_track, 'track' => $transaction_track->getTracks(), 'icon_wishlist' => false)) ?>
                                <?endforeach;?>

                            <?endforeach;?>

                        </div>
					</div>
                    <div class="bs-bgr-bottom"></div>
                </div>
                <div class="box-white" id="box-top">
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_name' => 'panel_transactions-history', 'noborder' => true)) ?>
                </div>