                <div class="box-white" id="box-top">
                    <img src="images/texts/members-checkout.gif" alt="Members Checkout" />
                    <div class="bw-div1">
                        Do zakupu trackow uzyles system <a href="#" class="underline">Paypal.com</a><br />
                        Ponizej masz szczegóły transakcji...
                    </div>
                    <div class="bw-div6">
                        <div class="bw-div6-order">
	                        Order complete
                        </div>
                        <div class="button-download" id="bw-download">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="<?=url_for('order_unregistered', $transaction);?>">DOWNLOAD TRACKS</a>
                        </div>
                    </div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>