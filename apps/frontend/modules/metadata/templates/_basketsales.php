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
    <div id="box-basket">
        <div class="box-silver2">
            <div class="bs2-inner">
                <a href="<?=url_for('basket')?>"><img src="images/texts/your-basket.gif" alt="Your Basket" id="bb-img1" /></a>
                <div id="bb-empty">Your basket is empty...</div>
            </div>
            <div class="bs2-bgr-bottom"></div>
        </div>
    </div>
<?endif;?>