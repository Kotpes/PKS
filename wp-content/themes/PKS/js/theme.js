
jQuery(document).ready(function($) {


	/** Align last two categories on main page **/
	$('.content .row .col-lg-3:nth-child(9)').addClass('col-md-offset-3');


    /** Service info blocks hide/show **/
    if ( $(window).width() > 1024 ) {
    	$('.permanent_info').hover(function(){
        if ($(this).find('.head_info').hasClass('visible')) {
    		$(this).find('.head_info').removeClass('visible');
    		$(this).find('.head_info').addClass('invisible');
        }
        else if ($(this).find('.head_info').hasClass('invisible')){
        		$(this).find('.head_info').removeClass('invisible');
        		$(this).find('.head_info').addClass('visible');
        }	    
	    });
    }
    if ( $(window).width() < 1040 ) {    	
        $('.permanent_info').click(function(){
        	if ($(this).find('.head_info').hasClass('visible')) {
             	$(this).removeClass('full_height');   		
        		$(this).find('.head_info').removeClass('visible');
        		$(this).find('.head_info').addClass('invisible');
        	}
        	else if ($(this).find('.head_info').hasClass('invisible')){
        		$(this).addClass('full_height');
        		$(this).find('.head_info').removeClass('invisible');
        		$(this).find('.head_info').addClass('visible');
        	}				    
	    });
    }

    /** Menu animations **/
    $('#menu_trigger').click(function(){
    	$('.mobile_menu').slideToggle('slow');
    	$("html, body").animate({ scrollTop: 0 }, "slow");
	    return false;
    });
    $('.menu_m li:first-child').click(function(){
    	$("html, body").animate({ scrollTop: 0 }, "slow");
	    return false;
    });

    $('.menu_m a').click(function(){
    	if($(this).parent().hasClass('inactive')){
    		$('.menu_m li').addClass('inactive');
    		$(this).parent().removeClass('inactive');
    		$('.menu_m li').removeClass('active');
    	    $(this).parent().addClass('active');
    	}
    	$('.mobile_menu').slideToggle('slow');
    	
    });


	
    /** article slider **/
	$('.article_slider').bxSlider({
	    slideWidth: 175,
	    minSlides: 1,
	    maxSlides: 5,
	    slideMargin: 17,
	    infiniteLoop: false
	});
	$('.slider').bxSlider();
	/** Article comments **/
	$('.article_comments #submit').addClass('btn btn-primary btn-lg');
	/** Adds read more buttons **/
	var name = $('.article_content').find('h4').text();
		var tutustu = 'TUTUSTU'; 
		var syvenny = 'SYVENNY';
		
		$('.article_content h4').each(function(){
		    if($(this).text() == tutustu)
		    {
		        $(this).nextUntil("h4").wrapAll('<div class="expand" />').parent().append('<span id="expand">NÄYTÄ LISÄÄ +</span>');
		    }
		    else if($(this).text() == syvenny) {
		    	$(this).nextUntil("h4").wrapAll('<div class="expand" />').parent().append('<span id="expand">NÄYTÄ LISÄÄ +</span>');
		    }
		});
		/** Add expanding to paragraphs **/
		
    /** Smooth scrolling with offset **/
	  
    if ( $(window).width() > 1024 ) {
	  function filterPath(string) {
	  return string
	    .replace(/^\//,'')
	    .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
	    .replace(/\/$/,'');
	  }
	  var locationPath = filterPath(location.pathname);
	  $('a[href*=#]').each(function() {
	    var thisPath = filterPath(this.pathname) || locationPath;
	    if (  locationPath == thisPath
	    && (location.hostname == this.hostname || !this.hostname)
	    && this.hash.replace(/#/,'') ) {
	      var $target = $(this.hash), target = this.hash;
	      if (target) {
	        var targetOffset = $target.offset().top-100;
	        $(this).click(function(event) {
	          event.preventDefault();
	          $('html, body').animate({scrollTop: targetOffset}, 400, function() {
	            location.hash = target;
	          });
	        });
	      }
	    }
	  });
	}
	if ( $(window).width() < 1024 ) {
	  function filterPath(string) {
	  return string
	    .replace(/^\//,'')
	    .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
	    .replace(/\/$/,'');
	  }
	  var locationPath = filterPath(location.pathname);
	  $('a[href*=#]').each(function() {
	    var thisPath = filterPath(this.pathname) || locationPath;
	    if (  locationPath == thisPath
	    && (location.hostname == this.hostname || !this.hostname)
	    && this.hash.replace(/#/,'') ) {
	      var $target = $(this.hash), target = this.hash;
	      if (target) {
	        var targetOffset = $target.offset().top-50;
	        $(this).click(function(event) {
	          event.preventDefault();
	          $('html, body').animate({scrollTop: targetOffset}, 400, function() {
	            location.hash = target;
	          });
	        });
	      }
	    }
	  });
	}
});