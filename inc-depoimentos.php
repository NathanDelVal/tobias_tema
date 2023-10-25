<?php $id_home = get_page_by_path( 'home', OBJECT, 'page' )->ID; ?>

	<section class="wq-07">
		<div class="container">
			<div class="wq-cto">
				<div class="wq-titulo_1">
					<h2><?php echo get_post_meta( $id_home, 'wsg_depoimentos_titulo', true ); ?></h2>
				</div>
			</div>
			<div class="wq-carousel_depoimentos">
				<?php
					$arrayQueryDepoimentos = array(
						'post_type'				=> array( 'depoimentos192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
					);
					$queryDepoimentos = new WP_Query($arrayQueryDepoimentos);
					while ( $queryDepoimentos->have_posts()) {
						$queryDepoimentos->the_post();
				?>
					<div>
						<div class="wq-depoimentos_item">
							<figure>
								<?php
									$wsg_depoimento_item_img_id = get_post_meta( get_the_ID(), 'wsg_depoimento_item_img_id', true );
									getImageThumb($wsg_depoimento_item_img_id,'120x120');
								?>
							</figure>
							<h3><?php the_title(); ?></h3>
							<span><?php echo get_post_meta( get_the_ID(), 'wsg_depoimento_item_cargo', true ); ?></span>
							<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_depoimento_item_conteudo', true )); ?>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
		</div>
	</section>