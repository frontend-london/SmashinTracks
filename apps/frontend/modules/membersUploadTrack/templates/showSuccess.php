                <div class="box-silver" id="box-uploadtrack">
                    <div class="bs-inner">
                        <form action="<?php echo url_for('members_upload-track') ?>" method="POST" id="form_upload_track" name="form_upload_track" enctype="multipart/form-data">
                            <img src="images/texts/upload-track.gif" alt="Upload Track" id="bu-img1" />
                            <div id="bu-div1">
                                <?=Smashin::generate_injected_text(TextsPeer::getTextValue('ZALOGOWANY-Upload-Track-main-text'), array('__LIMIT__' => sfConfig::get('app_max_upload_day_limit')))?>
                            </div>
                            <div id="bu-div2">
                                <div class="bm3-left"><?php echo $form['tracks_title']->renderLabel('Tytul tracka:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['tracks_title']->render(array('class' => 'input-399px'.(($form['tracks_title']->hasError())?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['tracks_title']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['tracks_title']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bu-div3">
                                <div class="bm3-left"><?php echo $form['tracks_artist']->renderLabel('Artysta/alias:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['tracks_artist']->render(array('class' => 'input-399px'.(($form['tracks_artist']->hasError())?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['tracks_artist']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['tracks_artist']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bu-div4">
                                <div class="bm3-left"><?php echo $form['tracks_preview']->renderLabel('Track preview:') ?></div>
                                <div class="bm3-right">
                                    <input type="text" class="input-290px<?if($form['tracks_preview']->hasError()):?> input-err<?endif?>" id="input_track_preview" value="" />
                                    <div class="button-add">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <span>Add</span>
                                        <?php echo $form['tracks_preview']->render(array('class' => 'file_input_hidden', 'onchange' => "javascript: document.getElementById('input_track_preview').value = this.value")) ?>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="bu-div5">
                                Maxymalnie 120 sekund w jakosci 128kbps! (max <?=sfConfig::get('app_maxsize_track_preview')/1048576?> MB)
                            </div>
                            <?php if ($form['tracks_preview']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['tracks_preview']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bu-div6">
                                <div class="bm3-left underline"><?php echo $form['full_track']->renderLabel('Full track:') ?></div>
                                <div class="bm3-right">
                                    <input type="text" class="input-290px<?if($form['full_track']->hasError()):?> input-err<?endif?>" id="input_full_track" value="" />
                                    <div class="button-add">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <span>Add</span>
                                        <?php echo $form['full_track']->render(array('class' => 'file_input_hidden', 'onchange' => "javascript: document.getElementById('input_full_track').value = this.value")) ?>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="bu-div7">
                                Akceptujemy tylko mp3 w formacie 320kbps (max <?=sfConfig::get('app_maxsize_full_track')/1048576?> MB)
                            </div>
                            <?php if ($form['full_track']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['full_track']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bu-div13">
                                <div class="bm3-left"><?php echo $form['tracks_time_regex']->renderLabel('Time:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['tracks_time_regex']->render(array('class' => 'input-79px'.(($form['tracks_time_regex']->hasError())?' input-err':''))) ?>
                                    <span>example 5:25</span>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['tracks_time_regex']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['tracks_time_regex']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bu-div8">
                                <div class="bm3-left"><?php echo $form['genre_1']->renderLabel('Genre 1:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['genre_1']->render(array('id' => 'bu-select-genre1', 'class' => ($form['genre_1']->hasError())?' select-err':'')) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['genre_1']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['genre_1']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bu-div9">
                                <div class="bm3-left"><?php echo $form['genre_2']->renderLabel('Genre 2:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['genre_2']->render(array('id' => 'bu-select-genre2', 'class' => ($form['genre_2']->hasError())?' select-err':'')) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['genre_2']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['genre_2']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bu-div10">
                                <div class="bm3-left"><?php echo $form['genre_3']->renderLabel('Genre 3:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['genre_3']->render(array('id' => 'bu-select-genre3', 'class' => ($form['genre_3']->hasError())?' select-err':'')) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['genre_3']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['genre_3']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bu-div11">
                                <label>
                                    <?php echo $form['terms']->render() ?>
                                    <span>
                                        <?php echo $form['terms']->renderLabel('To use this website and any other services offered bySmashinTracks.com you must agree to the following terms and conditions...<br />
                                        Artists must not upload any copyright protected material for which they do not have permission to use and distribute.<br />
                                        If an artist uploads any copyright protected material they will be banned from using SmashinTracks.com and all uploaded material will be permanently deleted.<br />
                                        All artist are responsable for there own music.') ?>
                                    </span>
                                </label>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['terms']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['terms']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bu-div12">
                                <?php echo $form->renderHiddenFields() ?>
                                <div class="button-upload">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#" id="a-upload-track-submit">UPLOAD TRACK</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false)) ?>

                <?if($upload_track_complete):?>
                    <? slot('box-message'); ?>
                        <div id="bm5-container">
                            <div class="box-message">
                                <div class="bm5-outer">
                                    <div class="bm5-inner">
                                        <img src="images/texts/upload-completed.gif" alt="Upload Completed" class="bm5-img1" />
                                        <div class="bm5-div1">
                                            <?=TextsPeer::getTextValue('ZALOGOWANY-Upload-Track-sukces')?>
                                        </div>
                                        <div class="button-ok">
                                            <div class="button-left"></div>
                                            <div class="button-right"></div>
                                            <a href="#" id="bm5-a-close">OK</a>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="bm5-bgr-top"></div>
                                <div class="bm5-bgr-bottom"></div>
                            </div>
                        </div>
                    <? end_slot(); ?>
                <?elseif($upload_track_limit):?>
                    <div id="bm5-container">
                        <div class="box-message">
                            <div class="bm5-outer">
                                <div class="bm5-inner">
                                    <img src="images/texts/sorry.gif" alt="Sorry" class="bm5-img1" />
                                    <div class="bm5-div1">
                                        <?=Smashin::generate_injected_text(TextsPeer::getTextValue('ZALOGOWANY-Upload-Track-limit'), array('__LIMIT__' => sfConfig::get('app_max_upload_day_limit')))?>
                                    </div>
                                    <div class="button-close">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <a href="<?=url_for('members')?>" id="bm5-a1-close">CLOSE</a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="bm5-bgr-top"></div>
                            <div class="bm5-bgr-bottom"></div>
                        </div>
                    </div>
                <?endif;?>

                <div id="bm5-container2" style="display:none;">
                    <div class="box-message">
                        <div class="bm5-outer">
                            <div class="bm5-inner">
                                <img src="images/texts/wait-a-moment.gif" alt="Wait a moment" class="bm5-img1" />
                                <div class="bm5-div1">
                                    <div class="bm5-div3">
                                        <img src="images/icons/loader.gif" alt="" />
                                    </div>
                                </div>
                                <div class="button-silver-cancel">
                                    <div class="button-silver-left"></div>
                                    <div class="button-silver-right"></div>
                                    <a href="<?=url_for('members_upload-track')?>">CANCEL</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="bm5-bgr-top"></div>
                        <div class="bm5-bgr-bottom"></div>
                    </div>
                </div>
