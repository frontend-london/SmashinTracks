function validateEmail(email) {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   return (reg.test(email) != false);
}

function closeMp3Player() {
    $('div#mp3player').css('height', '1px');
}

function loginBoxClose(reset, box) {
    $("a#a-loginbox-close").click(function(event){
        event.preventDefault();
        $("div#lb-div10").css("display", "none");
        $("div#lb-inner input").removeClass("input-err");
        $("div#bm5-container-loginbox").fadeOut(400, function() {
            if(reset) {
                $('#lb-divs').html(box);
                loginBoxPassword();
                loginBoxClose(false, '');
            }
        });
    });

    $("a#a-forget-password-submit").click(function(event){
        event.preventDefault();
        $('#form_forget_password').submit();
    });




    function showRequestForgetPassword(formData, jqForm, options) {
            emailToVal = $("#forget_password_email").val();
            err = false;

            if(emailToVal == '' || !validateEmail(emailToVal)) {
                $("#lb-div12").fadeIn();
                err = true;
            } else {
                $("#lb-div12").fadeOut();
            }

            return !err;
    }

    function showResponseForgetPassword(responseText, statusText, xhr, $form)  {
        if(responseText=='ERROR') {
            $("#lb-div12").fadeOut();
            $("#lb-div12").html('Email address not found please try again.');
            $("#lb-div12").fadeIn();
        } else {
            $('#lb-divs').hide();
            $('#lb-divs').html(responseText);
            $('#lb-divs').fadeIn('slow');
            loginBoxClose(true, loginBoxSnapshot); // snapshot zachowany przez loginBoxPassword()
        }
    }

     var options = {
        beforeSubmit:  showRequestForgetPassword,  // pre-submit callback
        success:       showResponseForgetPassword  // post-submit callback
    };

    $('#form_forget_password').ajaxForm(options);

}
var loginBoxSnapshot = '';
function loginBoxPassword() {
    $("a#a-forget-password").click(function(event){
        event.preventDefault();
        loginBoxSnapshot = $('#lb-divs').html();
        $("div#bm5-container-loginbox").fadeIn();
        $('#lb-divs').html('<div id="lb-div13"><img src="images/icons/loader.gif" alt="LOADING.." /></div>')
        $.get('ajax/forget-password', function(data) {
            $('#lb-divs').hide();
            $('#lb-divs').html(data);
            $('#lb-divs').fadeIn('slow');
            loginBoxClose(true, loginBoxSnapshot);
        });
    });
}

$(window).load (
	function() {

		if($('div#secure a')) {
			$.each	(
				$('div#secure a'),
				function() {
					ad = "europe";
					res = "anaccent";
					start = "mai" ;
					hash = "#";
					colon = ":";
					qqq = String.fromCharCode(64);
					$(this).text(ad + res + qqq + "ym" + "ail.c" +"om");
					$(this).attr('href', start + "lto" + colon + ad + res + qqq + "ym" + "ail.c" +"om");
				}
			);
		};
		
		if($('a[rel*=hover] img')) {
			$.each	(
				$('a[rel*=hover] img'),
				function() {
					var originalImage = this.src;
					var hoverImage = this.src.replace('original', 'hover');
					var image = new Image ();
					image.src = hoverImage;
					$(this).mouseover (
					 	function() {
							this.src = hoverImage;
						}
					);
					
					$(this).mouseout (
					 	function() {
							this.src = originalImage;
						}
					);
				}
			);
		}
		
		if($('input.inputBlur')) {
			$.each	(
				$('input.inputBlur'),
				function() {
					var elementValue = $(this).get(0);
					var originalElementValue = elementValue.value;				
					$(this).focus 	(
					 	function() {
							if(elementValue.value == originalElementValue)
							{
								elementValue.value = '';
							}
						}
					);
					
					$(this).blur (
					 	function() {
							if(elementValue.value == '') {
								elementValue.value = originalElementValue;
							}
						}
					);
				}
			);
		}

		$("div#product-images-th a").click(function(event){
			event.preventDefault();
			//alt = $(this).children().attr('alt');
			src = $(this).children().attr('src');
			src1 = src.replace('_m', '');
                        src2 = src.replace('_m', '_b');
			
			//$("div#rightimage img").hide();
			$("div#product-imagebig img").attr('src', src1);
                        $("div#product-imagebig a").attr('href', src2);
			//$("div#rightimage img").show();
			//$("p#gallery-p1 span").html(alt);
		});
		
		
		$("div.category-box").mouseenter(function(event){
			$(this).addClass('cb-shadow');
                        $("div.category-box-inner", this).addClass('cbi-shadow');
			$("img", this).slideUp('slow');
			$("ul", this).show('slow');
		});		
		
		$("div.category-box").mouseleave(function(event){
			$("ul", this).hide('slow');			
			$("img", this).slideDown('slow');
                        $("div.category-box-inner", this).removeClass('cbi-shadow');
			$(this).removeClass('cb-shadow');
		});		
		
		$("div.bookmark").mouseenter(function(event){
			$(this).prev().addClass('bookmark-nobgr-right');
		});				
		
		$("div.bookmark").mouseleave(function(event){
			if(!$(this).hasClass('bookmark-active')) $(this).prev().removeClass('bookmark-nobgr-right');
		});		
		
		if($('select#bu-select-genre1').length!=0) {		
			createSelectDropDown('bu-select-genre1');
			createSelectDropDown('bu-select-genre2');
			createSelectDropDown('bu-select-genre3');
			hideUnusedSelectDropDowns();			
		}

		$('a#bw-a2').click(function(event){ /* ST-Artists-anim.html - ALL ARTIST */
			event.preventDefault();
			$('div#bw-div12').empty();
		});

		$("a.track-player").mouseenter(function(event){
                    $("img", this).attr("src", 'images/icons/player-on.png');
		});

		$("a.track-player").mouseleave(function(event){
                    $("img", this).attr("src", 'images/icons/player-off.png');
		});

		$("a.track-player").click(function(event){
                    event.preventDefault();

                    
                    fp_src=$(".fp_src",this).attr('title');
                    fp_ico=$(".fp_ico",this).attr('title');
                    fp_artist=$(".fp_artist",this).attr('title');
                    fp_address=$(".fp_address",this).attr('title');
                    fp_title=$(".fp_title",this).attr('title');
                    fp_prize=$(".fp_prize",this).attr('title');
                    fp_item_id=$(".fp_item_id",this).attr('title');
                    fp_add_wishlist=$(".fp_add_wishlist",this).attr('title');
                    fp_remove_wishlist=$(".fp_remove_wishlist",this).attr('title');

                    $.get('/ajax/track-played/'+fp_item_id);

                    $('div#mp3player').css('height', '102px');

                     //$('div#mp3player').show(1, function() {});
                        document.getElementById('smashinPlayer').playSample(fp_src,fp_ico,fp_artist,fp_address,fp_add_wishlist,fp_remove_wishlist,fp_title,fp_prize);
                        
                      
                    
		});

		$("a#mp-close").click(function(event){
                    event.preventDefault();
                    closeMp3Player();
		});

		$("a#bs-arrow").click(function(event){
                    event.preventDefault();
                    $("div#br-hidden").slideToggle();
                    $(this).toggleClass('arrow-bottom-big');
                    $(this).toggleClass('arrow-top-big');
		});

		$("a#bm5-a-close").click(function(event){
                    event.preventDefault();
                    $("div#bm5-container").fadeOut();
		});

		$("a#bm5-a1-close").click(function(event){
                    //event.preventDefault();
                    //$("div#bm5-container").css("display", "none");
		});

		$("a#a-loginbox").click(function(event){
                    event.preventDefault();
                    $("div#bm5-container-loginbox").fadeIn();
		});

                loginBoxClose(false, '');

		$("a#a-loginbox-tmp-submit").click(function(event){
                    event.preventDefault();
                    $("div#tmp-text").fadeIn();//css("display", "block");
		});

		$("a.a-mydownloads-info").click(function(event){
                    event.preventDefault();
                    $(this).parent().parent().next().toggle();
		});

                $("a.a-transactiontrack-info").click(function(event){
                    event.preventDefault();
                    $(this).parent().parent().parent().next().toggle();
		});

		$("a#a-url-add-submit").click(function(event){
                    event.preventDefault();
                    $('input#profile_profiles_url_add_action').val(1);
                    $('#form_myprofile').submit();
		});
                
		$("a#a-banners-top-edit-submit").click(function(event){
                    event.preventDefault();
                    $('input#banners_top_edit_action').val(1);
                    $('#form_banners_top').submit();
		});

		$("a#a-banners-side-edit-submit").click(function(event){
                    event.preventDefault();
                    $('input#banners_side_edit_action').val(1);
                    $('#form_banners_side').submit();
		});

		$("a#a-url-edit-submit").click(function(event){
                    event.preventDefault();
                    id = $(this).attr('rel');
                    $('input#profile_profiles_url_edit_id').val(id);
                    $('input#profile_profiles_url_edit_action').val(1);
                    $('#form_myprofile').submit();
		});

                loginBoxPassword();

		$("a#a-upload-track-submit").click(function(event){
                    event.preventDefault();
                    $("div#bm5-container2").fadeIn(400, function() {
                        $('#form_upload_track').submit();
                    });
		});

	}
);

$(document).ready
(
	function()
	{
		$('a').focus(function() {
		  this.blur();
		});

		$("#bf1-questions").accordion({
			active: 0,
			collapsible: true,
			autoHeight: false,
			header: '.bf1d-title',
			animated: 'easeslide'
		});
	}
)
	