<?php

	// add_action( 'cmb2_admin_init', 'metaboxes_clientes' );

	function metaboxes_clientes() {
		$cliente_item = new_cmb2_box( array(
			'id'            => 'cliente_item',
			'title'         => __( 'Detalhes do cliente' ),
			'object_types'  => array( 'clientes192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$cliente_item->add_field( array(
			'name'       => __( 'Imagem do cliente' ),
			'desc'       => __( 'Tamanho recomendado <strong>220x90</strong>' ),
			'id'         => 'wsg_cliente_item_img',
			'type' => 'file',
			'preview_size' => array( 220/1, 90/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$cliente_item->add_field( array(
			'name'       => __( 'Link do cliente' ),
			'id'         => 'wsg_cliente_item_link',
			'type'       => 'text',
		) );


		// Método de especificação de página
		$projetosPage = get_page_by_path( 'clientes', OBJECT, 'page' );

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

		// Metabox Clientes
		$servico_01 = new_cmb2_box( array(
			'id'            => 'servico_01',
			'title'         => __( 'Clientes' ),
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