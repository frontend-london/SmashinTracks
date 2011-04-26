<ul id="leftmenu<?if($isAdmin):?>-nopadding<?endif;?>">
    <?php foreach ($menuleft as $i => $genre): ?>
        <li class="<?if($genre_path==$genre->getGenresPath()):?>active<?endif;?><?if($genre->countNewActiveTracks()):?> lm-new<?endif;?>"><a href="<?=url_for('genre', $genre)?>"><?php echo $genre->getGenresName() ?> <span class="lm-nr"><?php echo $genre->countTracksGenress() ?></span></a></li>
    <?php endforeach ?>
</ul>
<?if($isAdmin):?>
    <dl id="leftmenu-summary">
        <dt>Tracków:</dt> <dd><?=$tracks_amount?></dd>
        <dt>Artystow:</dt> <dd><?=$profiles_amount?></dd>
    </dl>
    <div class="clear"></div>
<?endif;?>
<!--               

url_for('job/show?id='.$job->getId().'&company='.$job->getCompany().
  '&location='.$job->getLocation().'&position='.$job->getPosition())


<li class="lm-new"><a href="#">2stsssep<span class="lm-nr">12</span></a></li>
<li><a href="#">Bassline House<span class="lm-nr">26</span></a></li>
<li class="lm-new active"><a href="#">Bassline 4x4<span class="lm-nr">4</span></a></li>
-->