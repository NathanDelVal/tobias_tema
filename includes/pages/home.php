<?php

	add_action( 'cmb2_admin_init', 'metaboxes_home' );

	function metaboxes_home() {

		// Método de especificação de página
		$homePage = get_page_by_path( 'home', OBJECT, 'page' );

		$post_id;

		if (isset($_GET['post'])) {
			$post_id = $_GET['post'];
		}else if(isset($_POST['post_ID'])) {
			$post_id = $_POST['post_ID'];
		}
		if( !isset( $post_id ) ) return;

		if($homePage && $homePage->ID != $post_id){
			return;
		}

		// Metabox Banner
		$banner = new_cmb2_box( array(
			'id'            => 'banners',
			'title'         => __( 'Banners' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$banner_items = $banner->add_field( array(
			'id'            => 'banner_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Imagem do banner' ),
			'desc'       => __( 'Tamanho recomendado <strong>1920x490</strong>' ),
			'id'         => 'wsg_banner_items_img',
			'type' => 'file',
			'preview_size' => array( 1920/5, 490/5 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Imagem do banner' ),
			'desc'       => __( 'Tamanho recomendado <strong>1000x764</strong>' ),
			'id'         => 'wsg_banner_items_mobile_img',
			'type' => 'file',
			'preview_size' => array( 1000/2, 764/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Link do banner' ),
			'id'         => 'wsg_banner_items_link',
			'type'       => 'text',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Título do banner' ),
			'id'         => 'wsg_banner_items_titulo',
			'type'       => 'text',
		) );
		$banner->add_group_field( $banner_items, array(
			'name'       => __( 'Texto do banner' ),
			'id'         => 'wsg_banner_items_texto',
			'type'       => 'wysiwyg',
		) );

		// Metabox Estatísticas
		$call_to_action_1 = new_cmb2_box( array(
			'id'            => 'call_to_action_1',
			'title'         => __( 'Estatísticas' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$call_to_action_1->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_call_to_action_1_titulo',
			'type'       => 'text',
		) );
		$cta_items = $call_to_action_1->add_field( array(
			'id'            => 'cta_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$call_to_action_1->add_group_field( $cta_items, array(
			'name'       => __( 'Antes do valor' ),
			'id'         => 'wsg_cta_items_valor_pre',
			'type'       => 'text',
		) );
		$call_to_action_1->add_group_field( $cta_items, array(
			'name'       => __( 'Valor do item' ),
			'id'         => 'wsg_cta_items_valor',
			'type'       => 'text',
		) );
		$call_to_action_1->add_group_field( $cta_items, array(
			'name'       => __( 'Depois do valor' ),
			'id'         => 'wsg_cta_items_valor_suf',
			'type'       => 'text',
		) );
		$call_to_action_1->add_group_field( $cta_items, array(
			'name'       => __( 'legenda do item' ),
			'id'         => 'wsg_cta_items_legenda',
			'type'       => 'text',
		) );

		// Metabox Sobre
		$sobre = new_cmb2_box( array(
			'id'            => 'sobre',
			'title'         => __( 'Sobre nós' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$sobre->add_field( array(
			'name'       => __( 'Imagem da seção' ),
			'desc'       => __( 'Tamanho recomendado <strong>560x680</strong>' ),
			'id'         => 'wsg_sobre_img',
			'type' => 'file',
			'preview_size' => array( 560/1, 680/1 ),
			'query_args' => array( 'type' => 'image' ),
		) );
		$sobre->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_sobre_titulo',
			'type'       => 'text',
		) );
		$sobre->add_field( array(
			'name'       => __( 'texto da seção' ),
			'id'         => 'wsg_sobre_texto',
			'type'       => 'wysiwyg',
		) );


		// Metabox Carossel de imagens
		$galeria = new_cmb2_box( array(
			'id'            => 'galeria',
			'title'         => __( 'Carossel de imagens' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$galeria->add_field( array(
			'name'       => __( 'Imagem da seção' ),
			'desc'       => __( 'Tamanho recomendado <strong>560x480</strong>' ),
			'id'         => 'wsg_galeria_imgs',
			'type' => 'file_list',
			'preview_size' => array( 560/2, 480/2 ),
			'query_args' => array( 'type' => 'image' ),
		) );

		// Metabox Serviços
		$servicos = new_cmb2_box( array(
			'id'            => 'servicos',
			'title'         => __( 'Serviços' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$servicos->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_servicos_titulo',
			'type'       => 'text',
		) );
		$servicos->add_field( array(
			'name'       => __( 'Texto da seção' ),
			'id'         => 'wsg_servicos_texto',
			'type'       => 'wysiwyg',
		) );
		$servicos->add_field( array(
			'name'    => __( 'Listagem de serviços' ),
			'desc'    => __( 'Arraste os serviços da coluna da esquerda para a da direita para anexá-lo. <br/>Você pode reorganizar a ordem dos serviços na coluna da direita arrastando e soltando.'),
			'id'      => 'wsg_servicos_na_home',
			'type'    => 'custom_attached_posts',
			'column'  => false,
			'options' => array(
				'show_thumbnails' => true,
				'filter_boxes'    => true,
				'query_args'      => array(
					'posts_per_page' => -1,
					'post_type'      => 'servicos192',
				),
			),
		) );

		// Metabox Perguntas frequentes
		$faq = new_cmb2_box( array(
			'id'            => 'faq',
			'title'         => __( 'Perguntas frequentes' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$faq->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_faq_titulo',
			'type'       => 'text',
		) );

		$faq_01_items = $faq->add_field( array(
			'name'          => __( 'Primeira Coluna' ),
			'id'            => 'faq_01_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$faq->add_group_field( $faq_01_items, array(
			'name'       => __( 'Título do item' ),
			'id'         => 'wsg_faq_01_items_titulo',
			'type'       => 'text',
		) );
		$faq->add_group_field( $faq_01_items, array(
			'name'       => __( 'Texto do item' ),
			'id'         => 'wsg_faq_01_items_texto',
			'type'       => 'wysiwyg',
		) );

		$faq_02_items = $faq->add_field( array(
			'name'          => __( 'Segunda Coluna' ),
			'id'            => 'faq_02_items',
			'type'          => 'group',
			'options'       => array(
				'group_title'   => __( 'Item {#}' ),
				'add_button'    => __( 'Adicionar Outro Item' ),
				'remove_button' => __( 'Remover Item' ),
				'sortable'      => true,
				'closed'        => true,
			),
		) );
		$faq->add_group_field( $faq_02_items, array(
			'name'       => __( 'Título do item' ),
			'id'         => 'wsg_faq_02_items_titulo',
			'type'       => 'text',
		) );
		$faq->add_group_field( $faq_02_items, array(
			'name'       => __( 'Texto do item' ),
			'id'         => 'wsg_faq_02_items_texto',
			'type'       => 'wysiwyg',
		) );

		// Metabox Vídeos
		$videos = new_cmb2_box( array(
			'id'            => 'videos',
			'title'         => __( 'Vídeos' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$videos->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_videos_titulo',
			'type'       => 'text',
		) );
		$videos->add_field( array(
			'name'    => __( 'Listagem de vídeos' ),
			'desc'    => __( 'Arraste os vídeos da coluna da esquerda para a da direita para anexá-lo. <br/>Você pode reorganizar a ordem dos vídeos na coluna da direita arrastando e soltando.'),
			'id'      => 'wsg_videos_na_home',
			'type'    => 'custom_attached_posts',
			'column'  => false,
			'options' => array(
				'show_thumbnails' => true,
				'filter_boxes'    => true,
				'query_args'      => array(
					'posts_per_page' => -1,
					'post_type'      => 'videos192',
				),
			),
		) );


		// Metabox Instagram
		$instagram = new_cmb2_box( array(
			'id'            => 'instagram',
			'title'         => __( 'Instagram' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$instagram->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_instagram_titulo',
			'type'       => 'text',
		) );

		// Metabox Últimas do blog
		$blog = new_cmb2_box( array(
			'id'            => 'blog',
			'title'         => __( 'Últimas do blog' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );

		$blog->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_blog_titulo',
			'type'       => 'text',
		) );
		$blog->add_field( array(
			'name'       => __( 'Link do botão da seção' ),
			'id'         => 'wsg_blog_01_btn_link',
			'type'       => 'text',
		) );
		$blog->add_field( array(
			'name'       => __( 'Texto do botão da seção' ),
			'id'         => 'wsg_blog_01_btn_text',
			'type'       => 'text',
		) );


		// Metabox Newsletter
		$newsletter = new_cmb2_box( array(
			'id'            => 'newsletter',
			'title'         => __( 'Newsletter' ),
			'object_types'  => array( 'page', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => true,
		) );
		$newsletter->add_field( array(
			'name'       => __( 'Título da seção' ),
			'id'         => 'wsg_newsletter_titulo',
			'type'       => 'text',
		) );

	}

?>