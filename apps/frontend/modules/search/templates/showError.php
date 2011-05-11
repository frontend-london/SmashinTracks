                <div class="box-silver" id="box-searchresults">
                    <div class="bs-inner">
                        <img src="images/texts/results-for.gif" alt="Results for:" id="bs-img1" />
                        <div id="bs-div1"><?=$keyword;?></div>
                        <div class="clear"></div>
                        <div id="bs-div3"><?=Smashin::generate_injected_text(TextsPeer::getTextValue('Search-No-Results'), array('__KEYWORD__' => $keyword))?></div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer') ?>