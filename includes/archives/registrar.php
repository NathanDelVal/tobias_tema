<?php

// Meus posts types
	function meus_post_types(){

		// Serviços
		register_post_type('servicos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Serviços'),
					'singular_name'	=> _x('Serviço', 'post type singular name'),
					'add_new'		=> _x('Nova serviço', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar nova serviço', 'portfolio item'),
					'edit_item'		=> _x('Editar serviço', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'servicos'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-post',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

		// Vídeos
		register_post_type('videos192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Vídeos'),
					'singular_name'	=> _x('vídeo', 'post type singular name'),
					'add_new'		=> _x('Nova vídeo', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar nova vídeo', 'portfolio item'),
					'edit_item'		=> _x('Editar vídeo', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'videos'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-admin-post',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

		// Unidades
		register_post_type('unidades192',
			array(
				'labels' 			=> array(
					'name' 			=> __('Unidades'),
					'singular_name'	=> _x('unidade', 'post type singular name'),
					'add_new'		=> _x('Novo unidade', 'portfolio item'),
					'add_new_item'	=> _x('Adicionar novo unidade', 'portfolio item'),
					'edit_item'		=> _x('Editar unidade', 'portfolio item'),
				),
				'rewrite' 			=> array('slug' => 'unidades'),
				'public' 			=> true,
				'has_archive' 		=> true,
				'menu_icon' 		=> 'dashicons-location',
				'supports' 			=> array('title', 'page-attributes'),
			)
		);

	}
	add_action('init', 'meus_post_types');

?>