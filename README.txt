===Genesis Style Trump===

Contributors: cdils, garyj
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AVHE2NBF3FBLW
Tags: css, style sheet, genesis, genesiswp, studiopress
Requires at least: 3.8.0
Tested up to: 3.8
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Loads Genesis child theme style sheet after plugin style sheets.

== Description ==

This plugin removes the Genesis child theme style sheet and reloads it at a later priority, allowing plugin style
sheets to load first.

By loading the child theme style sheet later, it allows for easier CSS customizations in child theme as the child theme style sheet trumps plugin styles without using the !important declaration. 

Read more about why I created this plugin at `http://www.carriedils.com/woocommerce-genesis-important-style/`.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the entire `genesis-style-trump` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. That's it! There is no settings panel for this plugin.

== Frequently Asked Questions ==

= Do this plugin require the Genesis Framework? =

This plugin is designed for sites running on the Genesis Framework. While you could successfully activate the plugin on a non-Genesis site, it is useless as the code relies on Genesis-specific actions.

= How do I know if the plugin is working? =

After activating the plugin, refresh your site and view the source code. You should see your child theme's style sheet
loading after all plugin style sheets.

= Can I change any plugins styles from my child themes style sheet? =

Yes! As long as the plugin style sheet doesn't include !important, you'll be able to use the same selector in your child theme to override the plugin.

If the plugin does use !important, you can either !important it right back (your !important will trump) or use a higher level of specificity.

= Does this plugin have any performance benefits? =

Not really. It’s designed only to help you override plugin styles more efficiently by reducing the need to use !important in your child theme’s style sheet.

== Changelog ==

= 1.0.0 =
* Initial release.