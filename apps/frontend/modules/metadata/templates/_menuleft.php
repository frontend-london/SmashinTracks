<ul id="leftmenu">
    <?php foreach ($menuleft as $i => $genre): ?>
        <li <?if($genre_path==$genre->getGenresPath()):?>class="active"<?endif;?>><a href="<?=url_for('genres', $genre)?>"><?php echo $genre->getGenresName() ?><span class="lm-nr"><?php echo $genre->countTracksGenress() ?></span></a></li>
    <?php endforeach ?>
</ul>
<!--               

url_for('job/show?id='.$job->getId().'&company='.$job->getCompany().
  '&location='.$job->getLocation().'&position='.$job->getPosition())


<li class="lm-new"><a href="#">2stsssep<span class="lm-nr">12</span></a></li>
<li><a href="#">Bassline House<span class="lm-nr">26</span></a></li>
<li class="lm-new active"><a href="#">Bassline 4x4<span class="lm-nr">4</span></a></li>
-->