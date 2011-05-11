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
                        <form action="<?php echo url_for('panel_texts') ?>" method="POST" id="form_edit_text" name="form_edit_text" >
                            <img src="images/texts/edycja-tekstow.gif" alt="Edycja Tekstów" id="be3-img1" />
                            <div id="be3-div1">
                                <strong>Edytujesz: <span class="blue uppercase"><?=$text->getTextsName();?></span></strong>
                                <?if($text->getTextsHelp()!=''):?>
                                    <br /><br /><strong>Pomoc: <?=$text->getTextsHelp();?></strong>
                                <?endif;?>
                            </div>
                            <div id="be3-div2">
                                <div class="bm3-left">Profil text:</div>
                                <div class="bm3-right">
                                    <textarea name="texts_value" style="width:100%"><?=$text->getTextsValue();?></textarea>
                                    <input type="hidden" name="texts_name" value="<?=$text->getTextsName();?>" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div id="be3-div3">
                                <div class="button-silver-back">
                                    <div class="button-silver-left"></div>
                                    <div class="button-silver-right"></div>
                                    <a href="<?=url_for('panel_texts')?>">BACK</a>
                                </div>
                                <div class="button-save">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="javascript: document.form_edit_text.submit();">SAVE</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>