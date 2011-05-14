<? slot('head-after'); ?>
    <!-- Load jQuery build -->
    <script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
    tinyMCE.init({
            // General options
            mode : "textareas",
            language : "pl",
            theme : "advanced",
            plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
    
            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect",
            theme_advanced_buttons2 : "fontsizeselect,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,",
            theme_advanced_buttons3 : "image,cleanup,help,code,|,insertdate,inserttime,preview,|,tablecontrols,|,",
            theme_advanced_buttons4 : "forecolor,backcolor,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons5 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
    
            // Example content CSS (should be your site CSS)
            content_css : "/css/style.css",
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
                                <div class="bm3-both">
                                    Profil text:<br />
                                    <textarea name="texts_value" style="width:100%; height: 500px;"><?=$text->getTextsValue();?></textarea>
                                    <input type="hidden" name="texts_name" value="<?=$text->getTextsName();?>" />
                                </div>
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