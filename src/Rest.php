<?php

namespace OCS;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class Rest {
	public function __construct() {
		$this->init();
	}
	public function init() {
		add_action( 'rest_api_init', array( $this, 'register_endpoints' ) );
	}

	public function register_endpoints() {
		$builder = new ContainerBuilder();
		$builder->register( 'callbacks', '\OCS\CallBacks' );
		$callbacks = $builder->get( 'callbacks' );

		// /wp-json/sample/v1/route
		register_rest_route(
			'sample/v1',
			'route',
			array(
				'methods'             => 'GET',
				'callback'            => array( $callbacks, 'route_callback' ),
				'permission_callback' => '__return_true',
			),
		);
	}
}
