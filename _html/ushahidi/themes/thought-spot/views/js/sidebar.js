$( document ).ready(function() {
 
    //alert('JQuery working');
	
	//insert sidebar on pages with .main-content
		
		$( '<div class="sidebar-content"></div>' ).insertBefore( '.main-content' );
		var pageTitle = $( '.menu .active' ).text();		
		$( '.sidebar-content' ).append( '<h3>' + pageTitle + '</h3><ul></ul>' );
		
		var index = 0;
		
		$(".main-content h2").each(function() { // getting all h2 headers from the content
		
			if ($(this).attr('title')){
				var linkTitle = $( this ).attr( "title" );
			} else {
				var linkTitle = $( this ).text();
			}
			
			index ++;
			
			//get link name from either a) title attribute or b) html content
			var newLink = '<li><a href="#section-' + index + '">' + linkTitle + '</a></li>';
			//var newLink = 'link';
			
			//append to sidebar
			$( ".sidebar-content ul").append(newLink);
		
		});
		
		//sidebar link animations
		
		$('a[href*=#]').click(function(event){
			$('html, body').animate({
				scrollTop: $( $.attr(this, 'href') ).offset().top - 92
			}, 500);
			event.preventDefault();
		});
		
		//FAQ expandy
		
		$('.q-and-a .question').click(function(){
			$( ".answer", $(this).parent() ).slideToggle( 500 );
			if ($(this).parent().hasClass("expanded")) {
				$( $(this).parent() ).removeClass("expanded");
			} else {
				$( $(this).parent() ).addClass("expanded");
			}
		});
		
		// expand and collapse all
		
		$('.expand-all').click(function(){
			
			if ($(this).hasClass("collapse-all")) {
				$( ".q-and-a .answer", $(this).parent() ).slideUp( 500 );
				$( ".q-and-a", $(this).parent() ).removeClass("expanded");
				$( $(this) ).removeClass("collapse-all");
				$( $(this) ).addClass("expand-all");
				$( $(this) ).text("expand all");
			} else {
				$( ".q-and-a .answer", $(this).parent() ).slideDown( 500 );
				$( ".q-and-a", $(this).parent() ).addClass("expanded");
				$( $(this) ).text("collapse all");
				$( $(this) ).removeClass("expand-all");
				$( $(this) ).addClass("collapse-all");
			}
		});
		
		// Tags expandy
		
		$('.report_row h4').click(function(){
			$( "ul", $(this).parent() ).slideToggle( 500 );
			if ($(this).parent().hasClass("expanded")) {
				$( $(this).parent() ).removeClass("expanded");
			} else {
				$( $(this).parent() ).addClass("expanded");
			}
		});
 
});