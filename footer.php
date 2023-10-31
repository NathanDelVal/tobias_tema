<?php
	$id_sobre = get_page_by_path( 'sobre-nos', OBJECT, 'page' )->ID;
	$id_admin = get_page_by_path( 'slug-outras-info', OBJECT, 'adminpanel' )->ID;

	$id_logo = get_page_by_path( 'configuracoes-da-logo', OBJECT, 'gerais' )->ID;
	$id_telefones = get_page_by_path( 'telefones', OBJECT, 'contatos' )->ID;
	$id_email = get_page_by_path( 'email', OBJECT, 'contatos' )->ID;
	$id_endereco = get_page_by_path( 'endereco', OBJECT, 'contatos' )->ID;
?>

	<footer class="wq-footer">
		<div class="wq-footer_top">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
						<div class="wq-logo">
							<a href="<?php bloginfo('url'); ?>/">
								<?php
									$wsg_logo_footer_img_id = get_post_meta( $id_logo, 'wsg_logo_footer_img_id', true );
									echo getImageThumb($wsg_logo_footer_img_id, 'full');
								?>
							</a>
						</div>
						<ul class="wq-midias-sociais wq-lista-inline">
							<?php
								$arrayQuery_Midias_Sociais = array(
									'post_type'			=> array( 'redes_sociais' ),
									'posts_per_page'	=> '-1',
									'orderby' 			=> 'menu_order',
									'order' 			=> 'ASC',
								);

								$query_Midias_Sociais = new WP_Query($arrayQuery_Midias_Sociais);

								while ( $query_Midias_Sociais->have_posts()) {
									$query_Midias_Sociais->the_post();
							?>
								<li>
									<a href="<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_link', true ); ?>" target="_blank">
										<span class="flaticon-<?php echo get_post_meta( get_the_ID(), 'wsg_redes_sociais_titulo', true); ?>"></span>
									</a>
								</li>
							<?php
								} wp_reset_query();
							?>
						</ul>								
							<div class="selo__atom">
								<figure>
									<img src="<?php bloginfo( 'template_url' ); ?>/img/atom_selo.png" alt="">
								</figure>
							</div>
					</div>
					<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
						<h4>
							<?php
								$menu_location = 'footer-menu';
								$menu_locations = get_nav_menu_locations();
								$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
								$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
								echo esc_html($menu_name);
							?>
						</h4>
						<ul class="navbar-nav wq-menu_footer">
							<?php
								$menu_name = 'footer-menu';
								$locations = get_nav_menu_locations();
								$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
								$primaryNav = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
								wp_nav_menu( array(
									'menu'            => 'footer-menu',
									'theme_location'  => 'footer-menu',
									'container'       => '',
									'menu_class'      => 'menu',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'items_wrap'      => '%3$s',
									'depth'           => 4,
								) );
							?>
						</ul>

					</div>
					<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
						<h4>Contato</h4>
						<ul class="wq-footer_contatos">
							<?php
								$wsg_emails = get_post_meta( $id_email, 'wsg_emails', true );
								foreach ( (array) $wsg_emails as $key => $email ) {
							?>
								<li>
									<a href="mailto:<?php echo $email; ?>" target="_blank" <?php echo get_post_meta( $id_email, 'wsg_emails_onclick', true ); ?> >
										<span class="flaticon-mail-1"></span>
										<p>
											<span>Email</span>
											<?php echo $email; ?>
										</p>
									</a>
								</li>
							<?php
									if (count($wsg_emails) > 1) {
										break;
									}
								}
							?>
							<?php
								$entries = get_post_meta( $id_telefones, 'wsg_telefone_items', true );

								foreach ( (array) $entries as $key => $entry ) {

									if ( isset( $entry['wsg_telefone_nmr'] ) ) {
										$wsg_telefone_nmr = $entry['wsg_telefone_nmr'];
									}
									if ( isset( $entry['wsg_telefone_link'] ) ) {
										$wsg_telefone_link = $entry['wsg_telefone_link'];
									}
									if ( isset( $entry['wsg_telefone_icone'] ) ) {
										$wsg_telefone_icone = $entry['wsg_telefone_icone'];
									}
									if ( isset( $entry['wsg_telefone_onclick'] ) ) {
										$wsg_telefone_onclick = $entry['wsg_telefone_onclick'];
									}
							?>
								<li>
									<a href="<?php echo $wsg_telefone_link; ?>" target="_blank" <?php echo $wsg_telefone_onclick; ?> >
										<?php if ( $wsg_telefone_icone == "phone-1" ){ ?>
											<span class="flaticon-phone-1"></span>
											<p>
												<span>Telefone</span>
										<?php } else { ?>
											<span class="flaticon-whatsapp-1"></span>
											<p>
												<span>Whatsapp</span>
										<?php } ?>
											<?php echo $wsg_telefone_nmr; ?>
										</p>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
						<h4>Unidades</h4>
						<ul class="wq-footer_contatos">
							<?php
								$arrayQueryUnidades = array(
									'post_type'				=> array( 'unidades192' ),
									'orderby' => 'menu_order',
									'order' => 'ASC',
									'posts_per_page'		=> '-1',
								);
								$queryUnidades = new WP_Query($arrayQueryUnidades);
								while ( $queryUnidades->have_posts()) {
									$queryUnidades->the_post();
							?>
								<li>
									<a href="<?php echo get_post_meta( get_the_ID(), 'wsg_unidades_item_endereco_link', true ); ?>">
										<span class="flaticon-placeholder-1"></span>
										<p>
											<span><?php the_title(); ?></span>
											<?php echo get_post_meta( get_the_ID(), 'wsg_unidades_item_endereco', true ); ?>
										</p>
									</a>
								</li>
							<?php }wp_reset_query(); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="wq-copyright">
			<div class="container">
				<div class="row">
					<?php echo wpautop(get_post_meta( $id_sobre, 'wsg_sobre_footer_copyright', true )); ?>
					<!-- <a href="https://transparencyreport.google.com/safe-browsing/search?url=https:%2F%2Ftobiasamaral.com.br%2F">
						<img src="<?php bloginfo('template_url') ?>/google.png" alt="Selo de Qualidade do Google">
					</a> -->
					<?php echo wpautop(get_post_meta( $id_admin, 'agency_setting_footer_site_content', true )); ?>
				</div>
			</div>
		</div>
	</footer>

	<?php
		$id_google = get_page_by_path( 'configuracoes-do-google', OBJECT, 'gerais' )->ID;

		echo get_post_meta( $id_google, 'script_analytics', true );
	?>

	<script src="<?php bloginfo('template_url') ?>/js-template/footer-load.js"></script>

	<?php wp_footer(); ?>

	<?php
		$wsg_whatsapp_popup_link = get_post_meta( $id_telefones, 'wsg_whatsapp_popup_link', true );
		if ( !empty($wsg_whatsapp_popup_link) ) {
	?>
		<div class="wq-whatsapp_btn">
			<a href="<?php echo $wsg_whatsapp_popup_link; ?>" target="_blank">
				<span class="flaticon-whatsapp-2"></span>
			</a>
		</div>
	<?php } ?>
<script>
	$(function() {
		if(!window.sessionStorage.getItem('visited')) {
			$('#popup').modal('show');
			window.sessionStorage.setItem('visited', 'y');
		}
	})
</script>
</body>
</html>