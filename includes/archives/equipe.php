<?php

	add_action( 'cmb2_admin_init', 'metaboxes_equipe' );

	function metaboxes_equipe() {
		$equipe_item = new_cmb2_box( array(
			'id'            => 'equipe_item',
			'title'         => __( 'Detalhes do integrante da equipe' ),
			'object_types'  => array( 'equipe192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$equipe_item->add_field( array(
			'name'       => __( 'Imagem do integrante' ),
			'desc'       => __( 'Tamanho recomendado <strong>400x400</strong>' ),
			'id'         => 'wsg_equipe_item_img',
			'type' => 'file',
			'preview_size' => array( 400/1, 400/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		$equipe_item->add_field( array(
			'name'       => __( 'Cargo do integrante' ),
			'id'         => 'wsg_equipe_item_cargo',
			'type'       => 'text',
		) );

		$equipe_item->add_field( array(
			'name'       => __( 'Link do linkedin' ),
			'id'         => 'wsg_equipe_item_linkedin',
			'type'       => 'text',
		) );


	}

?>