$(function(){

	$(window).scroll(function(){
		if( $(this).scrollTop()>155 ){
			$('.wq-header').each(function(){
				$(this).addClass("wq-header_fixo")
			}
		)}else{
			$('.wq-header').each(function(){
				$(this).removeClass("wq-header_fixo")
			})
		};
	});
	$(window).scroll();


	// Select all links with hashes
	$('.scroll, .menu-link').not('[href="#"]').not('[href="#0"]').click(function(event) {
		// On-page links
		if ( location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
		// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			// Does a scroll target exist?
			if (target.length) {
			// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				$('html, body').animate({
					scrollTop: target.offset().top - 150
				}, 1000, function() {
				// Callback after animation
				// Must change focus!
					var $target = $(target);
					$target.focus();
					if ($target.is(":focus")) { // Checking if the target was focused
						return false;
					} else {
						$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
						$target.focus(); // Set focus again
					};
				});
			}
		}
	});

	function iframeSize(i){
		var wq03Img = $(".wq-03 figure img");
		var wq03ImgWidth = wq03Img.width();

		wq03Img.css("height", wq03ImgWidth * 0.70 );
	}
	iframeSize();
	$( window ).resize(function() {
		iframeSize();
	});

	var $MenuItens = $('.wq-menu_principal li');
	var $MenuItensLink = $('.wq-menu_principal li').find("a");

	$($MenuItens).attr({ class: "nav-item", });
	$($MenuItensLink).attr({ class: "menu-link", });

	var $MenuItensLi = $('.wq-menu_principal ul > li').has("ul");

	$($MenuItensLi).each(function(){

		var $MenuItensLiA = $(this).find("a");
		$($MenuItensLiA).attr({ class: "dropdown-item", });

		var $MenuItensLinkDd = $(this).find(" > a");

		var $MenuItensLiDdLi = $(this).find("li");
		$($MenuItensLiDdLi).removeClass("nav-item");

		$($MenuItensLinkDd).attr({
			class: "menu-link",
			id: "dropdownMenuButton",
			"data-toggle": "dropdown",
			"aria-haspopup": "true",
			"aria-expanded": "false"
		});

		var $MenuItensUl = $(this).find("ul");

		$($MenuItensUl).attr({
			class: "dropdown-menu",
			"aria-labelledby": "dropdownMenuButton"
		});

		var $MenuItensLiConteudo = $(this).html();

		$(this).html("<div class=\"dropdown\">"+$MenuItensLiConteudo+"</div>");
	});

});