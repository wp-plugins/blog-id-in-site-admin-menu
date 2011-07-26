<?php
/*
Plugin Name: Blog ID in Site Admin Menu
Plugin URI: http://trepmal.com/plugins/wordpress-mu-making-the-blog-id-more-convenient/
Description: Add Blog/Site ID to the Site Admin submenu as a link to the Edit Blog/Site screen.
Author: Kailey Lampert
Version: 1.6
Author URI: http://kaileylampert.com
*/
/*
    Copyright (C) 2011  Kailey Lampert

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
if ( is_multisite() ) {
	add_action('admin_menu', 'blog_id_in_site_admin_menu');
	add_filter('admin_user_info_links','blog_id_in_howdy_greeting');
}
else {
	add_action('admin_notices', 'blog_id_not_multisite');
}

function blog_id_in_site_admin_menu(){
	global $blog_id;

	if ( function_exists( 'is_network_admin' ) ) { //3.1
		add_submenu_page('index.php', 'Site ID: ' . $blog_id, 'Site ID: ' . $blog_id, 'administrator', network_admin_url( 'site-info.php?id=' . $blog_id ) );
	}
	elseif ( function_exists( 'is_super_admin' ) ) { //2.9-3.0
		add_submenu_page('ms-admin.php', 'Site ID: ' . $blog_id, 'Site ID: ' . $blog_id, 'administrator',' /ms-sites.php?action=editblog&id=' . $blog_id );
	}
	elseif ( function_exists( 'is_site_admin' ) ) { //2.9mu
		add_submenu_page('wpmu-admin.php', 'Blog ID: ' . $blog_id, 'Blog ID: ' . $blog_id, 'administrator', '/wpmu-blogs.php?action=editblog&id=' . $blog_id );
	}
}
		
function blog_id_in_howdy_greeting($links) {
	global $blog_id;
	
	if ( function_exists( 'is_network_admin' ) ) {
		if ( is_super_admin() ) //3.1
			$links[] = ' | <a href="'. network_admin_url( 'site-info.php?id=' . $blog_id ) . '">Site ID: ' . $blog_id . '</a>';
		else
			$links[] = ' | Site ID: ' . $blog_id;
	}
	elseif ( function_exists( 'is_super_admin' ) ) {
		if ( is_super_admin() ) //2.9-3.0
			$links[] = ' | <a href="/wp-admin/ms-sites.php?action=editblog&id=' . $blog_id . '">Site ID: ' . $blog_id . '</a>';
		else
			$links[] = ' | Site ID: ' . $blog_id;
	}

	return $links;
}
function blog_id_not_multisite() {
	?>
	<div class="updated"><p>You're not running multisite. This plugin won't run until multisite is enabled.</p></div>
	<?php
}