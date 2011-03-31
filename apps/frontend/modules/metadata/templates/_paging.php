<?
    if(!isset($border)) $border = false;
    if(!isset($noborder)) $noborder = false;
    if(!isset($path)) $path = '';
    if(!isset($route_object)) $route_object = null;
?>
                    <?php if ($pager->haveToPaginate()): ?>
                        <div class="bw-div3" <?if($border):?>id="bw-div3-border"<?elseif($noborder):?>id="bw-div3-noborder"<?endif;?>>
                            <div class="bw-div3-inner">
                                <ul>
                                   <?
                                        $pages = array();
                                        $pages_show = array(true,true,true,true,true,true);
                                        for($i=$pager->getPage()-2;$i<=$pager->getPage()+2;$i++) {
                                            if($i==1) { $pages_show[0] = false;
                                            } elseif($i==2) { $pages_show[1] = false;
                                            } elseif($i==3) { $pages_show[2] = false; }
                                            if($i==$pager->getLastPage()-2) { $pages_show[3] = false;
                                            } elseif($i==$pager->getLastPage()-1) { $pages_show[4] = false;
                                            } elseif($i==$pager->getLastPage()) { $pages_show[5] = false; }
                                            if(($i>=1) && ($i<=$pager->getLastPage())) { $pages[] = $i; }
                                        }
                                   ?>
                                    <?if(!$pager->isFirstPage()):?>
                                        <li class="button-back" id="bw-back">
                                            <div class="button-left"></div>
                                            <div class="button-right"></div>
                                            <a href="<?php echo Smashin::generate_url_for($route_name, $route_object) ?>?page=<?=$pager->getPreviousPage().$path?>">BACK</a>
                                        </li>
                                    <?endif;?>
                                    <?if($pages_show[0]):?>
                                        <li><a href="<?php echo Smashin::generate_url_for($route_name, $route_object) ?>?page=1<?=$path?>">1</a></li>
                                    <?endif;?>
                                    <?if($pages_show[1]):?>
                                        <li><a href="<?php echo Smashin::generate_url_for($route_name, $route_object) ?>?page=2<?=$path?>">2</a></li>
                                    <?endif;?>
                                    <?if($pages_show[2]):?>
                                        <li><span class="bw-ellipsis">...</span></li>
                                    <?endif;?>



                                    <?php foreach ($pages as $page): ?>
                                        <li><a<?if($page==$pager->getPage()):?> class="active"<?endif;?> href="<?php echo Smashin::generate_url_for($route_name, $route_object) ?>?page=<?=$page.$path?>"><?=$page?></a></li>
                                    <?php endforeach; ?>



                                    <?if($pages_show[3]):?>
                                        <li><span class="bw-ellipsis">...</span></li>
                                    <?endif;?>
                                    <?if($pages_show[4]):?>
                                        <li><a href="<?php echo Smashin::generate_url_for($route_name, $route_object) ?>?page=<?=($pager->getLastPage()-1).$path?>"><?=$pager->getLastPage()-1?></a></li>
                                    <?endif;?>
                                    <?if($pages_show[5]):?>
                                        <li><a href="<?php echo Smashin::generate_url_for($route_name, $route_object) ?>?page=<?=$pager->getLastPage().$path?>"><?=$pager->getLastPage()?></a></li>
                                    <?endif;?>
                                    <?if(!$pager->isLastPage()):?>
                                        <li class="button-next" id="bw-next">
                                            <div class="button-left"></div>
                                            <div class="button-right"></div>
                                            <a href="<?php echo Smashin::generate_url_for($route_name, $route_object) ?>?page=<?=$pager->getNextPage().$path?>">NEXT</a>
                                        </li>
                                    <?endif;?>
                                </ul>
                        	</div>
                        </div>
                    <?php endif; ?>