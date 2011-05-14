    <?foreach($banners as $banner):?>
        <div class="banner-side">
            <?if($banner->getBannersUrl()!=''):?>
                <a href="<?=$banner->getBannersUrl()?>">
                    <img src="images/banners/<?=$banner->getBannersPath()?>.jpg" alt="" />
                </a>
            <?else:?>
                <img src="images/banners/<?=$banner->getBannersPath()?>.jpg" alt="" />
            <?endif?>            
        </div>
    <?endforeach;?>