                <div class="box-silver" id="box-welcome">
                    <div class="bs-inner">
                        <img src="images/texts/welcome.gif" alt="Welcome" id="bw2-img1" />
                        <?=TextsPeer::getTextValue('Register-welcome-text')?>
                        <div class="button-membershomepage">
                            <div class="button-left"></div>
                            <div class="button-right"></div>
                            <a href="<?=url_for('members')?>">MEMBERS HOMEPAGE</a>
                        </div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>