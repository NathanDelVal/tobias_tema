<?php
	get_header();

	$id_page = get_page_by_path( 'home', OBJECT, 'page' )->ID;
?>

	<section class="wq-banner">
		<?php
			$entries = get_post_meta( $id_page, 'banner_items', true );

			foreach ( (array) $entries as $key => $entry ) {

				$wsg_banner_items_link = null;
				$wsg_banner_items_titulo = null;
				$wsg_banner_items_texto = null;

				if ( isset( $entry['wsg_banner_items_img_id'] ) ) {
					$wsg_banner_items_img_id = $entry['wsg_banner_items_img_id'];
				}
				if ( isset( $entry['wsg_banner_items_mobile_img_id'] ) ) {
					$wsg_banner_items_mobile_img_id = $entry['wsg_banner_items_mobile_img_id'];
				}
				if ( isset( $entry['wsg_banner_items_link'] ) ) {
					$wsg_banner_items_link = $entry['wsg_banner_items_link'];
				}
				if ( isset( $entry['wsg_banner_items_titulo'] ) ) {
					$wsg_banner_items_titulo = $entry['wsg_banner_items_titulo'];
				}
				if ( isset( $entry['wsg_banner_items_texto'] ) ) {
					$wsg_banner_items_texto = $entry['wsg_banner_items_texto'];
				}
		?>
			<div class="wq-banner_item">
				<figure>
					<?php if ( $wsg_banner_items_link != null && strlen($wsg_banner_items_link) > 0 ) { ?>
						<a href="<?php echo $wsg_banner_items_link; ?>">
							<?php getImageThumb($wsg_banner_items_img_id,'1920x490') ?>
						</a>
					<?php } else{ ?>
						<?php getImageThumb($wsg_banner_items_img_id,'1920x490') ?>
					<?php } ?>
				</figure>
				<figure class="wq-banner_responsivo">
					<?php if ( $wsg_banner_items_link != null && strlen($wsg_banner_items_link) > 0 ) { ?>
						<a href="<?php echo $wsg_banner_items_link; ?>">
							<?php
								getImageThumb($wsg_banner_items_mobile_img_id,'1000x764');
							?>
						</a>
					<?php } else{ ?>
						<?php
							getImageThumb($wsg_banner_items_mobile_img_id,'1000x764');
						?>
					<?php } ?>
				</figure>
				<div class="wq-conteudo">
					<div class="container">
						<?php if ( $wsg_banner_items_titulo != null && strlen($wsg_banner_items_titulo) > 0 ) { ?>
							<h2><?php echo $wsg_banner_items_titulo; ?></h2>
						<?php } ?>
						<?php if ( $wsg_banner_items_texto != null && strlen($wsg_banner_items_texto) > 0 ) { ?>
							<?php echo wpautop( $wsg_banner_items_texto ); ?>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</section>

	<section class="wq-01" id="sobre-nos">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<figure>
						<?php
							$wsg_sobre_img_id = get_post_meta( $id_page, 'wsg_sobre_img_id', true );
							getImageThumb($wsg_sobre_img_id,'560x680');
						?>
					</figure>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="wq-conteudo">
						<div class="wq-titulo_1">
							<h1><?php echo get_post_meta( $id_page, 'wsg_sobre_titulo', true ); ?></h1>
						</div>
						<?php echo wpautop(get_post_meta( $id_page, 'wsg_sobre_texto', true )); ?>
						<a href="<?php bloginfo('url'); ?>/sobre-nos" class="wq-btn_1">Saiba mais</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-galeria">
		<div class="container">
			<?php
				$wsg_galeria_imgs = get_post_meta( $id_page, 'wsg_galeria_imgs', true );
				if (!empty($wsg_galeria_imgs)) {
			?>
				<div class="wq-galeria_carousel">
					<?php
						foreach ($wsg_galeria_imgs as $key => $value) {
					?>
						<figure>
							<a href="<?php echo $value ?>" data-lity>
								<?php getImageThumb($key,'560x480'); ?>
							</a>
						</figure>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</section>

	<?php
		$wsg_call_to_action_1_img_id = get_post_meta($id_page, 'wsg_call_to_action_1_img_id', true);
		$wsg_call_to_action_1_img_id = wp_get_attachment_image_src($wsg_call_to_action_1_img_id, '1920x480');
		$wsg_call_to_action_1_img_id = $wsg_call_to_action_1_img_id[0];
	?>
	<section class="wq-02" style="background-image: url(<?php echo $wsg_call_to_action_1_img_id; ?>);">
		<div class="container">
			<h2><?php echo get_post_meta( $id_page, 'wsg_call_to_action_1_titulo', true ); ?></h2>
			<div class="row">
				<?php
					$entries = get_post_meta( $id_page, 'cta_items', true );

					foreach ( (array) $entries as $key => $entry ) {

						if ( isset( $entry['wsg_cta_items_valor'] ) ) {
							$wsg_cta_items_valor = $entry['wsg_cta_items_valor'];
						}
						if ( isset( $entry['wsg_cta_items_legenda'] ) ) {
							$wsg_cta_items_legenda = $entry['wsg_cta_items_legenda'];
						}
				?>
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
						<h3><?php echo $wsg_cta_items_valor; ?></h3>
						<p><?php echo $wsg_cta_items_legenda; ?></p>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
    <section>
	</section>
	<!--<?php
		$wsg_call_to_action_2_img_id = get_post_meta($id_page, 'wsg_call_to_action_2_img_id', true);
		$wsg_call_to_action_2_img_id = wp_get_attachment_image_src($wsg_call_to_action_2_img_id, '1920x400');
		$wsg_call_to_action_2_img_id = $wsg_call_to_action_2_img_id[0];
	?>
	<section class="wq-04" style="background-image: url(<?php echo $wsg_call_to_action_2_img_id; ?>);">
		<div class="container">
			<h3><?php echo get_post_meta( $id_page, 'wsg_call_to_action_2_titulo', true ); ?></h3>
			<a href="<?php echo get_post_meta( $id_page, 'wsg_call_to_action_2_btn_link', true ); ?>" class="wq-btn_1"><?php echo get_post_meta( $id_page, 'wsg_call_to_action_2_btn_text', true ); ?></a>
		</div>
	</section>-->


	<section class="wq-03" id="solucoes">
		<div class="container">
			<div class="wq-titulo_1">
				<h3><?php echo get_post_meta( $id_page, 'wsg_servicos_titulo', true ); ?></h3>
			</div>
			<?php echo wpautop(get_post_meta( $id_page, 'wsg_servicos_texto', true )); ?>
			<div class="wq-carousel_servicos">
				<?php
					$wsg_servicos_na_home = get_post_meta( $id_page, 'wsg_servicos_na_home', true );

					$arrayQueryServicos = array(
						'post_type'				=> array( 'servicos192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
						'post__in'				=> $wsg_servicos_na_home
					);
					$queryServicos = new WP_Query($arrayQueryServicos);
					while ( $queryServicos->have_posts()) {
						$queryServicos->the_post();
				?>
					<div>
						<div class="wq-conteudo">
							<figure>
								<?php
									$wsg_servico_item_img_id = get_post_meta( get_the_ID(), 'wsg_servico_item_img_id', true );
									getImageThumb($wsg_servico_item_img_id,'354x354');
								?>
							</figure>
							<div class="wq-conteudo-texto">
								<h3><?php the_title(); ?></h3>
								<!-- <div>
									<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_servico_item_resumo', true )); ?>
								</div> -->
								<a href="<?php the_permalink(); ?>" class="wq-btn_1">Saiba mais</a>
							</div>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
			<div class="wq-cto">
				<a href="<?php bloginfo('url'); ?>/servicos" class="wq-btn_1">Ver todos</a>
			</div>
		</div>
	</section>

	<?php include "inc-videos.php"; ?>

	<section class="wq-instagram">
		<div class="container">
			<div class="row">
				<div class="wq-titulo_1">
					<h3><?php echo get_post_meta( $id_page, 'wsg_instagram_titulo', true ); ?></h3>
				</div>
				<?php echo do_shortcode('[instagram-feed]'); ?>
			</div>
		</div>
	</section>

	<section class="wq-05" id="blog">
		<div class="container">
			<div class="wq-titulo_1">
				<h3><?php echo get_post_meta( $id_page, 'wsg_blog_titulo', true ); ?></h3>
			</div>
			<div class="row">
				<?php
					$args = array (
						'post_type'         => 'post',
						'posts_per_page'    => 3
					);
					$query = new WP_Query( $args );
					$posts = $query->get_posts();
					foreach ($posts as $key => $item) {
						// setup_postdata($item);
						$categories = get_the_terms( $item->ID, 'category' );
						$htmlCategory = '';
						if ( $categories && ! is_wp_error( $categories ) ){
							$draught_links = array();
							foreach ($categories as $category) {
								$cat_Item = '<a href="'.get_term_link($category->term_id, "category").'" title="'.$category->name.'" > '.$category->name.'</a>';
								array_push($draught_links, $cat_Item);
							}
							$htmlCategory = implode(' | ', $draught_links);
						}
				?>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<div class="wq-blog_box">
							<figure>
								<?php echo getImageThumb(get_post_thumbnail_id($item->ID), '360x216'); ?>
							</figure>
							<div class="wq-conteudo">
								<ul class="wq-filtro">
									<li>
										<span class="flaticon-folder-2"></span>
										<?php
											$categoryPrimary = get_post_primary_category( $item->ID, 'category', false );
											foreach ($categoryPrimary as $key => $value) {
										?>
											<a href="<?php echo get_term_link($value->term_id, 'category'); ?>" title="<?php echo $value->name; ?>" ><?php echo $value->name; ?></a>
										<?php } ?>

									</li>
									<li>
										<span class="flaticon-calendar-2"></span>
										<?php echo get_the_date('d', $item->ID); ?>.<?php echo get_the_date('m', $item->ID); ?>.<?php echo get_the_date('Y', $item->ID); ?>
									</li>
								</ul>
								<h3><?php echo $item->post_title; ?></h3>
								<?php echo wpautop($item->post_excerpt); ?>
								<a class="wq-btn_1" href="<?php echo get_permalink($item->ID); ?>">Saiba mais</a>
							</div>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
			<div class="wq-cto">
				<?php echo wpautop(get_post_meta( $id_page, 'wsg_blog_01_conteudo', true )); ?>
				<a href="<?php echo get_post_meta( $id_page,'wsg_blog_01_btn_link', true) ?>" class="wq-btn_1_hblog">
					<?php echo get_post_meta( $id_page,'wsg_blog_01_btn_text', true) ?>
				</a>
			</div>
		</div>
	</section>

	<section class="wq-faq" id="faq">
		<div class="container">
			<div class="wq-titulo_1">
				<h3><?php echo get_post_meta( $id_page, 'wsg_faq_titulo', true ); ?></h3>
			</div>
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="accordion faq-accordion" id="accordion01">
						<?php
							$faq_01_items = get_post_meta( $id_page, 'faq_01_items', true );

							$position = 0;

							foreach ( (array) $faq_01_items as $key => $entry ) {

								$position++;

								$wsg_faq_01_items_titulo = null;
								$wsg_faq_01_items_texto = null;

								if ( isset( $entry['wsg_faq_01_items_titulo'] ) ) {
									$wsg_faq_01_items_titulo = $entry['wsg_faq_01_items_titulo'];
								}
								if ( isset( $entry['wsg_faq_01_items_texto'] ) ) {
									$wsg_faq_01_items_texto = $entry['wsg_faq_01_items_texto'];
								}
						?>
							<div class="card">
								<div class="card-header" id="faq-<?php echo $position; ?>">
									<h2 class="collapsed" type="button" data-toggle="collapse" data-target="#cfaq-<?php echo $position; ?>" aria-expanded="false" aria-controls="cfaq-<?php echo $position; ?>">
										<?php echo $wsg_faq_01_items_titulo; ?>
									</h2>
								</div>
								<div id="cfaq-<?php echo $position; ?>" class="collapse" aria-labelledby="faq-<?php echo $position; ?>" data-parent="#accordion01">
									<div class="card-body">
										<?php echo wpautop($wsg_faq_01_items_texto); ?>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="accordion faq-accordion" id="accordion02">
						<?php
							$faq_02_items = get_post_meta( $id_page, 'faq_02_items', true );

							$position = 0;

							foreach ( (array) $faq_02_items as $key => $entry ) {

								$position++;

								$wsg_faq_02_items_titulo = null;
								$wsg_faq_02_items_texto = null;

								if ( isset( $entry['wsg_faq_02_items_titulo'] ) ) {
									$wsg_faq_02_items_titulo = $entry['wsg_faq_02_items_titulo'];
								}
								if ( isset( $entry['wsg_faq_02_items_texto'] ) ) {
									$wsg_faq_02_items_texto = $entry['wsg_faq_02_items_texto'];
								}
						?>
							<div class="card">
								<div class="card-header" id="faq02-<?php echo $position; ?>">
									<h2 class="collapsed" type="button" data-toggle="collapse" data-target="#faq-group02-<?php echo $position; ?>" aria-expanded="false" aria-controls="faq-group02-<?php echo $position; ?>">
										<?php echo $wsg_faq_02_items_titulo; ?>
									</h2>
								</div>
								<div id="faq-group02-<?php echo $position; ?>" class="collapse" aria-labelledby="faq02-<?php echo $position; ?>" data-parent="#accordion02">
									<div class="card-body">
										<?php echo wpautop($wsg_faq_02_items_texto); ?>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>