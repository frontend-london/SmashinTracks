                    <ul id="mainmenu">
                        <?if($isAdmin):?>
                            <li<?if($sf_request->getParameter('section')=='panel-home'):?> class="active"<?endif;?>><a href="<?=url_for('panel_home')?>">Home</a></li>
                            <li><a href="#">Rekomendacje</a></li>
                            <li><a href="#">Artyści</a></li>
                            <li><a href="#">Banery</a></li>
                            <li><a href="#">Mailing</a></li>
                        <?else:?>
                            <li<?if($sf_request->getParameter('section')=='home'):?> class="active"<?endif;?>><a href="<?=url_for('homepage')?>">Home</a></li>
                            <li<?if($sf_request->getParameter('section')=='charts'):?> class="active"<?endif;?>><a href="<?=url_for('charts')?>">Charts</a></li>
                            <li<?if($sf_request->getParameter('section')=='artists'):?> class="active"<?endif;?>><a href="<?=url_for('artists')?>">Artists</a></li>
                            <li<?if($sf_request->getParameter('section')=='faq'):?> class="active"<?endif;?>><a href="<?=url_for('faq')?>">Faq</a></li>
                        <?endif;?>
                    </ul>