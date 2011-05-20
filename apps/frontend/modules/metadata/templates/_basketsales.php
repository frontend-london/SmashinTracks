<?if($isAdmin):?>
    <div id="box-basket">
        <div class="box-silver2">
            <div class="bs2-inner">
                <img src="images/texts/dzisiejsza-sprzedaz.gif" alt="Dzisiejsza Sprzedaż" id="bb-img1" />
                <dl id="bb-dl1">
                    <dt>Tracków:</dt>	<dd><?=$day_tracks;?></dd>
                    <dt>Kasa:</dt>      <dd><?=$day_profit?></dd>
                    <div class="clear"></div>
                </dl>
                <img src="images/texts/caly-miesiac.gif" alt="Cały miesiąc" id="bb-img2" />
                <dl id="bb-dl2">
                    <dt>Tracków:</dt>       <dd><?=$month_tracks;?></dd>
                    <dt>Kasa sklepu:</dt>   <dd><?=$month_profit;?></dd>
                    <div class="clear"></div>
                </dl>
            </div>
            <div class="bs2-bgr-bottom"></div>
        </div>
    </div>
<?else:?>
    <div id="box-basket"<?if($isBasket):?> style="display:none"<?endif;?>>
        <div class="box-silver2">
            <div class="bs2-inner">
                <a href="<?=url_for('basket')?>"><img src="images/texts/your-basket.gif" alt="Your Basket" id="bb-img1" /></a>                
                <div id="bb-items">
                    <div id="bb-splash">
                        <h3>Adding to Basket..</h3>
                    </div>
                    <?if(!$emptyBasket):?>
                        <?foreach ($tracks as $track):?>
                            <?php include_component('metadata', 'record', array('track' => $track, 'basket_box' => true)) ?>
                        <?endforeach;?>
                    <?endif;?>
                </div>
                <div id="bb-empty"<?if(!$emptyBasket):?> style="display:none;"<?endif;?>>Your basket is empty...</div>
            </div>
            <div class="bs2-bgr-bottom"></div>
        </div>
        <div id="bb-prize-checkout"<?if($emptyBasket):?> style="display:none;"<?endif?>>
            <div id="bb-prize"><span><?=$basketPrize;?></span> GBP</div>
            <div class="button-checkout" id="bb-checkout">
                <div class="button-left"></div>
                <div class="button-right"></div>
                <a href="<?=url_for('basket')?>">CHECK OUT</a>
            </div>
        </div>
        <div class="clear"></div>
    </div>

<?endif;?>