<? slot('head-after'); ?>
    <!-- Load jQuery build -->
    <script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">

        var charlimit = 500 + 2;
        tinyMCE.init({
            // General options
            mode : "textareas",
            charcount_target_id: "charcount_target_id",
            plugins : "emotions,spellchecker,advhr,insertdatetime,preview,charcount",
            theme : "advanced",
                    theme_advanced_buttons1 : "bold,italic,underline",
                    theme_advanced_buttons2 : ""

        });

function HandleFileButtonClick()
  {
    document.frmUpload.myFile.click();
    document.frmUpload.txtFakeText.value = document.frmUpload.myFile.value;
  }

    </script>
<? end_slot(); ?>

                <div class="box-silver" id="box-myprofile">
                    <div class="bs-inner">
                        <form action="<?php echo url_for('members_my-profile') ?>" method="POST" id="form_myprofile" name="form_myprofile" enctype="multipart/form-data">
                            <img src="images/texts/my-profile-on-smashintracks.gif" alt="My Profile on SmashinTracks.com" id="bm3-img1" />
                            <div id="bm3-div1">
                                Jesli sprzedajesz tracki na <span class="blue">SmashinTracks.com</span> warto zaktualizowac swoj profil
                                o <span class="blue">informacje o sobie, zdjecie/logo</span> - beda one widoczne przez wszystkich
                                odwiedzajacych twoj profil.
                            </div>
                            <div id="bm3-div2">
                            <div class="bm3-left"><?php echo $form['profiles_photo']->renderLabel('Your photo/logo:') ?></div>
                                <div class="bm3-right">
                                    <input type="text" class="input-290px" id="input_photo1" value="" />
                                    <div class="button-add">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <span>Add</span>
                                        <?php echo $form['profiles_photo']->render(array('class' => 'file_input_hidden', 'onchange' => "javascript: document.getElementById('input_photo1').value = this.value")) ?>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="bm3-div11">
                                    220 x 220 pixels, max 100kb, JPG or GIF
                            </div>
                            <?php if ($form['profiles_photo']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_photo']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bm3-div3">
                                <div class="bm3-left"><?php echo $form['profiles_text']->renderLabel('Profil text:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['profiles_text']->render() ?>
                                    <div id="bm3-div3-div1">Pozostało <span id="charcount_target_id"></span> znaków</div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['profiles_text']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_text']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bm3-div9">
                                <div class="bm3-left">Add url:</div>
                                <div class="bm3-right">
                                    <input type="text" class="input-290px" name="#" id="input1" value="" />
                                    <div class="button-add">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <a href="#">ADD</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?foreach($profile->getProfilesUrlss() as $url):?>
                                <div class="bm3-yoururl">
                                    <div class="bm3-left">Your url: </div>
                                    <?if($url->getProfilesUrlsId()==$url_edit_id):?>
                                        <div class="bm3-right">
                                            <div class="bm3-yoururl-title-input">
                                                <input type="text" class="input-290px" name="#" value="" />
                                                <div class="button-ok">
                                                    <div class="button-left"></div>
                                                    <div class="button-right"></div>
                                                    <a href="#">Ok</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?else:?>
                                        <div class="bm3-right">
                                            <div class="bm3-yoururl-title"><?=$url->getProfilesUrlsUrl();?></div>
                                            <div class="button-edit">
                                                <div class="button-left"></div>
                                                <div class="button-right"></div>
                                                <a href="<?=url_for('members_my-profile_url_edit',$url)?>">Edit</a>
                                            </div>
                                            <div class="button-delete">
                                                <div class="button-left"></div>
                                                <div class="button-right"></div>
                                                <a href="<?=url_for('members_my-profile_url_edit',$url)?>">Delete</a>
                                            </div>
                                        </div>
                                    <?endif;?>
                                    <div class="clear"></div>
                                </div>
                            <?endforeach;?>
                            <div id="bm3-div4">
                                    Aby zachowac zmiany wpisz swoje haslo i kliknij Save...
                            </div>
                            <div id="bm3-div5">
                                <div class="bm3-left"><?php echo $form['profiles_password']->renderLabel('Your password:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['profiles_password']->render(array('class' => 'input-290px'.(($form['profiles_password']->hasError())?' input-err':''))) ?>
                                    <?php echo $form->renderHiddenFields() ?>
                                    <div class="button-save">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <a href="javascript: document.form_myprofile.submit();">SAVE</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form->hasGlobalErrors()): ?>
                                <div class="div-error-message" id="by2-div5">
                                    <?php echo $form['profiles_password']->renderError() ?>
                                    <?php echo $form->renderGlobalErrors() ?>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>
                <div class="box-white" id="box-mysettings">
                    <img src="images/texts/main-settings.gif" alt="Main Settings" />
                    <div class="bw-div1">
                        Tutaj mozesz zmienic swoje podstawowe dane takie jak <span class="blue">artist name, e-mail, haslo.</span>
                    </div>
                    <div id="bm4-div1">
                        <div class="bm3-left">Artist name:</div>
                        <div class="bm3-right">
                            <input type="text" class="input-290px" name="#" value="Martino B" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="bm4-div2">
						<div class="bm3-left">Your e-mail:</div>
                        <div class="bm3-right">
                            <input type="text" class="input-290px" name="#" value="marti_no@o2.pl" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="bm4-div6">
						<div class="bm3-left">Your password:</div>
                        <div class="bm3-right">
                            <input type="password" class="input-290px" name="#" value="" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="bm4-div3">
						<div class="bm3-left">New password:</div>
                        <div class="bm3-right">
                            <input type="password" class="input-290px" name="#" value="" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="bm4-div4">
						<div class="bm3-left">Confirm new password:</div>
                        <div class="bm3-right">
                            <input type="password" class="input-290px" name="#" value="" />
                            <div class="button-save">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">SAVE</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false, 'border' => true)) ?>