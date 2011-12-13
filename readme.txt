=== Blog ID in Site Admin Menu ===
Contributors: trepmal 
Donate link: http://kaileylampert.com/donate.php
Tags: wpmu, multi-site
Requires at least: 2.8
Tested up to: 3.2
Stable tag: trunk

Adds the ID of the current blog/site to the Site Admin submenu and Howdy greeting, links to Edit Blog/Site screen. 

== Description ==

Adds the ID of the current blog/site to the Site Admin submenu and Howdy greeting, links to Edit Blog/Site screen. 

For superadmins, the number is a link to the Edit Blog/Site screen. For normal admins, the number is visible, but not clickable.

== Installation ==

1. Upload `blog-id-in-side-admin-menu.php` to the `/wp-content/plugins/` directory (mu-plugins for WPmu)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. That's it

== Screenshots ==

1. pre-3.1 "Super Admin" menu (moved to Dashboard in 3.1+)
2. pre-3.2 "Howdy" links
3. 3.2 "Howdy" dropdown

== Changelog ==

= 1.6 =
* In 3.2, ID appears in "Howdy" dropdown, or under Dashboard in the sidebar
* Fixed broken network admin links
* Notice appears if not running multisite

= 1.5 =
* 3.1 compatibility (about time!)

= 1.3 =
* works for wpmu 2.9 and wp 3.0 (for the sake of my sanity...)

= 1.2 =
* WP 3.0 upgrades (not compatible with WPmu)

= 1.1 =
* Blog ID links to Edit Blog Screen

= 1.0 =
* Initial Release.
