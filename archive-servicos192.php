<?php
	get_header();

	$id_page = get_page_by_path( 'servicos', OBJECT, 'page' )->ID;
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-03">
		<div class="container">
			<div class="wq-titulo_1">
				<h3><?php echo get_post_meta( $id_page, 'wsg_servicos_01_titulo', true ); ?></h3>
			</div>
			<?php echo wpautop(get_post_meta( $id_page, 'wsg_servicos_01_texto', true )); ?>
			<div class="row">
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
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 wq-conteudo">
						<figure>
							<?php
								$wsg_servico_item_img_id = get_post_meta( get_the_ID(), 'wsg_servico_item_img_id', true );
								getImageThumb($wsg_servico_item_img_id,'540x380');
							?>
						</figure>
						<div class="wq-conteudo-texto">
							<h3><?php the_title(); ?></h3>
							<div>
								<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_servico_item_resumo', true )); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="wq-btn_1">Saiba mais</a>
						</div>
					</div>
				<?php }wp_reset_query(); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>