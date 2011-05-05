                    <ul id="submenu">
                        <?if($isProfile):?>
                            <?if($isAdmin):?>
                                <li id="submenu-hi">Hi, <strong>Admin</strong></li>
                                <li<?if($sf_request->getParameter('section')=='panel-genres'):?> class="active"<?endif;?>><a href="<?=url_for('panel_genres')?>">DODAJ/EDYTUJ GATUNKI</a></li>
                                <li<?if($sf_request->getParameter('section')=='panel-new-label-settings'):?> class="active"<?endif;?>><a href="<?=url_for('panel_new-label-settings')?>">USTAWIENIA ETYKIETY 'NEW'</a></li>
                                <li<?if($sf_request->getParameter('section')=='panel-transactions-history'):?> class="active"<?endif;?>><a href="<?=url_for('panel_transactions-history')?>">HISTORIA SPRZEDAŻY</a></li>
                                <li><a href="#">TEKSTY</a></li>
                                <li class="last"><a href="#">WYPŁATY</a></li>
                            <?else:?>
                                <li id="submenu-hi">Hi, <a href="<?=url_for('profile', $profile)?>"><strong><?=$profile->getProfilesName()?></strong></a></li>
                                <li<?if($sf_request->getParameter('section')=='members'):?> class="active"<?endif;?>><a href="<?=url_for('members')?>">HOME</a></li>
                                <li<?if($sf_request->getParameter('section')=='my-sales'):?> class="active"<?endif;?>><a href="<?=url_for('members_my-sales')?>">MY SALES</a></li>
                                <li<?if($sf_request->getParameter('section')=='upload-track'):?> class="active"<?endif;?>><a href="<?=url_for('members_upload-track')?>">UPLOAD TRACK</a></li>
                                <li<?if($sf_request->getParameter('section')=='my-tracks'):?> class="active"<?endif;?>><a href="<?=url_for('members_my-tracks')?>">MY TRACKS</a></li>
                                <li<?if($sf_request->getParameter('section')=='my-downloads'):?> class="active"<?endif;?>><a href="<?=url_for('members_my-downloads')?>">MY DOWNLOADS</a></li>
                                <li<?if($sf_request->getParameter('section')=='my-wishlist'):?> class="active"<?endif;?>><a href="<?=url_for('members_my-wishlist')?>">MY WISHLIST</a></li>
                                <li class="last<?if($sf_request->getParameter('section')=='my-profile'):?> active<?endif;?>"><a href="<?=url_for('members_my-profile')?>">MY PROFILE</a></li>
                            <?endif;?>
                            <li class="last right"><a href="<?=url_for('sign-out')?>">SIGN OUT</a></li>
                        <?else:?>
                            <li class="last right<?if($sf_request->getParameter('section')=='register'):?> active<?endif;?>"><a href="<?=url_for('register')?>">Register</a></li>
                            <li class="right<?if($sf_request->getParameter('section')=='login'):?> active<?endif;?>"><a href="<?=url_for('login')?>" id="a-loginbox">Login</a></li>
                        <?endif;?>
                    </ul>