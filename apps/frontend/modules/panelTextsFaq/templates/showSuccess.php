<? slot('head-after'); ?>
    <!-- Load jQuery build -->
    <script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
    tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
                    theme_advanced_buttons1 : "bold,italic,underline,|,link,unlink,|,forecolor,backcolor,|,formatselect,fontsizeselect",
                    theme_advanced_buttons2 : ""

    });
    </script>
<? end_slot(); ?>
                <div class="box-silver" id="box-edycjatekstow2">
                    <div class="bs-inner">
                        <form action="<?if($active_text):?><?=url_for('panel_texts_faq_edit', $active_text)?><?else:?><?=url_for('panel_texts_faq')?><?endif?>" method="POST" id="form_textsfaq" name="form_textsfaq" enctype="multipart/form-data">
                            <img src="images/texts/edycja-faq.gif" alt="Edycja FAQ" id="be3-img1" />
                            <div id="be3-div1">
                                    <strong>Tutaj zedytujesz tresc sekcji FAQ, dodasz nowe zapytania oraz odpowiedzi na nie, wyedytujesz istniejace, ustawisz kolejnosc pytan lub skasujesz zbedne.</strong>
                            </div>
                            <div id="be3-div4">
                                <div class="bm3-left"><?=$form['texts_faq_question']->renderLabel('Pytanie:') ?></div>
                                <div class="bm3-right">
                                    <?=$form['texts_faq_question']->render(array('class' => 'input-399px'.($form['texts_faq_question']->hasError()?' input-err':''))) ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form['texts_faq_question']->hasError()): ?>
                                    <div class="div-error-message">
                                        <?php echo $form['texts_faq_question']->renderError() ?>
                                    </div>
                            <?php endif; ?>
                            <div id="be3-div5">
                                <div class="bm3-left"><?=$form['texts_faq_answer']->renderLabel('Odpowiedź:') ?></div>
                                <div class="bm3-right">
                                    <?=$form['texts_faq_answer']->render() ?>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <?php if ($form->hasGlobalErrors() || $form['texts_faq_answer']->hasError()): ?>
                                <div class="div-error-message">
                                    <?php echo $form['texts_faq_answer']->renderError() ?>
                                    <?php echo $form->renderGlobalErrors() ?>
                                </div>
                            <?php endif; ?>
                            <?$counter = 0; foreach($texts as $text):?>
                            <?if(0) $text = new TextsFaq();?>
                                <?
                                    if($counter!=0) $text_prev_id = $texts[$counter-1]->getTextsFaqId(); else $text_prev_id = null;
                                    if($counter!=(count($texts)-1)) $text_next_id = $texts[$counter+1]->getTextsFaqId(); else $text_next_id = null;
                                ?>
                                <div class="be3-question">
                                    <?if($text_prev_id):?>
                                        <a href="<?=url_for('panel_texts_faq_order', array('texts_faq_id' => $text->getTextsFaqId(), 'second_texts_faq_id' => $text_prev_id))?>" class="arrow-top"></a>
                                    <?endif;?>
                                    <?if($text_next_id):?>
                                        <a href="<?=url_for('panel_texts_faq_order', array('texts_faq_id' => $text->getTextsFaqId(), 'second_texts_faq_id' => $text_next_id))?>" class="arrow-bottom"></a>
                                    <?endif;?>
                                    <a href="<?=url_for('panel_texts_faq_delete', $text)?>" class="track-bin2"></a>
                                    <div class="be3q-title"><?=$text->getTextsFaqQuestion()?></div>
                                    <div class="be3q-content"><?=html_entity_decode($text->getTextsFaqAnswer());?></div>
                                    <a href="<?=url_for('panel_texts_faq_edit', $text)?>" class="track-edit">EDIT</a>
                                    <div class="clear"></div>
                                </div>
                            <?$counter++; endforeach;?>

                            <div id="be3-div6">
                                <?php echo $form->renderHiddenFields() ?>
                                <div class="button-silver-back">
                                    <div class="button-silver-left"></div>
                                    <div class="button-silver-right"></div>
                                    <a href="<?=url_for('panel_texts')?>">BACK</a>
                                </div>
                                <div class="button-save">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.form_textsfaq.submit();">SAVE</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>