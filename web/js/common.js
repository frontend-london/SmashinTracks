var playerObject;

function validateEmail(email) {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   return (reg.test(email) != false);
}

function closeMp3Player() {
    $('div#mp3player').css('height', '1px');
}

function isProfile() {
    if($('#profile-name').text().length || $('#admin-name').text().length) return 1; else return 0;
}

function isAdmin() {
    if($('#admin-name').text().length) return 1; else return 0;
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

function playTrack(element) {
    fp_src=$(".fp_src",element).attr('title');
    fp_ico=$(".fp_ico",element).attr('title');
    fp_artist=$(".fp_artist",element).attr('title');
    fp_address=$(".fp_address",element).attr('title');
    fp_title=$(".fp_title",element).attr('title');
    fp_prize=$(".fp_prize",element).attr('title');
    fp_item_id=$(".fp_item_id",element).attr('title');
    fp_add_wishlist=$(".fp_add_wishlist",element).attr('title');
    fp_remove_wishlist=$(".fp_remove_wishlist",element).attr('title');

    $.get('/ajax/track-played/'+fp_item_id);

    $('div#mp3player').css('height', '102px');
    
    if(isAdmin()) {
        document.getElementById('smashinPlayer').playSample(fp_src,fp_ico,fp_artist,fp_address,fp_add_wishlist,fp_remove_wishlist,fp_title,fp_prize);    
    } else {
        document.getElementById('smashinPlayer').playSample(fp_src,fp_ico,fp_artist,fp_address,fp_add_wishlist,fp_remove_wishlist,fp_title,fp_prize,fp_item_id);    
    }
    
}

function isInBasket(id) {
    var result = 0;
    $.each($('div.bb-item'),function() {
        basket_track_id = $(".fp_item_id",this).attr('title');
        if(basket_track_id==id) {
            result = 1;
            return false;
        }
    });
    return result;
}

function addToBasketById(id) {
    if(playerObject==null) {
        var track;
        track = $('div.tracknum-'+id);
        addToBasket(track);            
    } else {
        addToBasket(playerObject);
    }
    
}

function addToBasket(track) {
    track_player = $('.track-player', track);                    
    track_id = $(".fp_item_id",track).attr('title');

//                    $("div#bb-items").hide();
    $("div.bb-item").css('visibility', 'hidden');
    $("div#bb-splash").show();
    $("div#bb-prize-checkout").show();
    $("div#bb-empty").hide();

    if(!isInBasket(track_id)) {
        if(track_player.html()==null) {
            track.css('visibility', 'hidden');
            track_prize = $(".fp_prize",track).attr('title').substr(1); // substr w celu obciecia waluty
            basket_prize_currency = $("#bb-prize span").text();
            basket_prize = basket_prize_currency.substr(1);
            currency = basket_prize_currency.substr(0,1);
            new_basket_prize = (basket_prize*1+track_prize*1).toFixed(2);
            add_src = $('.fp_address', track).attr('title');
            
            $.get(add_src, function(data) {
            //                  alert(data); // uwaga: zawiesza flasha (w Operze)
            });
            $('#bb-items').prepend(track);
            $('#bb-prize span').text(currency + new_basket_prize);
        } else {
            track_player_inner = track_player.html();
            track_src = $(".fp_src",track_player).attr('title');
            track_artist = $(".fp_artist",track_player).attr('title');
            track_artist_src = $('.track-artist a', track).attr('href');
            track_title = $(".fp_title",track_player).attr('title');
            track_title_src = $('.track-name a', track).attr('href');
            track_prize = $(".fp_prize",track_player).attr('title').substr(1); // substr w celu obciecia waluty
            basket_prize_currency = $("#bb-prize span").text();
            basket_prize = basket_prize_currency.substr(1);
            currency = basket_prize_currency.substr(0,1);
            new_basket_prize = (basket_prize*1+track_prize*1).toFixed(2);
    
            add_src = $('.track-add-basket', track).attr('href'); //$(this).attr('href');
            $.get(add_src, function(data) {
    //                          alert(data);
            });
    
            var new_item = $('<div class="bb-item" style="visibility:hidden;"><a href="/basket/remove/'+track_id+'" class="bbi-usun">UsuĹ„</a><a href="'+track_src+'" class="bbi-icon">'+track_player_inner+'</a><a href="'+track_artist_src+'" class="bbi-artist ajax-centerside">'+track_artist+'</a><a href="'+track_title_src+'" class="bbi-name ajax-centerside">'+track_title+'</a></div>');//.hide();
            $('#bb-items').prepend(new_item);
            $('#bb-prize span').text(currency + new_basket_prize);
    //                        new_item.slideDown('normal');            
        }
    }

    setTimeout(function() {
        $("div.bb-item").css('visibility', 'visible');
        $("div#bb-splash").hide();
//                        $("div#bb-items").show();
    } , 500); // delays x ms    
}

function addToWishlistById(id) {
    var track;
    track = $('div.tracknum-'+id);
    addToWishlist(track);
}

function addToWishlist(track) {
    var track_star = $('.track-star', track);
    var src = track_star.attr('href');
    var id = src.substr(src.lastIndexOf("/")+1);
    if(isProfile()) {
        if(track_star.hasClass('ts-active')) {
            $.get(src, function(data) {
                //alert(data);
            });
            
            $.each($('div.tracknum-'+id+' a.track-star'),function() {
                $(this).attr('href','/members/my-wishlist/add/'+id);
                $(this).removeClass('ts-active');                                
            });
            
        } else {
            $.get(src, function(data) {
                //alert(data);
            });                            
            
            $.each($('div.tracknum-'+id+' a.track-star'),function() {
                $(this).attr('href','/members/my-wishlist/remove/'+id);
                $(this).addClass('ts-active');          
            });
        }
    } else {
        $("div#bm5-container-loginbox").fadeIn(); // okno logowania
    }
}

function activateFaq() {
    $("#bf1-questions").accordion({
            active: 0,
            collapsible: true,
            autoHeight: false,
            header: '.bf1d-title',
            animated: 'easeslide'
    });
}

function resetAddThis(){
 var base_href = $('head base').attr('href');
 var addthis_location = window.location.toString();//'http://www.wp.pl';
 var pos = addthis_location.indexOf('#/');
 addthis_location = addthis_location.substr(pos+2)
 addthis_location = base_href+addthis_location;
 //var addthis_title = document.title.toString().replace("'", "\\'");
 $("#bf-addthis .addthis_button").each(function(){
    //$(this).attr("onMouseOver", "return addthis_open(this, '', '"+addthis_location+"', '"+addthis_title+"');");
    $(this).attr("onMouseOver", "return addthis_open(this, '', '"+addthis_location+"');");
 });
}

function scrollWindow() {
    if($(window).scrollTop() > 300) {
        $("html, body").animate({ scrollTop: 0 }, "slow");                            
    }
}

$(document).ready
(
	function()
	{
            
		$('a').focus(function() {
		  this.blur();
		});
                
                var recentHash = "";
                var recentHashChange = false;
                
                facebook_refresh();
                
                function openAjaxTab(src) {
                    var content = $('#tab-content');
//                    debugger;
                    content.html('');
                    var loader = $('#centerside-ajax-loader').clone().removeAttr('id');
                    content.append(loader);
                    loader.show();
                    
                    if ( src.substr(0,7) == '/admin_') {
                        src = '/' + src.substr(30);
                    }
                    console.log('src', src);
                    
                    var options = { ajax: 'tab' };
                    $.get(src, options, function(data) {
                        loader.hide();
                        content.append(data);
                        scrollWindow();
                        
                        var tabs = [
                            {
                                page: '/genre/',
                                menu_elements: ['bestsellers/', 'best-rated/']
                            },
                            {
                                page: '/charts/',
                                menu_elements: ['last-3-months', 'all-time']
                            },
                            {
                                page: '/artists',
                                menu_elements: ['/all']
                            }
                        ];
                        
                        var menu_elements = [],
                            page;
                        
                        $.each(tabs, function( index, element) {
                            if( src.substr(0, element.page.length) === element.page ) {
                                page = element.page;
                                menu_elements = element.menu_elements;
                                return;
                            }
                        });                        

                        if ( menu_elements.length ) {
                            var $bookmarks = $('#box-top .bookmark');
                            $bookmarks.removeClass('bookmark-active');
                            $bookmarks.prevAll().removeClass('bookmark-nobgr-right');   
                            var active_element,
                                noborder_element;
                        
                            $.each(menu_elements, function(index, element) {
                                if ( src.substr(page.length, element.length) === element ) {
                                    noborder_element = $bookmarks.eq(index);
                                    active_element = $bookmarks.eq(index+1);
                                    return false;
                                }
                            });
                            if ( ! active_element) {
                                active_element = $bookmarks.eq(0);
                            };
                            active_element.addClass('bookmark-active');

                            if ( noborder_element ) {
                                noborder_element.addClass('bookmark-nobgr-right');
                            }
                            
                        };
                    });
                    
                    
                }
                
                function openAjaxCenterside(src) {
                    var content = $('#centerside-inner');
                    content.html('');
                    var loader = $('#centerside-ajax-loader');
                    loader.show();
                    
                    if ( src.substr(0,7) == '/admin_') {
                        src = '/' + src.substr(30);
                    }
                    
                    $.get(src, function(data) {
                        loader.hide();
                        content.html(data);
                        scrollWindow();
                        
                        if(src=='/faq') {
                            activateFaq();
                        } else if(src.substr(0,7)=='/track/') {
                            FB.XFBML.parse(); // facebook like button i komentarze
                        } 
                        
                        resetAddThis();
                        
                    });
                    
                    $('ul#leftmenu li').removeClass('active');
                    $('ul#leftmenu-nopadding li').removeClass('active');
                    $('ul#mainmenu li').removeClass('active');
                    $('ul#submenu li').removeClass('active');
                    $('ul#footermenu li').removeClass('active');
                    $("div#box-basket").show();
                    
                    recentHashChange = true;
                    window.location.hash = src;
                    recentHash = '#'+src;
                    recentHashChange = false;
            
                    if(src.substr(0,7)=='/genre/') {
                        var genre_name = src.substr(7);
                        //alert(genre_name);
                        $('a#genre-'+genre_name).parent().addClass('active');
                    } else if(src.substr(0,9)=='/profile/') {
                        $('a#mainmenu-artists').parent().addClass('active');
                        $('a#footermenu-artists').parent().addClass('active');
                    } else if(src=='/charts') {
                        $('a#mainmenu-charts').parent().addClass('active');
                        $('a#footermenu-charts').parent().addClass('active');
                    } else if(src=='/artists') {
                        $('a#mainmenu-artists').parent().addClass('active');
                        $('a#footermenu-artists').parent().addClass('active');
                    } else if(src=='/faq') {
                        $('a#mainmenu-faq').parent().addClass('active');
                        $('a#footermenu-faq').parent().addClass('active');
                    } else if(src=='/terms-and-conditions') {
                        $('a#footermenu-terms').parent().addClass('active');
                    } else if(src=='/contact') {
                        $('a#footermenu-contact').parent().addClass('active');
                    } else if(src=='/') {
                        $('a#mainmenu-home').parent().addClass('active');
                        $('a#footermenu-home').parent().addClass('active');
                    }        
                    
                }
                
                
                function initialiseStateFromURL() {
                    if (window.location.hash==recentHash) {
                      return; // Nothing's changed since last polled.
                    } else if(recentHashChange) {
                        return; // w trakcie zmiany adresu
                    }
                    
                    recentHash = window.location.hash;
                 
                    // URL has changed, update the UI accordingly.
                    var src = recentHash.substring(2);
                    openAjaxCenterside('/'+src)
                }   
               
                  
                  initialiseStateFromURL();
                  setInterval(initialiseStateFromURL, 1000); // na podstawie http://ajaxpatterns.org/Unique_URLs
                  
                
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

		activateFaq();
                
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
/*
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
*/		
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
/*
		$('a#bw-a2').click(function(event){ // ST-Artists-anim.html - ALL ARTIST 
			event.preventDefault();
			$('div#bw-div12').empty();
		});
*/
		
                $("a.track-player").live('mouseenter', function(event) {
                    $("img", this).attr("src", 'images/icons/player-on.png');
		});

                $("a.track-player").live('mouseleave', function(event) {
                    $("img", this).attr("src", 'images/icons/player-off.png');
		});

                $("a.track-player").live('click', function(event) {
                    event.preventDefault();
                    playerObject = $(this).parent();
                    playTrack(this);
		});

                $("a.bbi-icon").live('click', function(event) {
                    event.preventDefault();
                    playerObject = $(this).parent();
                    playTrack(this);
                });

                $("a.bbi-usun").live('click', function(event) {
                    event.preventDefault();
                    item = $(this).parent();
                    track_prize = $(".fp_prize",item).attr('title').substr(1); // substr w celu obciecia waluty
                    basket_prize_currency = $("#bb-prize span").text();
                    basket_prize = basket_prize_currency.substr(1);
                    currency = basket_prize_currency.substr(0,1);
                    new_basket_prize = (basket_prize*1-track_prize*1).toFixed(2);
                    item.remove();
                    remove_src = $(this).attr('href');
                    $.get(remove_src, function(data) {
//                          alert(data);
                    });

                    $('#bb-prize span').text(currency + new_basket_prize);
                    if(basket_prize == track_prize) {
                        $("div#bb-empty").show();
                        $("div#bb-prize-checkout").hide();
                    }
                    
                });
                
                $("a.track-add-basket").live('click', function(event) {
                    event.preventDefault();
                    var track;
                    track = $(this).parent();
                    addToBasket(track);
		});
                
                $("a.track-star").live('click', function(event) {
                    event.preventDefault();
                    track = $(this).parent().parent();
                    addToWishlist(track);
                });
/*
		$("a#mp-close").click(function(event){
                    event.preventDefault();
                    closeMp3Player();
		});
*/
		//$("a#bs-arrow").click(function(event){
                $("a#bs-arrow").live('click', function(event) {
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
                
                $("a.ajax-tab").live('click', function(event) {
                    event.preventDefault();
                    var src = $(this).attr('href');
                    openAjaxTab(src);
		});
                
                $("a.ajax-centerside").live('click', function(event) {
                    event.preventDefault();
                    var src = $(this).attr('href');
                    openAjaxCenterside(src);
		});
                
                $("a.vt-star").live('click', function(event) {
                    event.preventDefault();
                    element = $(this);
                    if(isProfile()) {
                        vote_src = $(this).attr('href');
                        $.get(vote_src, function(data) {
                            $('div.vt-status span').html(data);
                            $('.vt-text').html('You have voted for this track');
                            $(element).attr('href', '');
                            $(element).addClass('vt-star2');
                            $(element).removeClass('vt-star');                          
                        });                                        
                    } else {
                        $("div#bm5-container-loginbox").fadeIn(); // okno logowania
                    }
                });
                
                $(".vt-star2").live('click', function(event) {
                    event.preventDefault();
                });
                
                
//                alert('kurwa');
                
                $(".track-remove2").live('click', function(event) {
                    event.preventDefault();
                    var href = $(this).attr('href');
                    $( "#dialog-confirm" ).dialog({
                        resizable: false,
                        height:140,
                        modal: true,
                        buttons: {
                          "Delete": function() {
                            window.location = href;
                            $( this ).dialog( "close" );
                          },
                          Cancel: function() {
                            $( this ).dialog( "close" );
                          }
                        }
                    });
                });
              
	}
)
	