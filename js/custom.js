/*--------------------------------FONT STYLER STARTS--------------------------------*/
jQuery.noConflict()(function($){
$(document).ready(function() {
	$('#body-font').bind('change', function() {
		var font = $(this).val();
		 $('p, a ,#main_navigation').css('fontFamily', font);
		 
	});
	});
	});

jQuery.noConflict()(function($){
$(document).ready(function() {
	$('#headings-font').bind('change', function() {
		var font = $(this).val();
		 $(':header, :header a').css('fontFamily', font);
		 
	});
	});
	});
	
/*-----------------------------------------FONT STYLER ENDS--------------------------------*/
jQuery.noConflict()(function($){	
jQuery("#slider-small").slides({
		preload: true,
		effect: 'fade',
		fadeSpeed: 550,
		play: 3000
		
		});
	});
/*-----------------SLIDES WITH CAPTION---------------*/
jQuery.noConflict()(function($){	
	$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:0
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
		});
/***************************************************
					TABIFY 
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() {	
		
			$(document).ready(function () {
				$('#menu').tabify();
				
				
			});
					

	});
		});

/***************************************************
		FORM VALIDATION JAVASCRIPT
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() {
	$('form#contact-form').submit(function() {
		$('form#contact-form .error').remove();
		var hasError = false;
		$('.requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
            	var labelText = $(this).prev('label').text();
            	$(this).parent().append('<div class="error">You forgot to enter your '+labelText+'</div>');
            	$(this).addClass('inputError');
            	hasError = true;
            } else if($(this).hasClass('email')) {
            	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            	if(!emailReg.test(jQuery.trim($(this).val()))) {
            		var labelText = $(this).prev('label').text();
            		$(this).parent().append('<div class="error">You entered an invalid '+labelText+'</div>');
            		$(this).addClass('inputError');
            		hasError = true;
            	}
            }
		});
		if(!hasError) {
			$('form#contact-form input.submit').fadeOut('normal', function() {
				$(this).parent().append('');
			});
			var formInput = $(this).serialize();
			$.post($(this).attr('action'),formInput, function(data){
				$('form#contact-form').slideUp("fast", function() {
					$(this).before('<div class="simple-success">Your email was successfully sent. We will contact you as soon as possible.</div>');
				});
			});
		}

		return false;

	});
});
});

/***************************************************
		CYCLE SLIDER
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() {
    $('#details').cycle({
		fx:     'fade', 
        prev:    '#prev',
        next:    '#next',
		speedIn:  800, 
		speedOut: 800, 
		delay:   7000
       
	});
	
	});
});

/***************************************************
	  ADDITIONAL CODE FOR FILTER NAVIGATION
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function($){
	$('ul#filterable a').click(function() {
		$(this).css('outline','none');
		$('ul#filterable .current').removeClass('current');
		$(this).parent().addClass('current');
	
		return false;
	});
});
});

/***************************************************
	GRID PORTFOLIO/GRID HOMEPAGE  IMAGE HOVER
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() {
	
		$(".item-hover").hover(function(){
		$(this).find(".portfolio-thumbnail").stop(true, true).animate({ opacity: 'show' }, 800);
	}, function() {
		$(this).find(".portfolio-thumbnail").stop(true, true).animate({ opacity: 'hide' }, 800);		
	});
		
	});
	});

/***************************************************
		PORTFOLIO IMAGE HOVER
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() {  
            $('.portfolio-img').each(function() {
                $(this).hover(
                    function() {
                        $(this).stop().animate({ opacity: 0.5 }, 400);
                    },
                   function() {
                       $(this).stop().animate({ opacity: 1.0 }, 400);
                   })
                });
});
});
jQuery.noConflict()(function($){
$(document).ready(function() {  
            $('.portfolio-img-fancy').each(function() {
                $(this).hover(
                    function() {
                        $(this).stop().animate({ opacity: 0.7 }, 400);
                    },
                   function() {
                       $(this).stop().animate({ opacity: 1.0 }, 400);
                   })
                });
});
});
/***************************************************
		TWITTER FEEDS
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() { 
$(".tweet").tweet({
            username: "trendywebstar",
            join_text: null,
            avatar_size: null,
            count: 1,
            auto_join_text_default: "we said,", 
            auto_join_text_ed: "we",
            auto_join_text_ing: "we were",
            auto_join_text_reply: "we replied to",
            auto_join_text_url: "we were checking out",
            loading_text: "loading tweets..."
    });
	});
});
/***************************************************
		Nivo Slider
***************************************************/
jQuery.noConflict()(function($){
	jQuery(document).ready(function($){
	$(window).load(function() {
        $('#slider-nivo').nivoSlider();
    });
});
});
/***************************************************
		CYCLE SLIDE
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() {
    $('#slider-two-third').cycle({
		fx:'fade',
		speedIn:  1000, 
		speedOut: 1000, 
		delay:   2000
		
	});
});
});

/***************************************************
		PRETTY PHOTO
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() {  

$("a[rel^='prettyPhoto']").prettyPhoto({opacity:0.80,default_width:500,default_height:344,theme:'light_rounded',hideflash:false,modal:false});

});
});

/***************************************************
		MAIN NAVIGATION JQURY
***************************************************/
/*********************
//* jQuery Multi Level CSS Menu #2- By Dynamic Drive: http://www.dynamicdrive.com/
//* Last update: Nov 7th, 08': Limit # of queued animations to minmize animation stuttering
//* Menu avaiable at DD CSS Library: http://www.dynamicdrive.com/style/
*********************/

var arrowimages={down:['', ''], right:['', '']}
var jqueryslidemenu={

animateduration: {over: 200, out: 200}, //duration of slide in/ out animation, in milliseconds

buildmenu:function(menuid, arrowsvar){
	jQuery(document).ready(function($){
		$(" #main_navigation a").removeAttr("title");
		var $mainmenu=$("#"+menuid+">ul")/*Custom JavaScript - TrendyWebStar*/
		var $headers=$mainmenu.find("ul").parent()
		$headers.each(function(i){
			var $curobj=$(this)
			var $subul=$(this).find('ul:eq(0)')
			this._dimensions={w:this.offsetWidth, h:this.offsetHeight, subulw:$subul.outerWidth(), subulh:$subul.outerHeight()}
			this.istopheader=$curobj.parents("ul").length==1? true : false
			$subul.css({top:this.istopheader? this._dimensions.h+"px" : 0})
			
			var $targetul=$(this).children("ul:eq(0)")
			this._offsets={left:$(this).offset().left, top:$(this).offset().top}
			var menuleft=this.istopheader? 0 : this._dimensions.w
			menuleft=(this._offsets.left+menuleft+this._dimensions.subulw>$(window).width())? (this.istopheader? -this._dimensions.subulw+this._dimensions.w : -this._dimensions.w) + 12 : menuleft
			if ($targetul.queue().length<=1) //if 1 or less queued animations/*Custom JavaScript - TrendyWebStar*/
				if(menuleft==0){
					$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).removeClass("menu_flip")
				}
				if(menuleft!=0 && this.istopheader){
					$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).addClass("menu_flip")
				}else{
					$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).removeClass("menu_flip")
				}
			
			$curobj.hover(
				function(e){
					var $targetul=$(this).children("ul:eq(0)")
					this._offsets={left:$(this).offset().left, top:$(this).offset().top}
					var menuleft=this.istopheader? 0 : this._dimensions.w
					menuleft=(this._offsets.left+menuleft+this._dimensions.subulw>$(window).width())? (this.istopheader? -this._dimensions.subulw+this._dimensions.w : -this._dimensions.w) + 12 : menuleft
					if ($targetul.queue().length<=1) //if 1 or less queued animations
						if(menuleft==0){
							$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).removeClass("menu_flip").slideDown(jqueryslidemenu.animateduration.over)
						}
						if(menuleft!=0 && this.istopheader){
							$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).addClass("menu_flip").slideDown(jqueryslidemenu.animateduration.over)
						}else{
							$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).removeClass("menu_flip").slideDown(jqueryslidemenu.animateduration.over)
						}
				},
				function(e){
					var $targetul=$(this).children("ul:eq(0)")
					$targetul.slideUp(jqueryslidemenu.animateduration.out)
				}
			) //end hover
		}) //end $headers.each()
		$mainmenu.find("ul").css({display:'none', visibility:'visible'})/*Custom JavaScript - TrendyWebStar*/
	}) //end document.ready
}
}


//build menu with ID="main_navigation" on page:
jqueryslidemenu.buildmenu("main_navigation", arrowimages)
/*Custom JavaScript - TrendyWebStar*/

/*----------------------------------------------------------------------*/
		/*PORTFOLIO FILTERABLE CODE*/
/*----------------------------------------------------------------------*/
jQuery.noConflict()(function($){
jQuery(document).ready(function($){
var 
speed = 700,   // animation speed
$wall = $('#portfolio').find('.portfolio-container ul')
;
$wall.masonry({
singleMode: true,
// only apply masonry layout to visible elements
itemSelector: '.one-fourth:not(.invis)',
animate: true,
animationOptions: {
duration: speed,
queue: false
}
});
$('#filterable a').click(function(){
var colorClass = '.' + $(this).attr('class');
if(colorClass=='.all') {
// show all hidden boxes
$wall.children('.invis')
.toggleClass('invis').fadeIn(speed);
} else {  
// hide visible boxes 
$wall.children().not(colorClass).not('.invis')
.toggleClass('invis').fadeOut(speed);
// show hidden boxes
$wall.children(colorClass+'.invis')
.toggleClass('invis').fadeIn(speed);
}
$wall.masonry();
 return false;
});
});
});


jQuery.noConflict()(function($){
jQuery(document).ready(function($){
var 
speed = 700,   // animation speed
$wall = $('#portfolio').find('.portfolio-container ul')
;
$wall.masonry({
singleMode: true,
// only apply masonry layout to visible elements
itemSelector: '.one-third:not(.invis)',
animate: true,
animationOptions: {
duration: speed,
queue: false
}
});
$('#filterable a').click(function(){
var colorClass = '.' + $(this).attr('class');
if(colorClass=='.all') {
// show all hidden boxes
$wall.children('.invis')
.toggleClass('invis').fadeIn(speed);
} else {  
// hide visible boxes 
$wall.children().not(colorClass).not('.invis')
.toggleClass('invis').fadeOut(speed);
// show hidden boxes
$wall.children(colorClass+'.invis')
.toggleClass('invis').fadeIn(speed);
}
$wall.masonry();
 return false;
});
});
});

jQuery.noConflict()(function($){
jQuery(document).ready(function($){
var 
speed = 700,   // animation speed
$wall = $('#portfolio').find('.portfolio-container ul')
;
$wall.masonry({
singleMode: true,
// only apply masonry layout to visible elements
itemSelector: '.one-half:not(.invis)',
animate: true,
animationOptions: {
duration: speed,
queue: false
}
});
$('#filterable a').click(function(){
var colorClass = '.' + $(this).attr('class');
if(colorClass=='.all') {
// show all hidden boxes
$wall.children('.invis')
.toggleClass('invis').fadeIn(speed);
} else {  
// hide visible boxes 
$wall.children().not(colorClass).not('.invis')
.toggleClass('invis').fadeOut(speed);
// show hidden boxes
$wall.children(colorClass+'.invis')
.toggleClass('invis').fadeIn(speed);
}
$wall.masonry();
 return false;
});
});
});
