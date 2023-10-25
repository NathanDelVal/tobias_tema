	<?php
		$wsg_banner_all_pages_img_id = get_post_meta($id_page, 'wsg_banner_all_pages_img_id', true);
		$wsg_banner_all_pages_img_id = wp_get_attachment_image_src($wsg_banner_all_pages_img_id, '1920x200');
		$wsg_banner_all_pages_img_id = $wsg_banner_all_pages_img_id[0];
	?>
	<section class="wq-breadcrumb" style="background-image: url(<?php echo $wsg_banner_all_pages_img_id; ?>);">
		<div class="wq-conteudo-breacrumb">
			<div class="container">
				<div class="row">
					<div class="wq-titulo_1">
						<?php if ( is_page() || is_single() ) { ?>
							<h1><?php the_title(); ?></h1>
						<?php } elseif ( is_post_type_archive('servicos192') ) { ?>
							<h1><?php echo get_page_by_path( 'servicos', OBJECT, 'page' )->post_title; ?></h1>
						<?php } elseif ( is_post_type_archive('clientes192') ) { ?>
							<h1><?php echo get_page_by_path( 'clientes', OBJECT, 'page' )->post_title; ?></h1>
						<?php } elseif ( is_category() ) { ?>
							<h1>Categoria: <?php echo $category->name; ?></h1>
						<?php } elseif ( is_search() ) { ?>
							<h1>Resultados de: <?php echo $_GET['s'];?></h1>
						<?php } elseif ( is_tag() ) { ?>
							<h1>Tag: <?php echo $tag->name; ?></h1>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>