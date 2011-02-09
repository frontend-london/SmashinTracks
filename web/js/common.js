

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
		
		$( "#bf1-questions" ).accordion({ 
			active: 0,
			collapsible: true,
			autoHeight: false,
			header: '.bf1d-title', 
			animated: 'easeslide'
		});		
	}
)
	