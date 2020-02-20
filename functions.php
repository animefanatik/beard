<?php
// Remove useless scripts
remove_action('wp_head', 'rsd_link'); 
remove_action('wp_head', 'wp_generator'); 
remove_action('wp_head', 'feed_links', 2); 
remove_action('wp_head', 'feed_links_extra', 3); 
remove_action('wp_head', 'index_rel_link'); 
remove_action('wp_head', 'wlwmanifest_link'); 
remove_action('wp_head', 'start_post_rel_link', 10, 0); 
remove_action('wp_head', 'parent_post_rel_link', 10, 0); 
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); 
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Move scripts to bottom 
function remove_head_scripts() {
   remove_action('wp_head', 'wp_print_scripts');
   remove_action('wp_head', 'wp_print_head_scripts', 9);
   remove_action('wp_head', 'wp_enqueue_scripts', 1);
   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

// Remove useless: script type 
add_action( 'template_redirect', function(){
    ob_start( function( $cleanCode ){
        $cleanCode = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $cleanCode );

        // Also works with other attributes...
        $cleanCode = str_replace( array( 'type="text/css"', "type='text/css'" ), '', $cleanCode );
        $cleanCode = str_replace( array( 'frameborder="0"', "frameborder='0'" ), '', $cleanCode );
        $cleanCode = str_replace( array( 'scrolling="no"', "scrolling='no'" ), '', $cleanCode );

        return $cleanCode;
    });
});

// Remove query strings.
function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

