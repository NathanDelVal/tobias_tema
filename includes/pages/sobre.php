<?php

	add_action( 'cmb2_admin_init', 'metaboxes_sobre' );

	function metaboxes_sobre() {

		// Método de especificação de página
		$sobrePage = get_page_by_path( 'sobre-nos', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($sobrePage && $sobrePage->ID != $post_id){
			return;
		}

		// Metabox Sobre
		$sobre_01 = new_cmb2_box( array(
			'id'            => 'sobre_01',
			'title'         => __( 'Sobre nós' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$sobre_01->add_field( array(
			'name'       => __( 'Imagem da seção' ),
			'desc'       => __( 'Tamanho recomendado <strong>560x680</strong>' ),
			'id'         => 'wsg_sobre_01_img',
			'type' => 'file',
			'preview_size' => array( 560/2, 680/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$sobre_01->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_sobre_01_titulo',
			'type'       => 'text',
		) );
		$sobre_01->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_sobre_01_conteudo',
			'type'       => 'wysiwyg',
		) );
		$sobre_01->add_field( array(
			'name'       => __( 'Link do botão da seção' ),
			'id'         => 'wsg_sobre_01_btn_link',
			'type'       => 'text',
		) );
		$sobre_01->add_field( array(
			'name'       => __( 'Texto do botão da seção' ),
			'id'         => 'wsg_sobre_01_btn_text',
			'type'       => 'text',
		) );

		// Metabox Carossel de imagens
		$sobre_02 = new_cmb2_box( array(
			'id'            => 'sobre_02',
			'title'         => __( 'Carossel de imagens' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$sobre_02->add_field( array(
			'name'       => __( 'Imagem da seção' ),
			'desc'       => __( 'Tamanho recomendado <strong>560x480</strong>' ),
			'id'         => 'wsg_sobre_02_imgs',
			'type' => 'file_list',
			'preview_size' => array( 560/2, 480/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		// Metabox Sobre
		$sobre_footer = new_cmb2_box( array(
			'id'            => 'sobre_footer',
			'title'         => __( 'Rodapé' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$sobre_footer->add_field( array(
			'name'       => __( 'Copyright do rodapé' ),
			'id'         => 'wsg_sobre_footer_copyright',
			'type'       => 'wysiwyg',
		) );


	}

?>