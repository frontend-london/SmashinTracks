                <div class="box-white" id="box-top">
                    <img src="images/texts/members-checkout.gif" alt="Members Checkout" />
                    <div class="bw-div1">
                        You have used Smashintracks payment for your purchase.<br />
                        Transactions details below…
                    </div>
                    <div class="bw-div6">
                        <dl>
                            <dt>Your balance (srodki):</dt>	<dd><?=$profile_balance;?></dd>
                            <dt>Basket total:</dt>		<dd><?=$basket_prize;?></dd>
                            <dt>New balance:</dt>		<dd><?=$new_balance?></dd>
                        </dl>
                        <div class="bw-div6-order">
	                        Order complete
                        </div>
                        <div class="button-download" id="bw-download">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="<?=  url_for('order_registered', $transaction)?>">DOWNLOAD TRACKS</a>
                        </div>
                    </div>


                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>