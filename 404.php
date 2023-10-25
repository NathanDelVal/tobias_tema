<?php
	get_header();

	$id_page = get_page_by_path( 'home', OBJECT, 'page' )->ID;
?>

	<section class="wq-404">
		<div class="wq-cto">
			<h1>Erro 404 - Página não encontrada.</h1>
			<a href="javascript:void(0)" class="wq-btn_1" onclick="goBack()">Voltar</a>
		</div>
	</section>

	<script>
		function goBack() {
			window.history.back();
		}
	</script>

	<?php include "inc-newsletter.php"; ?>

<?php get_footer(); ?>