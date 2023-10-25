$(document).ready(function() {
	$('.wq-banner').owlCarousel({
		responsiveClass: true,
		nav:true,
		margin:0,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	})
})
$(document).ready(function() {
	$('.wq-carousel_depoimentos').owlCarousel({
		responsiveClass: true,
		navText: [ '<span class="flaticon-prev"></span>', '<span class="flaticon-next"></span>' ],
		nav:true,
		margin:0,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1000: {
				items: 1      }
		}
	})
})
$(document).ready(function() {
	$('.wq-carousel_youtube').owlCarousel({
		responsiveClass: true,
		nav:true,
		navText: [ '<span class="flaticon-prev"></span>', '<span class="flaticon-next"></span>' ],
		margin:0,
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
	})

})
$(document).ready(function() {
	$('.wq-carousel_servicos').owlCarousel({
		responsiveClass: true,
		nav:true,
		margin:40,
		responsive: {
			0: {
				items: 1
			},
			500: {
				items: 2
			},
			1000: {
				items: 3			}
		}
	})
})