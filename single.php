<?php
	get_header();

	$id_page = get_page_by_path( 'blog', OBJECT, 'page' )->ID;
	$id_disqus = get_page_by_path( 'configuracoes-do-disqus', OBJECT, 'gerais' )->ID;
?>
	<?php include "inc-breadcrumbs.php"; ?>

	<?php
		if (have_posts()) : while (have_posts()) : the_post();
			$attachID = get_post_thumbnail_id(get_the_ID());
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
	<section class="wq-01-blog">
		<div class="container">
			<div class="row">
				<div class="col-xl-9 col-lg-8 col-md-7 col-sm-12 col-12">
					<div class="wq-conteudo">
						<figure>
							<?php echo getImageThumb(get_post_thumbnail_id(), '750x416'); ?>
						</figure>
						<div class="wq-conteudo_texto">
							<div class="wq-filtro row">
								<ul class="wq-lista-inline">
									<li><?php echo get_the_date('d', get_the_ID()); ?>.<?php echo get_the_date('m', get_the_ID()); ?>.<?php echo get_the_date('Y', get_the_ID()); ?></li>|
									<li>Por: <?php echo get_the_author(); ?></li>
								</ul>
								<ul class="wq-lista-inline">
									<li>
										<span class="flaticon-folder-2"></span>
										<?php echo $htmlCategory; ?>
									</li>
								</ul>
							</div>
							<h1><?php the_title(); ?></h1>
							<br>
							<?php echo wpautop(the_content()); ?>
							<?php 
							if(get_post()->ID == 377) {
								echo do_shortcode('[wpforms id="384" title="false"]');
							}
							?>
							<a href="javascript:void(0)" class="wq-btn_1" onclick="goBack()">Voltar</a>
							<script>
								function goBack() {
									window.history.back();
								}
							</script>
						</div>
					</div>
					<div class="wq-comentario">
						<div class="wq-titulo_1">
							<h3>Deixe seu comentario</h3>
						</div>
						<?php disqus_embed(get_post_meta( $id_disqus, 'wsg_disqus_code', true )); ?>
					</div>
				</div>
				<?php
					get_sidebar();
				?>
			</div>
		</div>
	</section>

	<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>


	<?php
		$categories = get_the_category(get_the_ID());
		if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category){
				array_push($category_ids, $individual_category->term_id);
			}
			sort($category_ids);
			$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array(get_the_ID()),
				'posts_per_page'=>3,
			);
			$my_query = new wp_query($args);
			$relacionados = $my_query->get_posts();

			if (count($relacionados) > 0) {
	?>

	<section class="wq-05">
		<div class="container">
			<div class="wq-titulo_1">
				<h3>Você também vai gostar de ler</h3>
			</div>
			<div class="row">
				<?php
					}
					foreach ($relacionados as $key => $relacionado) {
						setup_postdata($relacionado);
						$attachID = get_post_thumbnail_id($relacionado->ID);
						$author_id=$post->post_author;
						$categories = get_the_terms( $relacionado->ID, 'category' );
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
					<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12">
						<figure>
							<?php echo getImageThumb(get_post_thumbnail_id($relacionado->ID), '360x216'); ?>
						</figure>
						<div class="wq-conteudo">
							<ul class="wq-filtro">
								<li><?php echo $htmlCategory; ?></li>
								<li><?php echo get_the_date('d', $relacionado->ID); ?>.<?php echo get_the_date('m', $relacionado->ID); ?>.<?php echo get_the_date('Y', $relacionado->ID); ?></li>
								<li>Por: <?php echo get_the_author(); ?></li>
							</ul>
							<h3><?php echo $relacionado->post_title; ?></h3>
							<?php echo wpautop($relacionado->post_excerpt); ?>
							<a class="wq-btn_1" href="<?php echo get_permalink($relacionado->ID); ?>">Saiba mais</a>
						</div>
					</div>
				<?php
					} wp_reset_postdata();
					if (count($relacionados) > 0) {
				?>
			</div>
		</div>
	</section>

	<?php
			}
		}
	?>

<?php get_footer(); ?>