$(function(){
	
	// função para funcionar o botão do menu

	jQuery('.wq-btn_menu').click(function() {
		jQuery('.wq-header_bottom').toggleClass("aberto")
		jQuery('.wq-menu_principal').toggleClass("aberto")
		jQuery('.wq-btn_menu').toggleClass("btn-fechar")
		jQuery('.wq-midias-sociais').toggleClass("wq-lista-inline")
		jQuery('.diagnostico').toggleClass("visivel")
	})

	// função de funcionamento das tabs

	function tabs_function(indice) {
        if (jQuery('.wq-tabs[data-tabgroup="' + indice + '"] .wq-tabs_contents').length) {
            jQuery('.wq-tabs[data-tabgroup="' + indice + '"] .wq-tabs_btn').each(function (index, value) {
                jQuery(value).click(function () {
                    var tab = jQuery(this).data("tab");
                    jQuery('.wq-tabs[data-tabgroup="' + indice + '"] .wq-tabs_contents > div').each(function (index2, value2) {
                        jQuery(value2).removeClass("ver");
                    });
                    jQuery('.wq-tabs[data-tabgroup="' + indice + '"] .wq-tabs_contents > div[data-tab=' + tab + "]").addClass("ver");
                    jQuery('.wq-tabs[data-tabgroup="' + indice + '"] .wq-tabs_btn').each(function (index2, value2) {
                        jQuery(value2).removeClass("active");
                    });
                    jQuery(this).addClass("active");
                });
            });
            jQuery('.wq-tabs[data-tabgroup="' + indice + '"] .wq-tabs_btn:eq(0)').click();
        }
    }
    var i;
    for (i = 0; i < jQuery(".wq-tabs").length; i++) {
        tabs_function(i);
    }


	// função de funcionamento de accordion
	jQuery(document).on("click", ".wq-accordion_btn", function (t) {
		t.preventDefault();
		var e = jQuery(this).closest(".wq-accordion_group").find(">div"),
			i = e.find(".wq-accordion_btn"),
			n = e.find(".wq-accordion_content");
		jQuery(this).hasClass("active") ? (jQuery(this).removeClass("active"), n.slideUp()) : (i.removeClass("active"), n.slideUp(), jQuery(this).addClass("active").next().slideDown());
	});
	jQuery('.wq-accordion_group .wq-accordion:first-child .wq-accordion_btn').click();

	// função de funcionamento de modal

	if (jQuery('.wq-modal').length) {
		jQuery('.wq-modal_btn').each(function(index, value){
			jQuery(value).click(function(){
				var item = jQuery(this).data('modal');
				jQuery('.wq-modal').each(function(index2, value2){
					jQuery(value2).removeClass('ver');
				});
				jQuery('.wq-modal[data-modal='+item+']').addClass('ver');
				jQuery('.wq-modal_btn').each(function(index2, value2){
					jQuery(value2).removeClass('active');
				});
				jQuery(this).addClass('active');
			});
		});
	}
	jQuery('.wq-modal_btn-fechar').click(function(){
		jQuery('.wq-modal').removeClass('ver')
	})


	// Função para filtrar items na wq-galeria

	jQuery('.wq-galeria_btn-todos').click(function(){
		jQuery('.wq-galeria_item').addClass('todos')
		jQuery('.wq-galeria_btn').removeClass('active')
		jQuery('.wq-galeria_btn-todos').addClass('active')
	})

	if (jQuery('.wq-galeria').length) {
		jQuery('.wq-galeria_btn').each(function(index, value){
			jQuery(value).click(function(){
				var item = jQuery(this).data('galeria');
				jQuery('.wq-galeria_item').each(function(index2, value2){
					jQuery(value2).removeClass('ver').removeClass('todos');
				});
				jQuery('.wq-galeria_item[data-galeria*='+item+']').addClass('ver');
				jQuery('.wq-galeria_btn').each(function(index2, value2){
					jQuery(value2).removeClass('active');
				});
				jQuery(this).addClass('active');
				jQuery('.wq-galeria_btn-todos').removeClass('active');
			});
		});
	}

	jQuery('.wq-galeria_btn-todos').click();

})