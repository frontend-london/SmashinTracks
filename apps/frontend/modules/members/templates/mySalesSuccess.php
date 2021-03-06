                <div class="box-silver" id="box-mysales">
                    <div class="bs-inner">
                        <img src="images/texts/my-sales.gif" alt="My Sales" id="bm2-img1" />
                        <div class="clear"></div>
                        <div id="bm2-div1"><?=TextsPeer::getTextValue('ZALOGOWANY-My-sales-main-text')?></div>
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
                                <?=Smashin::generate_injected_text(TextsPeer::getTextValue('ZALOGOWANY-My-sales-Minimalna-kwota-wyplaty'), array('__KWOTA__' => Smashin::generate_prize(sfConfig::get('app_min_withdraw'))))?>
                            </div>
                            <div id="bm2-div3-right">
                                <div class="button-withdraw">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="<?=url_for('members_withdraw');?>">Withdraw Money</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <form action="<?php echo url_for('members_my-sales') ?>" method="POST" id="form_salesemail" name="form_salesemail">
                                <div id="bm2-div6">
                                    <p>If you would like to be informed via email about your track sales choose notice frequency: </p>
                                    <ul>
                                        <li><?php echo $form['on_sale']->render() ?> <span><?php echo $form['on_sale']->renderLabel('in the moment of track sale') ?></span></li>
                                        <li><?php echo $form['daily']->render() ?> <span><?php echo $form['daily']->renderLabel('once a day summary') ?></span></li>
                                        <li class="last"><?php echo $form['weekly']->render() ?> <span><?php echo $form['weekly']->renderLabel('once a week summary') ?></span></li>
                                    </ul>
                                    <?php echo $form->renderHiddenFields() ?>                                    
                                    <div class="button-save">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <a href="javascript: document.form_salesemail.submit();">SAVE</a>
                                    </div>
                                </div>
                            </form>
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
                                <th class="tt-col1">No.</th>  <th class="tt-col2">Date</th>  <th class="tt-col3">Details</th> <th class="tt-col4">Cost</th> <th class="tt-col5">Balance</th>
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

                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_name' => 'members_my-sales', 'border' => true)) ?>

                    <div class="button-silver-back" id="bw-div11">
                        <div class="button-silver-left"></div>
                        <div class="button-silver-right"></div>
                        <a href="<?=url_for('members'); ?>">Back</a>
                    </div>

                    <div class="clear"></div>

                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>