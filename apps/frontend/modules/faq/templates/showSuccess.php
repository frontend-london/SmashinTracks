                <div class="box-white" id="box-faq">
                    <img src="images/texts/faq.gif" alt="FAQ" />
                    <div class="bw-div1">
                        <?=TextsPeer::getTextValue('FAQ-main-text')?>
                    </div>
                    <div id="bf1-questions">
                        <?$counter=1; foreach($faq as $question):?>
                            <div class="bf1d-question">
                                <div class="bf1d-title">
                                    <?=$counter?>. <?=$question->getTextsFaqQuestion()?>
                                </div>
                                <div class="bf1d-answer<?if($counter==1):?> bf1d-answer-active<?endif?>">
                                    <?=html_entity_decode($question->getTextsFaqAnswer())?>
                                </div>
                            </div>
                        <?$counter++; endforeach;?>
                    </div>
                </div>

                <?php include_partial('metadata/footer') ?>