<?php
	$id_home = get_page_by_path( 'home', OBJECT, 'page' )->ID;
	$id_contato = get_page_by_path( 'contato', OBJECT, 'page' )->ID;

	$wsg_contato_widget = get_post_meta($id_contato, 'wsg_contato_widget', true);
?>

	<section class="wq-06">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
					<div class="wq-titulo_1">
						<h3><?php echo get_post_meta( $id_home, 'wsg_newsletter_titulo', true ); ?></h3>
					</div>
				</div>
				<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
					<div class="wq-form">
						<form action="#" onsubmit="return submitFormWithRecaptcha(this);" class="contact-form" method="POST">

							<input type="hidden" name="subject_email" value="Newsletter enviado pelo site">
							<?php if (is_post_type_archive('servicos192')) { ?>
								<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página de serviços">
							<?php } elseif (is_post_type_archive('eventos192')) { ?>
								<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página de eventos">
							<?php } else{ ?>
								<input required type="hidden" name="title_email" value="Contato enviado pelo formulário da página: <?php the_title(); ?>">
							<?php } ?>

							<div class="wq-form_wrapper">
								<div>
									<input type="hidden" name="label-send-data-name" value="Nome">
									<input required type="text" name="send-data-name" placeholder="Nome">
								</div>

								<div>
									<input type="hidden" name="label-send-data-phone" value="Telefone">
									<input required type="text" name="send-data-phone" placeholder="Telefone/Celular" class="inputphone">
								</div>

								<div>
									<input type="hidden" name="label-send-data-email" value="Email">
									<input required type="email" name="send-data-email" placeholder="Email">
								</div>

								<div>
									<input type="hidden" name="label-send-data-assunto" value="Assunto">
									<input required type="text" name="send-data-assunto" placeholder="Assunto">
								</div>
							</div>

							<input type="hidden" name="label-send-data-message" value="Mensagem">
							<textarea placeholder="Sua mensagem" name="send-data-message"></textarea>

							<?php if (strlen($wsg_contato_widget) > 0) { ?>
								<div class="g-recaptcha invisible-recaptcha" id="recaptcha-<?php echo md5(uniqid(rand(), true)); ?>" data-sitekey="<?php echo $wsg_contato_widget; ?>" data-size="invisible" data-badge="bottomleft"></div>
							<?php } ?>

							<button type="submit" class="wq-btn_1">Enviar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>