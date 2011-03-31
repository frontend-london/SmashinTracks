                <div class="box-silver" id="box-searchresults">
                    <div class="bs-inner">
                        <img src="images/texts/results-for.gif" alt="Results for:" id="bs-img1" />
                        <div id="bs-div1"><?=$keyword;?></div>
                        <div class="clear"></div>
                        <div id="bs-div3">Sorry, we couldn't find any tracks matching <strong><?=$keyword;?></strong></div>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>

                <?php include_partial('metadata/footer') ?>