<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <base href="<?="http://{$_SERVER['SERVER_NAME']}{$sf_request->getRelativeUrlRoot()}/"?>" />
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>

</head>
<body>
	<div id="wrap">
    	<div id="wrap-inner">
            <div id="header">
                <a href="<?="http://{$_SERVER['SERVER_NAME']}{$sf_request->getRelativeUrlRoot()}/"?>" id="logo">SmashinTracks.com - Tracks you won't find anywhere else</a>
                <ul id="mainmenu">
                    <li class="active"><a href="<?="http://{$_SERVER['SERVER_NAME']}{$sf_request->getRelativeUrlRoot()}/"?>">Home</a></li>
                    <li><a href="#">Charts</a></li>
                    <li><a href="#">Artists</a></li>
                    <li><a href="#">Faq</a></li>
                </ul>
                <div id="search-top">
                    <form name="#" action="#" method="get">
                        <input type="text" id="st-text" name="#" value="" />
                        <input type="submit" id="st-submit-fake" value="Search" />
                        <a href="#" id="st-submit">Search</a>
                    </form>
                </div>
                <ul id="submenu">        
                    <li id="submenu-hi">Hi, <strong>Martino.B</strong></li>
                    <li class="active"><a href="#">HOME</a></li>
                    <li><a href="#">MY SALES</a></li>
                    <li><a href="#">UPLOAD TRACK</a></li>
                    <li><a href="#">MY CATALOG</a></li>
                    <li><a href="#">MY DOWNLOADS</a></li>
                    <li><a href="#">MY WISHLIST</a></li>
                    <li class="last"><a href="#">MY PROFILE</a></li>
                    <li class="last right"><a href="#">SIGN OUT</a></li>
					<!--    
                    <li class="last right"><a href="#">Register</a></li>
                    <li class="right"><a href="#">Login</a></li>
                    -->                         
                </ul>
            </div>
            <div id="leftside">
                <?php include_component('metadata', 'menuleft') ?>
            </div>
            <div id="centerside">
                <?php echo $sf_content ?>
                <div id="box-footer">
                    <div id="bf-paypal">
                        <a href="#"><img src="images/icons/paypal.gif" alt="PayPal" /></a>
                    </div>
                    <div id="bf-addthis">
                        <!-- AddThis Button BEGIN -->
                        <a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=250&amp;username=modul"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
                        <script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
                        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=modul"></script>
                        <!-- AddThis Button END -->
                    </div>
                    <div class="clear"></div>
                </div>       
            </div>
            <div id="rightside">
            	<div id="box-basket">
                    <div class="box-silver2">
                        <div class="bs2-inner">
                            <img src="images/texts/your-basket.gif" alt="Your Basket" id="bb-img1" />
                            <div id="bb-empty">Your basket is empty...</div>
                        </div>
                        <div class="bs2-bgr-bottom"></div>
                    </div>
                </div>
                <a href="#"><img src="images/banners/smashin-tracks.gif" alt="SmashinTracks.com" width="192" height="75" id="banner1" /></a>
                <a href="#"><img src="images/banners/bassline-classics.gif" alt="Bassline Classics" width="192" height="123" id="banner2" /></a>
                <a href="#"><img src="images/banners/cj-reign.gif" alt="Cj Reign" width="192" height="123" id="banner3" /></a>
                <a href="#"><img src="images/banners/intensive-recordings.gif" alt="Intensive Recordings" width="192" height="69" id="banner4" /></a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
	<div class="clear"></div>    
    <div id="footer">
        <ul id="footermenu">
            <li class="active"><a href="<?="http://{$_SERVER['SERVER_NAME']}{$sf_request->getRelativeUrlRoot()}/"?>">HOME</a></li>
            <li><a href="#">CHARTS</a></li>
            <li><a href="#">ARTIST</a></li>
            <li><a href="#">TOP ARTIST</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">TERMS &amp; CONDITIONS</a></li>
            <li class="last"><a href="#">CONTACT</a></li>
        </ul>
        <a href="#" id="footerlogo">Smashintracks.com - Tracks you won't find anywhere else</a>
        <div id="footer-copyright">&copy; 2010  <a href="#">Smashintracks.com</a></div>
    </div>
</body>
</html>