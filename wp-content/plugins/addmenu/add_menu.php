<?php
/*
Plugin Name: Add Menu
Description: Add menu plugin for adding a new link to admin menu
Author: Vineetha
Version: 0.1
*/
  add_action('admin_menu', 'add_link_save_leads');

  function add_link_save_leads()
  {
    add_menu_page( 'Add Menu', 'Leads', 'manage_options', 'test-plugin', 'list_leads' );
  }
 
          function list_leads(){
	
           global $wpdb;
		   
           $posts = $wpdb->get_results("SELECT * FROM sfcontactleads ORDER BY id DESC");
   
  ?>
  <h1 class="wp-heading-inline">Leads</h1>
  <table class="wp-list-table widefat fixed striped table-view-list users">
	<thead>
	<tr>
		<th scope="col" id="name" class="manage-column column-name">Name</th><th scope="col" id="email" class="manage-column column-email sortable desc"><span>Email</span><span class="sorting-indicator"></span></th>
		<th scope="col" id="role" class="manage-column column-role">Phone</th>
		<th scope="col" id="ur_user_user_status" class="manage-column column-ur_user_user_status">Service</th>	</tr>
	</thead>

	<tbody id="the-list" data-wp-lists="list:user">
	<?php 
	foreach($posts as $datas)
	{
		
	?>	
	<tr><td class="name column-name" data-colname="Name"><span aria-hidden="true"><?php echo $datas->name;?></span></td><td class="email column-email" data-colname="Email"><?php echo $datas->email;?></td><td class="role column-role" data-colname="Role"><?php echo $datas->phone;?></td><td class="ur_user_user_status column-ur_user_user_status" data-colname="Status"><?php echo $datas->service;?></td></tr>
    <?php 
	}
	?>
	
   </table>
   <?php
   }
 
   ?>
