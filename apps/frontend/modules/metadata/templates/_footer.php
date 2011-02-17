<?
    if(!isset($border)) $border = false;
    if(!isset($share)) $share = true;
    if(!isset($facebook)) $facebook = false;
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
                    <?if($facebook):?>
                        <div id="bf-facebook">
                            <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fplatform&amp;width=531&amp;colorscheme=light&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=254" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:531px; height:254px;" allowTransparency="true"></iframe>
                        </div>
                    <?endif;?>
                    <div class="clear"></div>
                </div>       