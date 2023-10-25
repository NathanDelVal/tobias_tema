<?php
	get_header();

	$id_page = get_page_by_path( 'clientes', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-clientes_01 wq-cto">
		<div class="container">
			<div class="wq-titulo_1">
				<h3><?php echo get_post_meta( $id_page, 'wsg_servicos_01_titulo', true ); ?></h3>
			</div>
			<?php echo wpautop(get_post_meta( $id_page, 'wsg_servicos_01_texto', true )); ?>

				<div class="row">
					<?php
						$arrayQueryEventos = array(
							'post_type'				=> array( 'clientes192' ),
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'posts_per_page'		=> '-1',
						);
						$queryEventos = new WP_Query($arrayQueryEventos);
						while ( $queryEventos->have_posts()) {
							$queryEventos->the_post();
					?>
						<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12">
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
		</div>
	</section>

<?php get_footer(); ?>