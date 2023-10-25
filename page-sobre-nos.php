<?php
	get_header();

	$id_page = get_page_by_path( 'sobre-nos', OBJECT, 'page' )->ID;
	$id_home = get_page_by_path( 'home', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-01-sobre">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<figure>
						<?php
							$wsg_sobre_01_img_id = get_post_meta( $id_page, 'wsg_sobre_01_img_id', true );
							getImageThumb($wsg_sobre_01_img_id,'560x680');
						?>
					</figure>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="wq-conteudo">
						<div class="wq-titulo_1">
							<h2><?php echo get_post_meta( $id_page, 'wsg_sobre_01_titulo', true ); ?></h2>
						</div>
						<?php echo wpautop(get_post_meta( $id_page, 'wsg_sobre_01_conteudo', true )); ?>
						<a href="<?php echo get_post_meta( $id_page,'wsg_sobre_01_btn_link', true) ?>" class="wq-btn_1">
							<?php echo get_post_meta( $id_page,'wsg_sobre_01_btn_text', true) ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="wq-galeria">
		<div class="container">
			<?php
				$wsg_sobre_02_imgs = get_post_meta( $id_page, 'wsg_sobre_02_imgs', true );
				if (!empty($wsg_sobre_02_imgs)) {
			?>
				<div class="wq-galeria_carousel">
					<?php
						foreach ($wsg_sobre_02_imgs as $key => $value) {
					?>
						<figure>
							<?php getImageThumb($key,'560x480'); ?>
						</figure>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</section>

	<section class="wq-03" id="solucoes">
		<div class="container">
			<div class="wq-titulo_1">
				<h3><?php echo get_post_meta( $id_home, 'wsg_servicos_titulo', true ); ?></h3>
			</div>
			<?php echo wpautop(get_post_meta( $id_home, 'wsg_servicos_texto', true )); ?>
			<div class="wq-carousel_servicos">
				<?php

					$arrayQueryServicos = array(
						'post_type'				=> array( 'servicos192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
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
				<a href="<?php bloginfo('url'); ?>/solucoes" class="wq-btn_1">Ver todos</a>
			</div>
		</div>
	</section>

<?php get_footer(); ?>