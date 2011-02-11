
                <div class="box-white" id="box-top">
                    <img src="images/genres/<?=$genres->getGenresPath();?>.gif" alt="<?=$genres->getGenresName();?>" />
                    <div class="bw-div1">                        
                        Here are the latest <span class="blue"><?=$genres->getGenresName();?></span> tracks that have been uploaded through producers on <a href="#" class="underline">Smashintracks.com</a> Check this out!
                    </div>                
                    
                    <div class="bw-tracks">
                        <?foreach ($pager->getResults() as $track):?>
                            <?php include_partial('metadata/record', array('track' => $track)) ?>
                        <?endforeach;?>
                        <div class="clear"></div>
                    </div>
                    <div class="bw-div2">
                        <div class="bw-div2-text">
                            <strong>See also:</strong>
                            <?$counter=0; foreach ($seeAlsoGenres as $seeAlsoGenre):?><?if($counter>0):?>, <?endif;?><a href="<?=url_for('genres', $seeAlsoGenre)?>"><?=$seeAlsoGenre->getGenresName(); ?></a><?$counter++; endforeach;?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_object' => $genres, 'route_name' => 'genres')) ?>
                </div>

                <?php include_partial('metadata/footer') ?>
                          
