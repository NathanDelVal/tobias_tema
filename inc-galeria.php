<?php $id_home = get_page_by_path( 'home', OBJECT, 'page' )->ID; ?>

	<section class="wq-09" id="clientes">
		<div class="wq-titulo_1 wq-cto">
			<h2><?php echo get_post_meta( $id_home, 'wsg_galeria_titulo', true ); ?></h2>
		</div>
		<div class="container">
			<div class="wq-carousel_parceiros">
				<?php
					$wsg_galeria_na_home = get_post_meta( $id_home, 'wsg_galeria_na_home', true );

					$arrayQueryServicos = array(
						'post_type'				=> array( 'clientes192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
						'post__in'				=> $wsg_galeria_na_home
					);
					$queryServicos = new WP_Query($arrayQueryServicos);
					while ( $queryServicos->have_posts()) {
						$queryServicos->the_post();
				?>
					<div>
						<div class="wq-parceiros_item">
							<figure>
								<a href="<?php echo get_post_meta( get_the_ID(), 'wsg_cliente_item_link', true ); ?>">
									<?php
										$wsg_cliente_item_img_id = get_post_meta( get_the_ID(), 'wsg_cliente_item_img_id', true );
										getImageThumb($wsg_cliente_item_img_id,'full');
									?>
								</a>
							</figure>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
			<div class="wq-cto">
				<a href="<?php bloginfo('url'); ?>/clientes" class="wq-btn_1">Ver Todos</a>
			</div>
		</div>
	</section>