                <div class="box-silver" id="box-dodajgatunek">
                    <div class="bs-inner">
                        <form action="" method="POST" id="form_genres" name="form_genres" enctype="multipart/form-data">
                            <img src="images/texts/dodaj-gatunek.gif" alt="Dodaj Gatunek" id="bd-img1" />
                            <div id="bd-div1">
                                Tutaj mozesz dodac nowy gatunek lub edytowac <span class="blue">nazwe juz istniejacego.</span><br />
                                                            Kolejnosc wyswietlania jest alfabetyczna czyli od A do Z.
                            </div>
                            <?if($panel_genres_alert):?>
                                <div class="div-error-message">
                                    Nie można usunąć nie pustego gatunku
                                </div>
                            <?endif;?>
                            <div id="bd-div2">
                                <?if($genre_obj):?>
                                    <img src="images/genres/<?=$genre_obj->getGenresPath()?>.gif" alt="<?=$genre_obj->getGenresName()?>" id="bd-div2-img1" />
                                <?endif;?>
                                <div class="bm3-left"><?php echo $form['genres_name']->renderLabel('Dodaj/edytuj gatunek:') ?></div>
                                <div class="bm3-right">
                                    <?php echo $form['genres_name']->render(array('class' => 'input-349px'.($form['genres_name']->hasError()?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['genres_name']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['genres_name']->renderError() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bd-div5">
                                <div class="bm3-left"><?php echo $form['genres_photo']->renderLabel('Dodaj nagłówek:') ?></div>
                                <div class="bm3-right">
                                    <input type="text" class="input-290px" value="" id="input_photo1" />
                                    <div class="button-add">
                                        <div class="button-left"></div>
                                        <div class="button-right"></div>
                                        <span>Add</span>
                                        <?php echo $form['genres_photo']->render(array('class' => 'file_input_hidden', 'onchange' => "javascript: document.getElementById('input_photo1').value = this.value")) ?>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="bd-div7">
                                Max wysokość obrazka 20px, szerokość dowolna
                            </div>
                            <?php if ($form['genres_photo']->hasError() || $form->hasGlobalErrors()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['genres_photo']->renderError() ?>
                                    <?php echo $form->renderGlobalErrors() ?>
                                </div>
                            <?php endif; ?>
                            <div id="bd-div6">
                                <?php echo $form->renderHiddenFields() ?>
                                <input type="submit" class="input-submit" />
                                <div class="button-ok">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.form_genres.submit();">OK</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="bd-div3">
                                    <div class="bd-div3-box">
                                    <ul>
                                        <?php foreach ($genres_first as $genre): ?>
                                            <li>
                                                <span><?=$genre->getGenresName()?></span>
                                                <a href="<?=url_for('panel_genres_delete', $genre)?>" class="track-bin2"></a>
                                                <a href="<?=url_for('panel_genres_edit', $genre)?>" class="track-edit">EDIT</a>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <div class="bd-div3-box" id="bd-div3-box-right">
                                    <ul>
                                        <?php foreach ($genres_second as $genre): ?>
                                            <li>
                                                <span><?=$genre->getGenresName()?></span>
                                                <a href="<?=url_for('panel_genres_delete', $genre)?>" class="track-bin2"></a>
                                                <a href="<?=url_for('panel_genres_edit', $genre)?>" class="track-edit">EDIT</a>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>