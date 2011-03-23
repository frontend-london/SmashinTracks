<? slot('head-after'); ?>
    <!-- Load jQuery build -->
    <script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">

        var charlimit = 500 + 2;
        tinyMCE.init({
            // General options
            mode : "textareas",
            charcount_target_id: "charcount_target_id",
            plugins : "emotions,spellchecker,advhr,insertdatetime,preview,charcount",
            theme : "advanced",
                    theme_advanced_buttons1 : "bold,italic,underline",
                    theme_advanced_buttons2 : ""

        });

function HandleFileButtonClick()
  {
    document.frmUpload.myFile.click();
    document.frmUpload.txtFakeText.value = document.frmUpload.myFile.value;
  }

    </script>
<? end_slot(); ?>

                <div class="box-silver" id="box-myprofile">
                    <div class="bs-inner">
                        <img src="images/texts/my-profile-on-smashintracks.gif" alt="My Profile on SmashinTracks.com" id="bm3-img1" />
                        <div id="bm3-div1">
                            Jesli sprzedajesz tracki na <span class="blue">SmashinTracks.com</span> warto zaktualizowac swoj profil
                            o <span class="blue">informacje o sobie, zdjecie/logo</span> - beda one widoczne przez wszystkich
                            odwiedzajacych twoj profil.
                        </div>
                        <form id="myprofile_form" name="myprofile_form" method="post" action="index.php">
                        <div id="bm3-div2">
                        <div class="bm3-left">Your photo/logo:</div>
                            <div class="bm3-right">
                            	<input type="text" class="input-290px" name="#" id="input_photo1" value="" />
                                <div class="button-add">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <span>Add</span>
                                    <input type="file" class="file_input_hidden" onchange="javascript: document.getElementById('input_photo1').value = this.value"  />
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="bm3-div11">
                        	220 x 220 pixels, max 100kb, JPG or GIF
                        </div>
                        <div id="bm3-div3">
                        	<div class="bm3-left">Profil text:</div>
                            <div class="bm3-right">
                            	<!--<div class="div-textarea-397px">
									<textarea class="textarea-397px" name="#"></textarea>
                                </div>-->
                                <textarea name="#" style="width:100%">Suspendisse ut arcu non nisl dapibus scelerisque. Mauris vestibulum quam a purus mollis blandit. Sed semper, est ut malesuada viverra, neque nisl viverra arcu, quis pulvinar nibh lorem vitae odio. Integer mollis lacus sed urna ornare sed consequat urna feugiat. Cras at pharetra nisl. Vestibulum vel feugiat nisi. Nullam nec ligula ut lectus gravida faucibus ac et metus. Suspendisse et augue nec erat dictum imperdiet. Sed vel lorem mi, sed laoreet libero.  </textarea>
                                <div id="bm3-div3-div1">Pozostało <span id="charcount_target_id"></span> znaków</div>
                            </div>
                            <div class="clear"></div>
                        </div>
						<div id="bm3-div9">
                        	<div class="bm3-left">Add url:</div>
                            <div class="bm3-right">
                            	<input type="text" class="input-290px" name="#" id="input1" value="http://www.youtubte.com/jacksparrowproject" />
                                <div class="button-add">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">ADD</a>
                                </div>



                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bm3-yoururl">
                        	<div class="bm3-left">Your url:</div>
                            <div class="bm3-right">
                            	<div class="bm3-yoururl-title">www.myspace.com/jacksparrowproject</div>
                                <div class="button-edit">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">Edit</a>
                                </div>
                                <div class="button-delete">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">Delete</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="bm3-yoururl">
                        	<div class="bm3-left">Your url:</div>
                            <div class="bm3-right">
                            	<div class="bm3-yoururl-title">www.myspace.com/jacksparrowproject</div>
                                <div class="button-edit">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">Edit</a>
                                </div>
                                <div class="button-delete">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">Delete</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div id="bm3-div4">
                        	Aby zachowac zmiany wpisz swoje haslo i kliknij Save...
                        </div>
                        <div id="bm3-div5">
                        	<div class="bm3-left">Your password:</div>
                            <div class="bm3-right">
                            	<input type="text" class="input-290px" name="#" value="" />
                                <div class="button-save">
                                    <div class="button-left"></div>
                                    <div class="button-right"></div>
                                    <a href="#">SAVE</a>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        </form>
                    </div>
                    <div class="bs-bgr-bottom"></div>
                </div>
                <div class="box-white" id="box-mysettings">
                    <img src="images/texts/main-settings.gif" alt="Main Settings" />
                    <div class="bw-div1">
                        Tutaj mozesz zmienic swoje podstawowe dane takie jak <span class="blue">artist name, e-mail, haslo.</span>
                    </div>
                    <div id="bm4-div1">
						<div class="bm3-left">Artist name:</div>
                        <div class="bm3-right">
                            <input type="text" class="input-290px" name="#" value="Martino B" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="bm4-div2">
						<div class="bm3-left">Your e-mail:</div>
                        <div class="bm3-right">
                            <input type="text" class="input-290px" name="#" value="marti_no@o2.pl" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="bm4-div6">
						<div class="bm3-left">Your password:</div>
                        <div class="bm3-right">
                            <input type="password" class="input-290px" name="#" value="" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="bm4-div3">
						<div class="bm3-left">New password:</div>
                        <div class="bm3-right">
                            <input type="password" class="input-290px" name="#" value="" />
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div id="bm4-div4">
						<div class="bm3-left">Confirm new password:</div>
                        <div class="bm3-right">
                            <input type="password" class="input-290px" name="#" value="" />
                            <div class="button-save">
                                <div class="button-left"></div>
                                <div class="button-right"></div>
                                <a href="#">SAVE</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <?php include_partial('metadata/footer', array('share' => false, 'border' => true)) ?>