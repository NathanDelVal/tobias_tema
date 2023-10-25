<?php
	get_header();

	$id_page = get_page_by_path( 'servicos', OBJECT, 'page' )->ID;
	$id_contato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$wsg_contato_widget = get_post_meta($id_contato, 'wsg_contato_widget', true);
?>

	<?php include "inc-breadcrumbs.php"; ?>

	<section class="wq-01-palestra-interna">
		<div class="container">
			<div class="row">
				<div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
					<div class="wq-conteudo">
						<div class="wq-titulo_1">
							<h2><?php echo get_post_meta( get_the_ID(), 'wsg_servico_interna_titulo', true ); ?></h2>
						</div>
						<?php echo wpautop(get_post_meta( get_the_ID(), 'wsg_servico_interna_conteudo', true )); ?>
					</div>
				</div>
				<aside class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
					<figure>
						<?php
							$wsg_servico_interna_img_id = get_post_meta( get_the_ID(), 'wsg_servico_interna_img_id', true );
							getImageThumb($wsg_servico_interna_img_id,'full');
						?>
					</figure>
				</aside>
			</div>
		</div>
	</section>

	<section class="wq-form_servicos wq-conteudo">
		<div class="container">
			<div class="wq-wrapper">
				<div class="wq-titulo_1">
					<h3>Entre em contato</h3>
				</div>
				<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

					<input type="hidden" name="subject_email" value="Enviado pelo site">
					<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página: <?php the_title(); ?>">

					<input type="hidden" name="label-send-data-name" value="Nome">
					<input required type="text" name="send-data-name" placeholder="Qual é o seu nome?">

					<input type="hidden" name="label-send-data-email" value="Email">
					<input required type="email" name="send-data-email" placeholder="Qual é o seu melhor email?">

					<input type="hidden" name="label-send-data-phone" value="Telefone">
					<input required type="text" name="send-data-phone" placeholder="Qual é o seu telefone?" class="inputphone">

					<input type="hidden" name="label-send-data-message" value="Mensagem">
					<textarea placeholder="Sua mensagem" name="send-data-message"></textarea>

					<?php if (strlen($wsg_contato_widget) > 0) { ?>
						<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible"></div>
					<?php } ?>

					<button type="submit" class="wq-btn_1">Enviar</button>
				</form>
			</div>
		</div>
	</section>

<?php get_footer(); ?>