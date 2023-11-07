<?php
$id_logo = get_page_by_path('configuracoes-da-logo', OBJECT, 'gerais')->ID;

$id_email = get_page_by_path('email', OBJECT, 'contatos')->ID;
$id_telefones = get_page_by_path('telefones', OBJECT, 'contatos')->ID;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-N646SX2');
	</script>
	<!-- End Google Tag Manager -->



	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wp_title('|', true, 'right'); ?></title>

	<meta http-equiv="Content-Language" content="pt-br">

	<?php
	$wsg_favicon_img_id = get_post_meta($id_logo, 'wsg_favicon_img_id', true);
	if ($wsg_favicon_img_id !== NULL && strlen($wsg_favicon_img_id) > 0) {
		$wsg_favicon = wp_get_attachment_image_src($wsg_favicon_img_id);
		if ($wsg_favicon !== NULL && count($wsg_favicon) > 0) {
	?>
			<link rel="icon" href="<?php echo $wsg_favicon[0]; ?>" type="image/x-icon" />
	<?php
		}
	}
	?>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/dist/css/bootstrap-grid.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick-theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/icons/flaticon.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/lity.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">

	<?php if (is_page('sobre-nos')) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/sobre.css">

	<?php } elseif (is_post_type_archive('servicos192') || is_singular('servicos192')) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/palestras.css">

	<?php } elseif (is_post_type_archive('clientes192')) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/palestras.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/clientes.css">

	<?php } elseif (is_page('talentos')) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/palestras.css">

	<?php } elseif (is_page('contato')) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/contato.css">

	<?php } elseif (is_page('blog') || is_category() || is_search() || is_tag() || is_date() || is_single()) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/blog.css">

	<?php } ?>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/mobile.css">


	<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/bootstrap/dist/js/bootstrap.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/bootstrap/dist/js/bootstrap.bundle.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/js/slick.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/js/owl.carousel.min.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/js/carousel.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/js/lity.min.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/js/efeitos.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/js/rellax.min.js"></script>
	<script defer src="<?php bloginfo('template_url'); ?>/js/jquery.magnific-popup.min.js"></script>

	<meta name="wq_url_theme" content="<?php bloginfo('template_url'); ?>/">
	<!-- -->
	<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/js-template/sweetalert2/sweetalert2.min.css">
	<script defer src="<?php bloginfo('template_url') ?>/js-template/sweetalert2/sweetalert2.min.js"></script>
	<script defer src="<?php bloginfo('template_url') ?>/js-template/jquery.blockUI.js"></script>

	<script defer src="<?php bloginfo('template_url') ?>/js-template/jquery.maskedinput.min.js"></script>
	<script defer src="<?php bloginfo('template_url') ?>/js-template/script-template.js"></script>

	<!-- -->
	<script src='https://www.google.com/recaptcha/api.js?onload=onloadCallbackFormsRecaptcha&render=explicit' async defer></script>

	<?php wp_head(); ?>

	<?php
	$id_google = get_page_by_path('configuracoes-do-google', OBJECT, 'gerais')->ID;

	echo get_post_meta($id_google, 'pixel_de_conversao_facebook', true);
	echo get_post_meta($id_google, 'code_webmaster_tools', true);
	?>
</head>
<body>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N646SX2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<?php 
$query = array(
	'post_type'				=> array( 'pop-up' ),
	'posts_per_page' => 1,
	'tax_query' => array(
        array(
            'taxonomy' => 'escopo', // Replace with the name of your custom taxonomy.
            'field'    => 'slug', // You can change this to 'id' or 'name' depending on how you want to query the terms.
            'terms'    => 'geral' // Replace with the slug of the specific term you want to query.
		)
	)
);

$query = new WP_Query($query);

if($query->have_posts()) {
	while($query->have_posts()) {
		$query->the_post();
?>

<div class="modal fade" id="popup" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="top:20%">
    <div class="modal-content" style="background:<?= get_post_meta(get_the_ID(), 'wsg_popup_bg', true)?>;border:7px solid white;border-radius:20px;letter-spacing:-1px">
      <div class="modal-header border-0 p-0">
			<img src="<?= get_post_meta(get_the_ID(), 'wsg_popup_img', true) ?>" style="width:25%; aspect-ratio:1/1; border-radius:50%; border:7px solid white; display:block; margin:0 auto; transform:translateY(-50px)" alt="logo do pop-up">
        <button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close" style="transform:translate(-10px,10px)">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= '<pre>'.get_post_meta(get_the_ID(),'wsg_popup_txt', true).'<pre>'; ?>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <a href="<?= get_post_meta(get_the_ID(),'wsg_popup_link', true) ?>" target="_blank"><button type="button" class="btn text-uppercase font-weight-bold" style="background:<?= get_post_meta(get_the_ID(), 'wsg_popup_button_bg', true)?>;color:white;font-size:2rem;border-radius:20px;padding: 10px 20px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19)"><?= get_post_meta(get_the_ID(),'wsg_popup_button_txt', true) ?></button></a>
      </div>
    </div>
  </div>
</div>

<?php }
	} 
	wp_reset_query(); 
?>
	<header class="wq-header wq-header_horizontal">
		<div class="wq-header_top">
			<div class="container">
				<div class="row">
					<p class="wq-contato">
						<?php
						$wsg_emails = get_post_meta($id_email, 'wsg_emails', true);
						foreach ((array) $wsg_emails as $key => $email) {
						?>
							<a href="mailto:<?php echo $email; ?>" target="_blank">
								<span class="flaticon-mail-2"></span>
								<!-- <span class="flaticon-mail-1"></span> -->
								<?php echo $email; ?>
							</a>
						<?php
							if (count($wsg_emails) > 1) {
								break;
							}
						}
						?>
						<?php
						$entries = get_post_meta($id_telefones, 'wsg_telefone_items', true);

						foreach ((array) $entries as $key => $entry) {

							if (isset($entry['wsg_telefone_nmr'])) {
								$wsg_telefone_nmr = $entry['wsg_telefone_nmr'];
							}
							if (isset($entry['wsg_telefone_link'])) {
								$wsg_telefone_link = $entry['wsg_telefone_link'];
							}
							if (isset($entry['wsg_telefone_icone'])) {
								$wsg_telefone_icone = $entry['wsg_telefone_icone'];
							}
						?>
							<a href="<?php echo $wsg_telefone_link; ?>" target="_blank">
								<?php if ($wsg_telefone_icone == 'phone-1') { ?>
									<span class="flaticon-phone-2"></span>
								<?php } else { ?>
									<span class="flaticon-whatsapp-2"></span>
								<?php } ?>
								<?php echo $wsg_telefone_nmr; ?>
							</a>
						<?php
							if (count($entries) > 2) {
								break;
							}
						}
						?>
					</p>
					<ul class="wq-midias-sociais wq-lista-inline">
						<?php
						$arrayQuery_Midias_Sociais = array(
							'post_type'			=> array('redes_sociais'),
							'posts_per_page'	=> '-1',
							'orderby' 			=> 'menu_order',
							'order' 			=> 'ASC',
						);

						$query_Midias_Sociais = new WP_Query($arrayQuery_Midias_Sociais);

						while ($query_Midias_Sociais->have_posts()) {
							$query_Midias_Sociais->the_post();
						?>
							<li>
								<a href="<?php echo get_post_meta(get_the_ID(), 'wsg_redes_sociais_link', true); ?>" target="_blank">
									<span class="flaticon-<?php echo get_post_meta(get_the_ID(), 'wsg_redes_sociais_titulo', true); ?>"></span>
								</a>
							</li>
						<?php
						}
						wp_reset_query();
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="wq-header_bottom">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light header-nav">
					<div class="wq-logo navbar-brand">
						<a href="<?php bloginfo('url'); ?>/">
							<?php
							$wsg_logo_header_img_id = get_post_meta($id_logo, 'wsg_logo_header_img_id', true);
							echo getImageThumb($wsg_logo_header_img_id, 'full');
							?>
						</a>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuMobile" aria-controls="menuMobile" aria-expanded="false" aria-label="Toggle navigation">
						<span>
							<img src="<?php bloginfo('template_url') ?>/img/menu.png" alt="" title="">
						</span>
					</button>
					<div class="collapse navbar-collapse wq-menu_principal" id="menuMobile">
						<ul class="navbar-nav">
							<?php
							$menu_name = 'header-menu';
							$locations = get_nav_menu_locations();
							$menu = wp_get_nav_menu_object($locations[$menu_name]);
							$primaryNav = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
							wp_nav_menu(array(
								'menu'            => 'header-menu',
								'theme_location'  => 'header-menu',
								'container'       => '',
								'menu_class'      => 'menu',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'items_wrap'      => '%3$s',
								'depth'           => 4,
							));
							?>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</header>