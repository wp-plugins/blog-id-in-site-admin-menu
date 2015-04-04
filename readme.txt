=== Blog ID in Site Admin Menu ===
Contributors: trepmal
Donate link: http://kaileylampert.com/donate.php
Tags: wpmu, multi-site
Requires at least: 4.0
Tested up to: 4.2
Stable tag: trunk

Adds the ID of the current blog/site to the Edit Site menu item.

== Description ==

Adds the ID of the current blog/site to the Edit Site menu item. Available only to super-admins.

== Installation ==

1. Standard installation. Disables itself on non-multisite. Works per-site, network-activated, or in mu-plugins.

1. Upload `blog-id-in-side-admin-menu.php` to the `/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress. Network activation recommended, but not required

== Screenshots ==

1. ID added to Edit Site menu item

== Changelog ==

= 2 =
* Dropping support for old versions of WordPress
* Rewritten for l10n, simplicity, namespacing

= 1.7.1 =
* make sure "Site ID" isn't clickable for regular admins

= 1.7 =
* 3.3 compatibility, ID under Site Name menu

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
