<?
    if(!isset($border)) $border = false;
    if(!isset($share)) $share = true;
?>
                <div id="box-footer<?if($border):?>-border<?endif;?>">
                    <div id="bf-paypal">
                        <a href="http://paypal.com" target="_blank"><img src="images/icons/paypal.gif" alt="PayPal" /></a>
                    </div>
                    <?if($share):?>
                        <div id="bf-addthis">
                            <!-- AddThis Button BEGIN -->
                            <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=modul"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
                            <script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
                            <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=modul"></script>
                            <!-- AddThis Button END -->
                        </div>
                    <?endif;?>
                    <div class="clear"></div>
                </div>       