    function preloadFunc()
    {
        /** Add Show more to paragraph in article **/
		var name = $('.article_content').find('h4').text();
		var tutustu = 'TUTUSTU'; 
		var syvenny = 'SYVENNY';
		
		$('.article_content h4').each(function(){
		    if($(this).text() == tutustu)
		    {
		        $(this).next('p').wrap('<div class="expand" />').parent().append('<span id="expand">NÄYTÄ LISÄÄ +</span>');
		    }
		    else if($(this).text() == syvenny) {
		    	$(this).next('p').wrap('<div class="expand" />').parent().append('<span id="expand">NÄYTÄ LISÄÄ +</span>');
		    }
		});
    }
    window.onpaint = preloadFunc();
