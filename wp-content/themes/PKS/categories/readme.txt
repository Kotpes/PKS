=== Advanced Custom Fields: Categories Field ===
Contributors: cubeweb
Tags:
Requires at least: 3.4
Tested up to: 3.5.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Categories is custom field that generates a drop down or multi checkboxes with all the categories from your wordpress site

== Description ==

Categories is custom field that generates a drop down or multi checkboxes with all the categories from your wordpress site

= Compatibility =

This add-on will work with:

* version 4 and up
* version 3 and bellow

== Installation ==

This add-on can be treated as both a WP plugin and a theme include.

= Plugin =
1. Copy the 'categories' folder into your plugins folder
2. Activate the plugin via the Plugins admin page

= Include =
1.	Copy the 'categories' folder into your theme folder (can use sub folders). You can place the folder anywhere inside the 'wp-content' directory
2.	Edit your functions.php file and add the code below (Make sure the path is correct to include the categories-v3.php or categories-v4.php file)

`
add_action('acf/register_fields', 'my_register_fields');

function my_register_fields() {
	include_once('categories/categories-v4.php'); or include_once('categories/categories-v3.php');
}
`

== Changelog ==

= 1.0.5 =
* Added compatibility with ACF 4.0

== Please report any bugs or requests on https://github.com/cubeweb/acf-addons/issues?state=open ==