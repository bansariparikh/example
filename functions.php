<?php
if(!function_exists('enqueueStyle')) {
    function enqueueParentStyle() {
        wp_enqueue_style(
            'parent_style',
            get_template_directory_uri().'/style.css'
        );
    }
}
add_action('wp_enqueue_scripts','enqueueParentStyle');