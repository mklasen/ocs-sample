<?php
/**
 * Plugin Name: Optimised Code Structure
 */

namespace OCS;

use Symfony\Component\DependencyInjection\ContainerBuilder;

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

$builder = new ContainerBuilder();

new Rest( $builder );
