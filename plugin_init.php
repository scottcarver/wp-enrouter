<?php
   /*
   Plugin Name: WP Enrouter
   Plugin URI: https://github.com/scottcarver/wp-enrouter
   description: Wraps CustomRoute Class in a plugin for reuse, with examples.
   Version: 0.0.1
   Author: Sam, Scott
   */


   
  // Check that the class exists before trying to use it
  if (!class_exists('CustomRoutes')) {
    require('CustomRoutes.php');
  }

  // Instantiate Route Object
  $theme_routes = new CustomRoutes();

  // Create Route with two Regex capture groups
  $theme_routes->addRoute(
      "^map/([^/]*)/([^/]*)/?",
      'api_callback',
      plugin_dir_path(__FILE__) . 'plugin_template.php',
      array('param1' => 1, 'param2' => 2,)
  );

  // Make URL Data Available to Template
  function api_callback($param1, $param2){
    set_query_var('country', $param1);
    set_query_var('language', $param2);
  }
  
  // Flush Routes
  $theme_routes->forceFlush();
  
?>