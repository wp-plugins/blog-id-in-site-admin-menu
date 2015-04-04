<?php
/*
 * Plugin Name: Blog ID in Site Admin Menu
 * Plugin URI: http://trepmal.com/plugins/wordpress-mu-making-the-blog-id-more-convenient/
 * Description: Add Blog/Site ID to the Site Admin submenu as a link to the Edit Blog/Site screen.
 * Version: 2
 * TextDomain: biit
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Author: Kailey Lampert
 * Author URI: http://kaileylampert.com
 * Network:
 */
/*
    Copyright (C) 2011-2015 Kailey Lampert

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

$blog_id_in_toolbar = new Blog_ID_In_Toolbar;

class Blog_ID_In_Toolbar {

	/**
	 * Hook in
	 */
	public function __construct() {

		if ( is_multisite() ) {
			add_filter( 'admin_bar_menu', array( $this, 'admin_bar_menu' ), 200 );
		} else {
			add_action( 'admin_notices',  array( $this, 'admin_notices' ) );
		}

	}

	/**
	 * Alter admin bar with site ID
	 */
	public function admin_bar_menu( $wp_admin_bar ) {

		if ( ! is_super_admin() ) return;

		global $blog_id;

		if ( is_admin() && ! is_network_admin() ) {

			// get 'Edit Site' menu
			$edit_site = $wp_admin_bar->get_node('edit-site');
			// alter title
			$edit_site->title = sprintf( __( '%s (ID: %d)', 'biit'), $edit_site->title, $blog_id );
			// remove original
			$wp_admin_bar->remove_node('edit-site');
			// add altered version
			$wp_admin_bar->add_menu( $edit_site );

		} else {
			$menu = array(
				'id'     => 'edit-site',
				'parent' => 'site-name',
				'title'  => sprintf( __( 'Edit Site (ID: %d)', 'biit' ), $blog_id ),
				'href'   => network_admin_url( "site-info.php?id=$blog_id" ),
			);
			$wp_admin_bar->add_menu( $menu );
		}

	}

	/**
	 * Deactivate plugin and output notice
	 */
	public function admin_notices() {

		deactivate_plugins( plugin_basename( __FILE__ ), true );

		?><div id="biit-notice" class="notice notice-warning is-dismissible"><p><?php
			_e( '<strong>Blog ID in Site Admin Menu</strong> requires multisite and has been deactivated.', 'biit' );
		?></p></div><?php

	}

}
