                <div class="box-silver" id="box-mysales">
                    <div class="bs-inner">
                        <img src="images/texts/my-sales.gif" alt="My Sales" id="bm2-img1" />
                        <div id="bm2-div5" class="uppercase"><?=$profile->getProfilesName()?></div>
                        <div class="clear"></div>
                        <div id="bm2-div1">Jesli sprzedajesz tracki na <a href="#" class="underline">Smashintracks.com</a> tutaj mozesz obejrzec jak sie sprzedaja, ile juz zarobiles oraz wyplacic pieniadze.</div>
                        <div id="bm2-div2">
                        	<div id="bm2-div2-left">
                            	<img src="images/texts/your-balance.gif" alt="Your Balance" id="bm2-img2" />
                                <span><?=$profile->getProfilesBalanceText();?></span>
                                <div class="clear"></div>
                            </div>
                        	<div id="bm2-div2-right">
                            	<img src="images/texts/tracks-sold.gif" alt="Track Sold" id="bm2-img3" />
                                <div id="bm2-div4"><?=$profile->getTracksSoldNew();?>  <span id="bm2-span1">l</span> <span id="bm2-span2"><?=$profile->getTracksSoldAll();?></span></div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="bm2-div3">
                            <div id="bm2-div3-left">
                                Minimalna kwota wyplaty to <strong><?=Smashin::generate_prize(sfConfig::get('app_min_withdraw'))?></strong>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <div class="box-white">
                    <img src="images/texts/transaction-history.gif" alt="Transaction History" />
                    <table id="table-transactions" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="tt-col1">No.</th>  <th class="tt-col2">Date</th>  <th class="tt-col3">Details</th> <th class="tt-col4">Amount</th> <th class="tt-col5">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?foreach ($pager->getResults() as $transaction):?>
                                <tr<?if($transaction['type']=='W'):?> class="tt-withdrawal"<?elseif($transaction['type']=='SH'):?> class="tt-shopping"<?endif;?>>
                                  <td class="tt-col1"><?=$transaction['nr']?></td>
                                  <td class="tt-col2"><?=$transaction['date']?></td>
                                  <td class="tt-col3">
                                    <?if(!empty($transaction['details_url'])):?>
                                      <a href="<?=$transaction['details_url']?>"><?=$transaction['details']?></a>
                                    <?else:?>
                                      <?=$transaction['details']?>
                                    <?endif;?>
                                    <?if($transaction['paypal']):?>
                                        <span>PAYPAL</span>
                                    <?endif;?>
                                  </td>
                                  <td class="tt-col4"><?=$transaction['amount_string']?></td>
                                  <td class="tt-col5"><?=$transaction['saldo']?></td>
                                </tr>
                            <?endforeach;?>
                        </tbody>
                    </table>

                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_name' => 'panel_sales', 'route_object' => $profile, 'border' => true)) ?>

                    <div class="button-silver-back" id="bw-div11">
                        <div class="button-silver-left"></div>
                        <div class="button-silver-right"></div>
                        <a href="<?=url_for('profile', $profile)?>">Back</a>
                    </div>

                    <div class="clear"></div>

                </div>