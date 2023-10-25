<?php

	add_action( 'cmb2_admin_init', 'metaboxes_servicos' );

	function metaboxes_servicos() {

		// Detalhes do solucão
		$servico_item = new_cmb2_box( array(
			'id'            => 'servico_item',
			'title'         => __( 'Detalhes do solucão' ),
			'object_types'  => array( 'servicos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$servico_item->add_field( array(
			'name'       => __( 'Imagem do solucão' ),
			'desc'       => __( 'Tamanho recomendado <strong>540x380</strong>' ),
			'id'         => 'wsg_servico_item_img',
			'type' => 'file',
			'preview_size' => array( 540/1, 380/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$servico_item->add_field( array(
			'name'       => __( 'Resumo do solucão' ),
			'id'         => 'wsg_servico_item_resumo',
			'type'       => 'wysiwyg',
		) );

		// Página do solucão
		$servico_interna = new_cmb2_box( array(
			'id'            => 'servico_interna',
			'title'         => __( 'Página do solucão' ),
			'object_types'  => array( 'servicos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );
		$servico_interna->add_field( array(
			'name'       => __( 'Imagem do solucão' ),
			// 'desc'       => __( 'Tamanho recomendado <strong>500x500</strong>' ),
			'id'         => 'wsg_servico_interna_img',
			'type' => 'file',
			// 'preview_size' => array( 500/2, 500/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$servico_interna->add_field( array(
			'name'       => __( 'Título do conteúdo' ),
			'id'         => 'wsg_servico_interna_titulo',
			'type'       => 'text',
		) );
		$servico_interna->add_field( array(
			'name'       => __( 'Conteúdo do solucão' ),
			'id'         => 'wsg_servico_interna_conteudo',
			'type'       => 'wysiwyg',
		) );

		// Método de especificação de página
		$projetosPage = get_page_by_path( 'servicos', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($projetosPage && $projetosPage->ID != $post_id){
			return;
		}

		// Metabox Solucões
		$servico_01 = new_cmb2_box( array(
			'id'            => 'servico_01',
			'title'         => __( 'Solucões' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$servico_01->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_servicos_01_titulo',
			'type'       => 'text',
		) );

		$servico_01->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_servicos_01_texto',
			'type'       => 'wysiwyg',
		) );

	}

?>