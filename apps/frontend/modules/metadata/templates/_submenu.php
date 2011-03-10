                    <ul id="submenu">
                        <?if(is_object($profile)): /*$sf_user->hasCredential('user')):*/?>
                            <li id="submenu-hi">Hi, <strong><?=$profile->getProfilesName()?></strong></li>
                            <li<?if($sf_request->getParameter('section')=='members'):?> class="active"<?endif;?>><a href="<?=url_for('members')?>">HOME</a></li>
                            <li><a href="#">MY SALES</a></li>
                            <li><a href="#">UPLOAD TRACK</a></li>
                            <li><a href="#">MY CATALOG</a></li>
                            <li><a href="#">MY DOWNLOADS</a></li>
                            <li><a href="#">MY WISHLIST</a></li>
                            <li class="last"><a href="#">MY PROFILE</a></li>
                            <li class="last right"><a href="<?=url_for('sign-out')?>">SIGN OUT</a></li>
                        <?else:?>
                            <li class="last right<?if($sf_request->getParameter('section')=='register'):?> active<?endif;?>"><a href="<?=url_for('register')?>">Register</a></li>
                            <li class="right"><a href="#" id="a-loginbox">Login</a></li>
                        <?endif;?>
                    </ul>