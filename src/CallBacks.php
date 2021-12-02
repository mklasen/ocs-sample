<?php
// src/DemoService.php
namespace OCS;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class CallBacks {

	public function __construct( ContainerBuilder $builder ) {
		$this->builder = $builder;
		$this->builder->register( 'filters', '\OCS\Filters' );
	}

	public function route_callback() {
		// Get filter methods
		$filters = $this->builder->get( 'filters' );

		// Set initial data.
		$output = array( 'message' => 'I live in another file.' );

		// Filter data using $filters method.
		$output = $filters->filter_data( $output );

		return $output;
	}
}
