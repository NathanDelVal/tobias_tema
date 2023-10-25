<?php

	add_action( 'cmb2_admin_init', 'metaboxes_videos' );

	function metaboxes_videos() {
		$video_item = new_cmb2_box( array(
			'id'            => 'video_item',
			'title'         => __( 'Detalhes do video' ),
			'object_types'  => array( 'videos192', ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true,
			'closed'        => false,
		) );

		$video_item->add_field( array(
			'name'       => __( 'Iframe do video' ),
			'id'         => 'wsg_video_item_iframe',
			'type'       => 'textarea_code',
		) );


	}

?>