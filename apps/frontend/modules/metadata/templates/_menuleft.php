<ul id="leftmenu<?if($isAdmin):?>-nopadding<?endif;?>">
    <?php foreach ($menuleft as $i => $genre): ?>
        <li class="<?if($genre_path==$genre->getGenresPath()):?>active<?endif;?><?if($genre->countNewActiveTracks()):?> lm-new<?endif;?>"><a class="ajax-centerside" id="genre-<?=$genre->getGenresPath();?>" href="<?=url_for('genre', $genre)?>"><?php echo $genre->getGenresName() ?> <span class="lm-nr"><?php echo $genre->countActiveTracks() ?></span></a></li>
    <?php endforeach ?>
</ul>
<?if($isAdmin):?>
    <dl id="leftmenu-summary">
        <dt>Tracków:</dt> <dd><?=$tracks_amount?></dd>
        <dt>Artystow:</dt> <dd><?=$profiles_with_tracks_amount?></dd>
        <dt>Zarejestrowanych:</dt> <dd><?=$profiles_without_tracks_amount?></dd>
        <dt>Wszystkich:</dt> <dd><?=$profiles_amount?></dd>
    </dl>
    <div class="clear"></div>
<?endif;?>