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


    </script>
<? end_slot(); ?>



            <div id="centerside">
                <div class="box-silver" id="box-myprofile">
                    <div class="bs-inner">
                        <form action="<?php echo url_for('panel_edit-artist', $profile) ?>" method="POST" id="form_myprofile" name="form_myprofile" enctype="multipart/form-data">
                            <img src="images/texts/edycja-profilu.gif" alt="Edycja Profilu" id="bm3-img1" />
                            <div id="bm3-div1">
                                Tutaj zedytujesz informacje usera, zmienić/usunąć avatar, zablokować profil lub też go usunąć.
                            </div>


                            <div id="bm3-div2">
                                <div class="bm3-left"><?php echo $form['profiles_name']->renderLabel('Artist name:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['profiles_name']->render(array('class' => 'input-290px'.($form['profiles_name']->hasError()?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['profiles_name']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_name']->renderError() ?>
                                </div>
                            <?php endif; ?>

                            <div id="bm3-div7">
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
                                    220 x 220 pixels, max 100kb, JPG or GIF or PNG
                            </div>
                            <?php if ($form['profiles_photo']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_photo']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <?if($profile->getProfilesPhoto()):?>
                                <div id="bm3-div6">
                                    <img src="images/profiles/big/<?=$profile->getProfilesPath();?>.jpg" alt="<?=$profile->getProfilesName();?>" width="121" height="121" />
                                    <label>
                                        <?php echo $form['profiles_photo_delete']->render() ?>
                                        <span><?php echo $form['profiles_photo_delete']->renderLabel('Zaznacz aby usunac <br />aktualne foto') ?></span>
                                    </label>
                                    <div class="clear"></div>
                                </div>
                            <?endif;?>
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

                            <div id="bm3-div5">
                                <div class="bm3-left"><?php echo $form['profiles_email']->renderLabel('E-mail:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['profiles_email']->render(array('class' => 'input-290px'.($form['profiles_email']->hasError()?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['profiles_email']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_email']->renderError() ?>
                                </div>
                            <?php endif; ?>

                            <div id="bm3-div9">
                                <div class="bm3-left">Add url:</div>
                                <div class="bm3-right">
                                    <?php
                                        $options = array('class' => 'input-290px'.(($form['profiles_url_add']->hasError())?' input-err':''));
                                        if($added_url) $options = array_merge($options, array('value' => ''));
                                        echo $form['profiles_url_add']->render($options);
                                    ?>
                                    <div class="button-add">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <a href="#" id="a-url-add-submit">ADD</a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['profiles_url_add']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['profiles_url_add']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <?foreach($profile->getProfilesUrlss() as $url):?>
                                <div class="bm3-yoururl">
                                    <div class="bm3-left">Your url: </div>
                                    <?if(($url->getProfilesUrlsId()==$url_edit_id)):?>
                                        <div class="bm3-right">
                                            <div class="bm3-yoururl-title-input">
                                                <?php
                                                    $options = array('class' => 'input-290px'.(($form['profiles_url_edit']->hasError())?' input-err':''));
                                                    if(!$form['profiles_url_edit']->hasError()) $options = array_merge($options, array('value' => $url->getProfilesUrlsUrl()));
                                                    echo $form['profiles_url_edit']->render($options);
                                                ?>
                                                <div class="button-ok">
                                                    <div class="button-left"></div>
                                                    <div class="button-right"></div>
                                                    <a href="#" id="a-url-edit-submit" rel="<?=$url_edit_id?>">Ok</a>
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
                                                <a href="<?=url_for('members_my-profile_url_delete',$url)?>">Delete</a>
                                            </div>
                                        </div>
                                    <?endif;?>
                                    <div class="clear"></div>
                                </div>
                                <?php if (($url->getProfilesUrlsId()==$url_edit_id) && $form['profiles_url_edit']->hasError()): ?>
                                    <div class="div-error-message">
                                        <?php echo $form['profiles_url_edit']->renderError() ?>
                                    </div>
                                <?php endif; ?>
                            <?endforeach;?>

                            <div id="bm3-div8">
                                <?php echo $form->renderHiddenFields() ?>
                                <div class="button-red-delete" id="bm3-div8-div1">
                                    <div class="button-red-left"></div>
                                    <div class="button-red-right"></div>
                                    <a href="#">DELETE PROFILE</a>
                                </div>

                                <div class="button-blokuj" id="bm3-div8-div2">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">BLOKUJ</a>
                                </div>

                                <div class="button-save" id="bm3-div8-div3">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.form_myprofile.submit();">SAVE</a>
                                </div>
                                <div class="clear"></div>
                            </div>


                            <?php if ($form->hasGlobalErrors()): ?>
                                <div class="div-error-message" id="by2-div5">
                                    <?php echo $form->renderGlobalErrors() ?>
                                </div>
                            <?php endif; ?>


                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

            </div>