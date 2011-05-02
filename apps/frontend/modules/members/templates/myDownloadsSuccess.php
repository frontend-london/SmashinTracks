                <div class="box-white" id="box-top">
                    <img src="images/texts/my-downloads.gif" alt="My Downloads" />
                    <div class="bw-div1">
                        Tutaj obejrzysz historie swoich zakupow. Jesli kupiles tracki w przeciagu 24 godzin
                        w tym miejscu znajdziesz linki do ich pobrania.
                    </div>
					<table id="table-mydownloads" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
	                            <th class="tm-col1">Date</th>  <th class="tm-col2">Details</th>  <th class="tm-col3">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?foreach ($transactions as $transaction):?>
                                <tr class="tm-hover">
                                    <td class="tm-col1"><?=$transaction->getTransactionsDate('d-m-Y');?></td>  <td class="tm-col2"><a href="#" class="a-mydownloads-info">Order:&nbsp; #<?=$transaction->getTransactionsId();?></a> <?if($transaction->getTransactionsPaymethod()=='1'):?><span>PAYPAL</span><?endif;?></td>  <td class="tm-col3"><?=$transaction->getTransactionsValue()?></td>
                                </tr>
                                <tr class="nodisplay">
                                    <td colspan="3" class="tm-col4">
                                        <?foreach($transaction->getTransactionsTrackssJoinTracks() as $transaction_track):?>
                                            <?if($transaction->isTransactionActive()):?>
                                                <?php include_partial('metadata/record', array('download' => true, 'transactions_tracks' => $transaction_track, 'track' => $transaction_track->getTracks(), 'no_icon_wishlist' => true, )) ?>
                                            <?else:?>
                                                <?php include_partial('metadata/record', array('track' => $transaction_track->getTracks(), 'no_icon_wishlist' => true, )) ?>
                                            <?endif;?>
                                        <?endforeach;?>
                                    </td>
                                </tr>
                            <?endforeach;?>
                        </tbody>
                    </table>

                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>