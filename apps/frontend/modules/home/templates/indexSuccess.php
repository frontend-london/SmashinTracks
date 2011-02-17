
                <div id="mainpage-top">
                    <h1><span class="blue">Smashintracks.com</span> specialise in unique and unsigned music producers.</h1><br />
                    <p><strong>Featuring Music you will not find anywhere else!</strong></p><br />
                    <p>Downloading is simple, Register below then just add any number of tracks to your cart and pay securely using <strong>Paypal</strong>.</p><br />
                    <p><strong>All mp3s are 'dj friendly' 320 Kbps Bitrate unless otherwise stated.</strong></p><br />
                    <p>For any general enquiries, or if you are interested in selling your music at <a href="#" class="underline">Smashintracks.com</a> please register in the members section below</p><br />
                    <p>ONLY BIG TUNE'S WILL BE FOR SALE ON THIS SITE!!!</p>
                </div>
                <div class="box-silver" id="box-recommends">
                    <div class="bs-inner">
                        <img src="images/texts/recommends-10-smashin-tracks.gif" alt="Recommends 10 Smashin Tracks" id="br-img1" />
                        <div id="br-div1">Here's a hand picked selection of smashing tracks personally recommended by <a href="#" class="underline">Smashintracks.com</a> in this week.</div>
                        <div id="br-tracks">

                            <?$counter=0; $hidden_recom = false; foreach ($recommended as $recom):?>
                                <?if($counter==5): $hidden_recom = true;?>
                                    <div id="br-hidden">
                                <?endif;?>
                                <?php include_partial('metadata/record', array('track' => $recom->getTracks())) ?>
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
                        Here are the latest <span class="blue">10 tunes</span> on <a href="#" class="underline">Smashintracks.com</a><br />
                        Click the button 'FULL LIST' if you want see list of new tracks from latest months.
                    </div>                
                    
                        <div class="bw-tracks">

                            <?$counter=0; foreach ($newtracks as $track):?>
                                <?php include_partial('metadata/record', array('track' => $track)) ?>
                            <?$counter++; endforeach;?>
                            
                            <div class="clear"></div>
                            
                        </div>                
                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>New tracks in:</strong>  <a href="#">BASSLINE HOUSE</a>, <a href="#">ORGAN</a>, <a href="#">ELECTROLINE</a>, <a href="#">HARDCORE BREAKS</a>
                            </div>
                            <div class="button-fulllist bw-div2-button">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">Full List</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                </div>  
                
                <div class="box-white">
                    <img src="images/texts/bestsellers-tracks.gif" alt="Bestsellers Tracks" />
                    <div class="bw-div1">
                        Here are <span class="blue">10 most popular tracks</span> on <a href="#" class="underline">Smashintracks.com</a> from latest week.<br />
                        Click the button 'FULL LIST' if you want see lists of new more charts.
                    </div>                
                    
                        <div class="bw-tracks">

                            <?$counter=0; foreach ($bestsellerstracks as $track):?>
                                <?php include_partial('metadata/record', array('track' => $track)) ?>
                            <?$counter++; endforeach;?>
                            
                            <div class="clear"></div>
                            
                        </div>                
                        <div class="bw-div2">
                            <div class="bw-div2-text">
                                <strong>See also:</strong>  <a href="#">CHARTS</a>, <a href="#">TOP ARTISTS</a>, <a href="#">OUR RECOMENNDS TRACKS</a>, <a href="#">NEW TRACKS</a>
                            </div>
                            <div class="button-fulllist bw-div2-button">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">Full List</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                </div>              
                <div id="box-footer">
                    <div id="bf-paypal">
                        <a href="#"><img src="images/icons/paypal.gif" alt="PayPal" /></a>
                    </div>

                    <div class="clear"></div>
                </div>       
            