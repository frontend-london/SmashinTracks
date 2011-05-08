    <?if(is_object($banner)):?>
        <div id="banner-top">
            <?if($banner->getBannersUrl()!=''):?>
                <a href="<?=$banner->getBannersUrl()?>" target="_blank">
                    <img src="images/banners/<?=$banner->getBannersPath()?>.jpg" alt="" />
                </a>
            <?else:?>
                <img src="images/banners/<?=$banner->getBannersPath()?>.jpg" alt="" />
            <?endif?>
        </div>
    <?endif;?>