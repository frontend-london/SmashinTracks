                <div class="box-silver" id="box-dodajgatunek">
                    <div class="bs-inner">
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
                        	<div class="bm3-left">Dodaj/edytuj gatunek:</div>
                            <div class="bm3-right">
                            	<input type="text" class="input-349px" name="#" value="" />
                            </div>
                            <div class="clear"></div>
                        </div>
						<div id="bd-div5">
							<div class="bm3-left">Dodaj nagłówek:</div>
                            <div class="bm3-right">
                            	<input type="text" class="input-290px" name="#" value="" />
                                <div class="button-add">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">ADD</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="bd-div7">
                                Max wysokość obrazka 20px, szerokość dowolna
                        </div>
                        <div id="bd-div6">
                            <div class="button-ok">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">OK</a>
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

                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>