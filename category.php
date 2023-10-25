<?php
	get_header();

	$id_page = get_page_by_path( 'blog', OBJECT, 'page' )->ID;
	$category = get_queried_object();
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-01-blog">
		<div class="container">
			<div class="row">
				<div class="col-xl-9 col-lg-8 col-md-7 col-sm-12 col-12">
					<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array (
							'post_type'         => 'post',
							'cat'               => $category->term_id,
							'posts_per_page'    => 5,
							'paged' => $paged
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								$attachID = get_post_thumbnail_id( get_the_ID() );

								$categories = get_the_terms( get_the_ID(), 'category' );
								$htmlCategory = '';
								if ( $categories && ! is_wp_error( $categories ) ){
									$draught_links = array();
									foreach ($categories as $category) {
										$item = '<a href="'.get_term_link($category->term_id, "category").'" title="'.$category->name.'" > '.$category->name.'</a>';
										array_push($draught_links, $item);
									}
									$htmlCategory = implode(' | ', $draught_links);
								}
					?>
						<div class="wq-conteudo">
							<figure>
								<?php echo getImageThumb(get_post_thumbnail_id(), '750x416'); ?>
							</figure>
							<div class="wq-conteudo_texto">
								<div class="wq-filtro row">
									<ul class="wq-lista-inline">
										<li><?php echo get_the_date('d', $item->ID); ?>.<?php echo get_the_date('m', $item->ID); ?>.<?php echo get_the_date('Y', $item->ID); ?></li>|
										<li>Por: <?php echo get_the_author(); ?></li>
									</ul>
									<ul class="wq-lista-inline">
										<li>
											<span class="flaticon-folder-2"></span>
											<?php echo $htmlCategory; ?>
										</li>
									</ul>
								</div>
								<h3><?php the_title(); ?></h3>
								<?php echo wpautop(the_excerpt()); ?>
								<a href="<?php echo get_permalink(); ?>" class="wq-btn_1">Ler Mais</a>
							</div>
						</div>
					<?php } } wp_reset_query(); ?>
				</div>
				<?php
					get_sidebar();
				?>
			</div>
			<?php
				if (function_exists("pagination")) {
					pagination($query);
				}
			?>
		</div>
	</section>

<?php get_footer(); ?>