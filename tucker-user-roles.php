<?php
/*
Plugin Name: Tucker Toys User Roles
Plugin URI:
Description: Add custom user roles for Tucker International employees
Version: 0.1
Author: Kevin J. McMahon Jr.
Author URI:
License:GPLv2
*/
?>
<?php
 
function add_tucker_toys_employee_user_role() {
	function add_new_tucker_employee_role(){
		add_role('tucker_employee', 'Tucker Employee',
			array(
				'delete_others_pages' => true,
				'delete_others_posts' => true,
				'delete_pages' => true,
				'delete_posts' => true,
				'delete_private_pages' => true,
				'delete_private_posts' => true,
				'delete_published_pages' => true,
				'delete_published_posts' => true,
				'edit_others_poages' => true,
				'edit_others_posts' => true,
				'edit_pages' => true,
				'edit_posts' => true,
				'edit_private_pages' => true,
				'edit_private_posts' => true,
				'read' => true,
				'upload_files' => true,
			)
		);
	}
	if ( is_multisite() && $network_wide ) { 

        global $wpdb;

        foreach ($wpdb->get_col("SELECT blog_id FROM $wpdb->blogs") as $blog_id) {
            switch_to_blog($blog_id);
			add_new_tucker_employee_role();
            restore_current_blog();
        } 

    } else {
        add_new_tucker_employee_role();
    }
}
register_activation_hook( __FILE__, 'add_tucker_toys_employee_user_role' );
?>