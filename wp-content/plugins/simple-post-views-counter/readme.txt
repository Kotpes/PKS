=== Simple Post Views Counter ===

Contributors: RSPublishing
Tags: post views, hits, counter, post, view, postviews, view counter, views, total, hits counter, hit, pageviews
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=39JEX9DQXCDJY
Requires at least: 2.7
Tested up to: 3.7.1
Stable tag: 1.2
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin will enable you to display how many times a post has been viewed. The total views are displayed in entry meta of all posts.


== Description ==

This plugin counts and displays all hits/views in each post on your blog and saves it to the database. 
Views are counted each time a page or post is requested/refreshed (unique and non-unique visitors) and displayed in the posts entry meta.
This plugin works on all posts and pages - no administrations necessary - easy installation.

== Installation ==

1. Download the file
2. Upload and extract the contents of this file to your wp-content/plugins/folder
3. Activate the Simple Post Views Counter in your WP-admin
4. Add this code exactly as you see it to your themes single.php file:  `<?php echo_views(get_the_ID()); ?>` Total Views
5. Please refer to the included images to see where exactly you need to paste the code.
6. Done! Your posts will now have the total views included. (View included images)

== Installation Details ==

The counter text display in the code can be changed. For example: "Total Views" can be changed to either "Views", "Hits", "Total Page Views" or just about anything you wish.

You will also note that the code is pasted within the entry meta section of the post (in your single.php file) and before the closing div tag of the entry meta. This is 
simply pasted here in order to have the counter display inline with the rest of the post meta, such as the category and the author of the post. However, you are not limited. Should 
you wish to include the counter either above or below the entry meta, the choice is yours. Also remember to include the opening and the closing tag of the code exactly as it is 
given above. 

Some themes will also have the "|" character in the entry meta. Should this be the case, simply add the "|" character manually BEFORE the opening tag of the code, followed by a space.

Please understand that different themes may require different placement of the code.

REMEMBER to include the "Total Views" Text as given above. 


== Screenshots ==

1. Database table created by plugin
2. Pasting the code snippet into your single.php file
3. The plugin in action (example)


== Frequently Asked Questions ==

= How do I integrate the plugin into my posts? =

Simply add the following piece of code to your theme's single.php file: `<?php echo_views(get_the_ID()); ?>` Total Views 
(add this code exactly as you see it here and refer to the included images to see where exactly to paste the code). Remember to include the 'Total Views' text as well.

__Notes__

= Uninstalling the plugin =

Should you decide to remove the plugin, please make sure that you manually drop the database table that was created when installing the plugin as well as remove 
the code that you have added to your single.php file.

= Re-installing the plugin = 

Simply follow the installation steps as given above. However, ONLY re-install this plugin once you have dropped the 'old' database table that was created by the plugin when you
first installed it. Failing to remove the 'old' database table will cause the plugin to stop counting views (although it will still be displayed). Correct re-install will also 
start from a 0 count again.

= Better Performance = 

Slowing down? Then use this plugin in addition to a db optimizing plugin as well as a cache plugin (such as W3 Total Cache or Super cache). We are planning to include 'built-in' 
optimization functions in a update. 

= Statistics =

Should you need to "pull" view count statistics, please do so by using your Sql Db export. We are looking at extending this function in an update.


= The Code Snippet to add to your Single.php file =

`<?php echo_views(get_the_ID()); ?>` Total Views 


== Feedback, Help, and Suggestions ==

Do you need help installing getting this plugin to function correctly? Just post a mail to: rcstoltz@gmail.com with email subject: Simple Post Views Counter


== Upgrade Notice ==

= Version 1.2 = 


== Changelog ==

= Version 1.0 =

First Release Version

= 1.2 =

* tested compatibility with v3.7.1
* added blank index file to trunk (security)
* included donation link
* corrected author name
* included temp banner
* updated keywords
* updated readme


== Thumbs Up ==

Like our WP plugin? Don't forget to give us a rating.