<?php

namespace OCS;

class Rest {

	private $builder;

	public function __construct( $builder ) {
		$this->builder = $builder;
		$this->init();
	}
	public function init() {
		add_action( 'rest_api_init', array( $this, 'register_endpoints' ) );
	}

	public function register_endpoints() {
		$this->builder->register( 'callbacks', '\OCS\CallBacks' )
			->addArgument( $this->builder );

		// /wp-json/sample/v1/route
		register_rest_route(
			'sample/v1',
			'route',
			array(
				'methods'             => 'GET',
				'callback'            => array( $this->builder->get( 'callbacks' ), 'route_callback' ),
				'permission_callback' => '__return_true',
			),
		);
	}
}
