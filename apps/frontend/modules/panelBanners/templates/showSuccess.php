                <div class="box-silver" id="box-banery">
                    <div class="bs-inner">
                        <img src="images/texts/banery.gif" alt="Banery" id="bb2-img1" />
                        <div id="bb2-div1">
                            Tutaj masz panel zarzadzania banerami wyswietlanymi na <a href="#" class="underline">Smashintracks.com</a><br />
                            Mozesz dodawac nowe banery, edytowac ich urle, ustalac kolejnosc etc.
                        </div>
                        <div id="bb2-div2">
                        	<div class="bm3-left">Baner górny 460x70 :</div>
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
                        <!--<div class="bb2-gorny-image">
                        	<input type="checkbox" name="#" value="" checked="checked" class="bb2-checkbox" />
							<a href="#" class="track-bin2"></a>
                            <img src="images/banners/blank-460-70-silver.gif" alt="" class="bb2-banner-top" />
                        </div>
                        <div class="bb2-gorny-adres-new">
                        	<div class="bm3-left">Adres:</div>
                            <div class="bm3-right">
                            	<input type="text" class="input-290px" name="#" value="http://www.smashintracks.com" />
                                <div class="button-ok">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">OK</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>-->
                        <?foreach ($banners_top as $banner):?>
                                <?if(0) $banner = new Banners();?>
                            <div class="bb2-gorny-image">
                                <input type="checkbox" name="#" value="" class="bb2-checkbox"<?if($banner->getBannersActive()):?> checked="checked"<?endif;?> />
                                <a href="<?=url_for('panel_banners_delete', $banner)?>" class="track-bin2"></a>
                                <img src="images/banners/<?=$banner->getBannersPath()?>.gif" alt="" class="bb2-banner-top" />
                            </div>
                            <div class="bb2-gorny-adres">
                                <div class="bm3-left">Adres:</div>
                                <div class="bm3-right">
                                    <span><?=$banner->getBannersUrl()?></span>
                                    <a href="#" class="track-edit">EDIT</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <?endforeach;?>
                        
                        
                        <div id="bb2-div5">
                            <div class="button-save">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">SAVE</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="bb2-div6">
                        	<div class="bm3-left">Baner boczny 192x123 :</div>
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



                        <!--<div class="bb2-boczny-image">
                        	<input type="checkbox" name="#" value="" checked="checked" class="bb2-checkbox" />
                            <a href="#" class="arrow-bottom"></a>
							<a href="#" class="track-bin2"></a>
                            <img src="images/banners/1.gif" alt="" class="bb2-banner-right" />
                        </div>
                        <div class="bb2-gorny-adres-new">
                        	<div class="bm3-left">Adres:</div>
                            <div class="bm3-right">
                            	<input type="text" class="input-290px" name="#" value="http://www.smashintracks.com/martinob" />
                                <div class="button-ok">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">OK</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>-->

                        <?$counter = 0; foreach($banners_side as $banner):?>
                            <?
                                if($counter!=0) $banners_prev_id = $banners_side[$counter-1]->getBannersId(); else $banners_prev_id = null;
                                if($counter!=(count($banners_side)-1)) $banners_next_id = $banners_side[$counter+1]->getBannersId(); else $banners_next_id = null;
                            ?>
                            <div class="bb2-boczny-image">
                                <input type="checkbox" name="#" value="" class="bb2-checkbox"<?if($banner->getBannersActive()):?> checked="checked"<?endif;?> />
                                <?if($banners_prev_id):?>
                                    <a href="<?=url_for('panel_banners_order', array('banners_id' => $banner->getBannersId(), 'second_banners_id' => $banners_prev_id))?>" class="arrow-top"></a>
                                <?endif;?>
                                <?if($banners_next_id):?>
                                    <a href="<?=url_for('panel_banners_order', array('banners_id' => $banner->getBannersId(), 'second_banners_id' => $banners_next_id))?>" class="arrow-bottom<?if(!$banners_prev_id):?> arrow-bottom-first<?endif;?>"></a>
                                <?endif;?>
                                <a href="<?=url_for('panel_banners_delete', $banner)?>" class="track-bin2"></a>
                                <img src="images/banners/<?=$banner->getBannersPath()?>.gif" alt="" class="bb2-banner-right" />
                            </div>
                            <div class="bb2-gorny-adres">
                                <div class="bm3-left">Adres: </div>
                                <div class="bm3-right">
                                    <span><?=$banner->getBannersUrl()?></span>
                                    <a href="#" class="track-edit">EDIT</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <?$counter++; endforeach;?>

                        <div id="bb2-div7">
                            <div class="button-save">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">SAVE</a>
                            </div>
                            <div class="clear"></div>
                        </div>
					</div>
                    <div class="bs-bgr-bottom"></div>
                </div>