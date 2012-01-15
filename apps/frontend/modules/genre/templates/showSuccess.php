
                <div class="box-white" id="box-top">
                    <img src="images/genres/<?=$genres->getGenresPath();?>.gif" alt="<?=$genres->getGenresName();?>" />
                    <div class="bw-div1">                        
                        <?=Smashin::generate_injected_text(TextsPeer::getTextValue('Genre-list-main-text'), array('__GENRESNAME__' => $genres->getGenresName()));?>
                    </div>               
                    
                    <div class="bw-div8">
                    	<div class="bookmark<?if($subsection=='all_tracks'):?> bookmark-active<?elseif($subsection=='bestsellers'):?> bookmark-nobgr-right<?endif;?>">
                        	<a href="<?=url_for('genre', $genres)?>">ALL TRACKS</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                    	<div class="bookmark<?if($subsection=='bestsellers'):?> bookmark-active<?elseif($subsection=='best_rated'):?> bookmark-nobgr-right<?endif;?>">
                        <a href="<?=url_for('genre_bestsellers', $genres)?>">BESTSELLERS</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>

                    	<div class="bookmark<?if($subsection=='best_rated'):?> bookmark-active<?else:?> bookmark-nobgr-right<?endif;?>">
                        <a href="<?=url_for('genre_best-rated', $genres)?>">BEST RATED</a>
                            <div class="bookmark-bgr-left"></div>
                            <div class="bookmark-bgr-right"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="bw-tracks">
                        <?foreach ($pager->getResults() as $track):?>
                            <?php include_component('metadata', 'record', array('track' => $track)) ?>
                        <?endforeach;?>
                        <div class="clear"></div>
                    </div>
                    <div class="bw-div2">
                        <div class="bw-div2-text">
                            <strong>See also:</strong>
                            <?$counter=0; foreach ($seeAlsoGenres as $seeAlsoGenre):?><?if($counter>0):?>, <?endif;?><a class="ajax-centerside" href="<?=url_for('genre', $seeAlsoGenre)?>"><?=$seeAlsoGenre->getGenresName(); ?></a><?$counter++; endforeach;?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php include_partial('metadata/paging', array('pager' => $pager, 'route_object' => $genres, 'route_name' => $route_name)) ?>
                </div>

                <?php include_partial('metadata/footer') ?>