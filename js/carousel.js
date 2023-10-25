$(document).ready(function() {
	$('.wq-banner').owlCarousel({
		items: 1,
		loop: true,
		nav: false,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		smartSpeed: 1000,
	})

	$('.wq-carousel_depoimentos').owlCarousel({
		navText: [ '<span class="flaticon-prev"></span>', '<span class="flaticon-next"></span>' ],
		nav: true,
		items: 1,
		loop: true,
		nav: false,
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		smartSpeed: 1000,
	});

	$('.wq-carousel_youtube').owlCarousel({
		navText: [ '<span class="flaticon-prev"></span>', '<span class="flaticon-next"></span>' ],
		nav: true,
		margin: 0,
		loop: true,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1
			},
			500: {
				items: 1
			},
			750: {
				items: 2
			},
			1000: {
				items: 3
			}
		}
	});

	$('.wq-carousel_servicos').owlCarousel({
		nav: true,
		loop: true,
		margin: 30,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		smartSpeed: 750,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1
			},
			500: {
				items: 2
			},
			750: {
				items: 3
			},
			1000: {
				items: 4
			}
		}
	});

	$('.wq-carousel_parceiros').owlCarousel({
		nav: true,
		loop: true,
		margin: 30,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		smartSpeed: 750,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1
			},
			500: {
				items: 2
			},
			750: {
				items: 3
			},
			1000: {
				items: 4
			}
		}
	})

	$('.wq-galeria_carousel').owlCarousel({
		nav: true,
		loop: true,
		margin: 30,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		smartSpeed: 750,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1
			},
			500: {
				items: 2
			},
			750: {
				items: 3
			},
			1000: {
				items: 4
			}
		}
	})

});