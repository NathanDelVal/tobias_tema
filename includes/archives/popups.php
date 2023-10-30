<?php

	add_action( 'cmb2_admin_init', 'metaboxes_popup' );

	function metaboxes_popup() {

		// Detalhes do solucão
		$popup_item = new_cmb2_box( array(
			'id'            => 'popup_item',
			'title'         => __( 'Detalhes do Pop-up' ),
			'object_types'  => array( 'pop-up', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

        $popup_item->add_field( array(
			'name'       => __( 'Imagem do Pop-up' ),
			// 'desc'       => __( 'Tamanho recomendado <strong>540x380</strong>' ),
			'id'         => 'wsg_popup_img',
			'type' => 'file',
			'preview_size' => array( 380/1, 380/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );

        $popup_item->add_field( array(
			'name'       => __( 'Texto CTA' ),
			'id'         => 'wsg_popup_txt',
			'type' => 'wysiwyg',
		) );

        $popup_item->add_field( array(
			'name'       => __( 'Texto do botão do Pop-up' ),
			'id'         => 'wsg_popup_button_txt',
			'type' => 'text',
		) );

        $popup_item->add_field( array(
			'name'       => __( 'Link do botão' ),
			'id'         => 'wsg_popup_link',
			'type' => 'text',
		) );
        $popup_item->add_field( array(
			'name'       => __( 'Cor de fundo em HEX (exemplo: #FFFFFF)' ),
			'id'         => 'wsg_popup_bg',
			'type' => 'text',
		) );
        $popup_item->add_field( array(
			'name'       => __( 'Cor do botão em HEX (exemplo: #FFFFFF)' ),
			'id'         => 'wsg_popup_button_bg',
			'type' => 'text',
		) );
    }

    ?>