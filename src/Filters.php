<?php
// src/Filters.php
namespace OCS;

class Filters {
	public function filter_data( $output ) {
		$output['filter'] = 'I just filtered.';
		return $output;
	}
}
