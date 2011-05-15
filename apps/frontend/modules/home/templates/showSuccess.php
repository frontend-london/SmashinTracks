            <div id="mainpage-fb-padding">
                <div id="mainpage-top">
                    <?=TextsPeer::getTextValue('Home-niezalogowany-welcome-text')?>
                </div>
                <div class="box-silver" id="box-recommends">
                    <div class="bs-inner">
                        <img src="images/texts/recommends-10-smashin-tracks.gif" alt="Recommends 10 Smashin Tracks" id="br-img1" />
                        <div id="br-div1"><?=TextsPeer::getTextValue('Home-niezalogowany-recommends-10-smashin-trac')?></div>
                        <div id="br-tracks">

                            <?$counter=0; $hidden_recom = false; foreach ($recommended as $recom):?>
                                <?if($counter==5): $hidden_recom = true;?>
                                    <div id="br-hidden">
                                <?endif;?>
                                <?php include_component('metadata', 'record', array('track' => $recom->getTracks())) ?>
                            <?$counter++; endforeach;?>
                            <?if($hidden_recom):?>
                                </div>
                            <?endif;?>
                            
                            <div class="clear"></div>
                            
                        </div>
                        <a href="#" class="arrow-bottom-big" id="bs-arrow"></a>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>
                <div class="box-white">
                    <img src="images/texts/new-tracks.gif" alt="New Tracks" />
                    <div class="bw-div1">
                        <?=TextsPeer::getTextValue('Home-niezalogowany-new-tracks')?>
                    </div>                
                    
                        <div class="bw-tracks">

                            <?$counter=0; foreach ($newtracks as $track):?>
                                <?php include_component('metadata', 'record', array('track' => $track)) ?>
                            <?$counter++; endforeach;?>
                            
                            <div class="clear"></div>
                            
                        </div>                
                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>New tracks in:</strong>
                                <?$counter=0; foreach($newtracks_genres as $genre):?><?if($counter>0):?>, <?endif;?><a class="ajax-centerside" href="<?=url_for('genre', $genre)?>"><?echo $genre->getGenresName();?></a><?$counter++; endforeach;?>
                            </div>
                            <div class="button-fulllist bw-div2-button">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a class="ajax-centerside" href="<?=url_for('new-tracks')?>">Full List</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                </div>  
                
                <div class="box-white">
                    <img src="images/texts/bestsellers-tracks.gif" alt="Bestsellers Tracks" />
                    <div class="bw-div1">
                        <?=TextsPeer::getTextValue('Home-niezalogowany-bestsellers-tracks')?>
                    </div>                
                    
                        <div class="bw-tracks">

                            <?$counter=0; foreach ($bestsellerstracks as $track):?>
                                <?php include_component('metadata', 'record', array('track' => $track)) ?>
                            <?$counter++; endforeach;?>
                            
                            <div class="clear"></div>
                            
                        </div>                
                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>See also:</strong> <a class="ajax-centerside" href="<?=url_for('artists')?>">TOP ARTISTS</a>, <a class="ajax-centerside" href="<?=url_for('new-tracks')?>">NEW TRACKS</a>
                            </div>
                            <div class="button-fulllist bw-div2-button">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a class="ajax-centerside" href="<?=url_for('charts')?>">Full List</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                </div>

                <?php include_partial('metadata/footer', array('facebook' => true)) ?>

            </div>