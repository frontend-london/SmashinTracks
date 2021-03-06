<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
        <base href="<?="http://{$_SERVER['SERVER_NAME']}{$sf_request->getRelativeUrlRoot()}/"?>" />
        <? include_slot('head-before'); ?>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="favicon.ico" />
        <meta property="og:site_name" content="SmashinTracks.com" />
        <? if(!include_slot('head-facebook')): ?>
            <meta property="og:image" content="http://<?=$_SERVER['SERVER_NAME'].$sf_request->getRelativeUrlRoot()?>/images/icons/smashin-tracks.gif" />
            <meta property="og:title" content="SmashinTracks.com" />
            <meta property="og:description" content="SmashinTracks.com - Tracks you won't find anywhere else" />
        <? endif;?>
        <meta property="fb:admins" content="100002401987361"/> 
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <?php include_component('metadata', 'flashplayer') ?>
        <? include_slot('head-after'); ?>
</head>
<body>
    <div id="all">
        <div id="mp3player">
            <div id="mp3player-inner">
                <div id="noFlash">
                    <font>To properly display the page you need Flash Player version 10.0 or higher.</font><br/>
                    <a href="http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" target="_self"><font class="link">you can download it HERE.</font></a>
                </div>
            </div>
        </div>
	<div id="wrap">
            <div id="wrap-inner">
                <div id="header">
                    <a class="ajax-centerside" href="<?=url_for('homepage')?>" id="logo">SmashinTracks.com - Tracks you won't find anywhere else</a>
                    <? include_component('metadata', 'bannertop'); ?>
                    <? include_component('metadata', 'mainmenu'); ?>
                    <div id="search-top">
                        <form name="form_search" action="<?=url_for('search');?>" method="get">
                            <input type="text" id="st-text" name="k" value="<? if($sf_request->getParameter('section')=='search') echo $sf_request->getParameter('k')?>" />
                            <input type="submit" class="input-submit" />
                            <a href="javascript: document.form_search.submit();" id="st-submit">Search</a>
                        </form>
                    </div>
                    <? include_component('metadata', 'submenu'); ?>
                </div>
                <div id="leftside">
                    <?php include_component('metadata', 'menuleft') ?>
                </div>
                <div id="centerside<?if($sf_request->getParameter('facebookss')):?>-fb<?endif;?>">
                    <div id="centerside-ajax-loader" class="centerside-ajax-loader"></div>
                    <div id="fb-root"></div>
                    <div id="centerside-inner">
                        <?php echo $sf_content ?>
                    </div>
                </div>
                <div id="rightside">
                    <?php include_component('metadata', 'basketsales') ?>
                    <?php include_component('metadata', 'bannersside') ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div id="footer">
            <ul id="footermenu">
                <li<?if($sf_request->getParameter('section')=='home'):?> class="active"<?endif;?>><a class="ajax-centerside" id="footermenu-home" href="<?="http://{$_SERVER['SERVER_NAME']}{$sf_request->getRelativeUrlRoot()}/"?>">HOME</a></li>
                <li<?if($sf_request->getParameter('section')=='charts'):?> class="active"<?endif;?>><a class="ajax-centerside" id="footermenu-charts" href="<?=url_for('charts')?>">CHARTS</a></li>
                <li<?if($sf_request->getParameter('section')=='artists'):?> class="active"<?endif;?>><a class="ajax-centerside" id="footermenu-artists" href="<?=url_for('artists')?>">ARTISTS</a></li>
                <li<?if($sf_request->getParameter('section')=='faq'):?> class="active"<?endif;?>><a class="ajax-centerside" id="footermenu-faq" href="<?=url_for('faq')?>">FAQ</a></li>
                <li<?if($sf_request->getParameter('section')=='terms'):?> class="active"<?endif;?>><a class="ajax-centerside" id="footermenu-terms" href="<?=url_for('terms')?>">TERMS &amp; CONDITIONS</a></li>
                <li class="<?if($sf_request->getParameter('section')=='contact'):?>active <?endif;?>"><a class="ajax-centerside" id="footermenu-contact" href="<?=url_for('contact')?>">CONTACT</a></li>
                <li class="last"><a href="http://blog.smashintracks.com" target="_blank">BLOG</a></li>
            </ul>
            <a href="#" id="footerlogo">Smashintracks.com - Tracks you won't find anywhere else</a>
            <div id="footer-copyright">&copy; 2011  <a href="#">Smashintracks.com</a></div>
        </div>
    </div>
    <? if(has_slot('box-message')) include_slot('box-message'); else include_component('metadata', 'loginbox');  ?>
</body>
</html>