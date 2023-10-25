<?php $id_home = get_page_by_path( 'home', OBJECT, 'page' )->ID; ?>

	<section class="wq-08">
		<div class="container">
			<div class="wq-titulo_1 wq-cto">
				<h3><?php echo get_post_meta( $id_home, 'wsg_videos_titulo', true ); ?></h3>
			</div>
			<div class="wq-carousel_youtube">
				<?php
					$wsg_videos_na_home = get_post_meta( $id_page, 'wsg_videos_na_home', true );

					$arrayQueryServicos = array(
						'post_type'				=> array( 'videos192' ),
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'posts_per_page'		=> '-1',
						'post__in'				=> $wsg_videos_na_home
					);
					$queryServicos = new WP_Query($arrayQueryServicos);
					while ( $queryServicos->have_posts()) {
						$queryServicos->the_post();
				?>
					<div>
						<div class="wq-youtube_item">
							<?php echo get_post_meta( get_the_ID(), 'wsg_video_item_iframe', true ); ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>