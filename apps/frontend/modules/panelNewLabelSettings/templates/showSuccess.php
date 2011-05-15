                <div class="box-silver" id="box-ustawienianew">
                    <div class="bs-inner">
                        <img src="images/texts/ustawienia-new.gif" alt="Ustawienia etykiety NEW" id="bu2-img1" />
                        <div id="bu2-div1">
                            Tutaj mozesz edytowac ustawienia czasu dzialania dla <span class="blue">etykiety NEW.</span>
                        </div>
                        <form action="<?=url_for('panel_new-label-settings')?>" method="post" id="form_new_label_settings" name="form_new_label_settings">
                            <div id="bu2-div2">
                                <div class="bm3-left">Wybierz czas trwania:</div>
                                <div class="bm3-right">
                                    <select name="period" id="bu-select-genre1">
                                        <option<?if($period==30):?> selected="selected"<?endif?> value="30">1 miesiąc</option>
                                        <option<?if($period==14):?> selected="selected"<?endif?> value="14">2 tygodnie</option>
                                        <option<?if($period==7):?> selected="selected"<?endif?> value="7">1 tydzień</option>
                                        <option<?if($period==3):?> selected="selected"<?endif?> value="3">3 dni</option>
                                        <option<?if($period==1):?> selected="selected"<?endif?> value="1">1 dzień</option>
                                    </select>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="bu2-div3">
                                <input type="submit" class="input-submit" />
                                <div class="button-zapisz">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.form_new_label_settings.submit()">ZAPISZ</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>