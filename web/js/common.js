function closeMp3Player() {
    $('div#mp3player').css("display", "none");
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
                    fp_add_wishlist=$(".fp_add_wishlist",this).attr('title');
                    fp_remove_wishlist=$(".fp_remove_wishlist",this).attr('title');
                    

                     $('div#mp3player').show(1, function() {
                        document.getElementById('smashinPlayer').playSample(fp_src,fp_ico,fp_artist,fp_address,fp_add_wishlist,fp_remove_wishlist,fp_title,fp_prize);
                      });
                    
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
                    $("div#bm5-container").css("display", "none");
		});

		$("a#a-loginbox").click(function(event){
                    event.preventDefault();
                    $("a#a-loginbox").parent().addClass("active");
                    $("div#bm5-container-loginbox").fadeIn();
		});

		$("a#a-loginbox-close").click(function(event){
                    event.preventDefault();
                    //$("div#bm5-container-hidden").css("display", "none");
                    $("a#a-loginbox").parent().removeClass("active");
                    $("div#lb-div10").css("display", "none");
                    $("div#lb-inner input").removeClass("input-err");
                    $("div#bm5-container-loginbox").fadeOut();
                    $("div#tmp-text").css("display", "none");
		});

		$("a#a-loginbox-tmp-submit").click(function(event){
                    event.preventDefault();
                    $("div#tmp-text").fadeIn();//css("display", "block");
		});

		$("a.a-mydownloads-info").click(function(event){
                    event.preventDefault();
                    $(this).parent().parent().next().toggle();
		});

		$("a#a-url-add-submit").click(function(event){
                    event.preventDefault();
                    //$(this).parent().parent().next().toggle();
                    $('input#profile_profiles_url_add_action').val(1);
                    $('#form_myprofile').submit();
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

//		$("a.fancybox").fancybox();
		
	
		/*$('.bf1d-question .bf1d-title').click(function() {
			//$(this).next().toggle();
			$(this).next().slideToggle('slow');
			return false;
		}).next().hide()	*/

		//$( ".bf1d-question" ).accordion( "option", "animated", 'bounceslide',  "option", "header", 'h3'  );

                //alert(screen.height);

		$("#bf1-questions").accordion({ 
			active: 0,
			collapsible: true,
			autoHeight: false,
			header: '.bf1d-title', 
			animated: 'easeslide'
		});		
	}
)
	