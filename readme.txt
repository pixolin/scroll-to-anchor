=== Scroll to Anchor ===
Contributors: pixolin
Tags: anchors, scrolling
Requires at least: 4.0
Tested up to: 4.4
Stable tag: 0.3.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds smooth scrolling to anchors, that you can easily set in the visual editor.

== Description ==

Do you write longer text in posts or pages and want to provide links to skip parts?

Usually this is done by adding HTML anchors in the text editor as link targets. But not everyone feels happy writing HTML code, which also may be error-prone. After installing this plugin you can use the new anchor icon in your visual editor toolbar to place anchors.

Click in your text where you want to place the anchor, then click on the anchor icon. A dialog box appears where you can provide a short name for your anchor (e.g. "summary"). Optionally you may also provide CSS class name to individually style the anchor. As a result, a shortcode will be placed into your text. This shortcode will render according to your settings and get replaced in the front end with the correct HTML.

Next you can create a link to this anchor. Write some Text (e.g. "Skip to summary"), mark the text and use the default link icon in the editor toolbar. Instead of the complete URL it is sufficient to provide the previously created anchor name, preceded by a hash sign (e.g. "#summary"). That’s about it. If a visitors of your website now clicks on that link in the front end, they will see the web page scrolling smoothly to the defined anchor.

= Individual Settings =

This plugin provides some enhancement only, so it doesn't come with yet another settings page but instead adds a settings section to the menu **Settings > Reading**.

Here you can select the speed of the scrolling animation or even disable the animation entirely.

You can also set an **offset** for anchors, which comes handy if you e.g. use a fixed header.

Some users just want the smooth scrolling effect, but don't want any text to show up in their posts or pages. Therefore the plugin won't display anything in the front end unless you choose differently in the settings. Those who want to show the anchors as text, may choose their own label for anchors, e.g. "footnote" or "section" (followed by the name you chose for that particular anchor).

== Installation ==

You can install **Scroll to Anchor** automatically from the plugin directory, or by uploading the files manually to your server. After activating **Scroll to Anchor** you'll be forwarded to the settings section at the bottom of the menu **Settings > Reading**.

To uninstall, just deactivate and delete the plugin. Remember to remove the shortcodes you may have added using the plugin.

== Frequently Asked Questions ==

Q: Why don't I see any settings page?
There is no need to add yet another settings page. You'll find the plugin settings at **Settings > Reading**.

== Screenshots ==

1. Settings > Reading
2. Adding a new anchor
3. Creating link to anchor

== Changelog ==

= 0.3.4 =
Release date: March, 26t, 2016
Bug-Fix: Settings weren't deleted from the database due to a wrong variable name.
Enhancement: Changes initial setting after installation to hide the anchor in the front end by default. Settings menu rearranged and with easier to understand descriptions.

= 0.3.3 =
Release date: March, 14th, 2016
Bug-Fix: Replaces hook used to show settings link

= 0.3.2 =
Release date: March, 12th, 2016
Enhancement: Menu plugins now shows link to settings section

= 0.3.1 =
Release date: February, 13th, 2016
Enhancement: .pot-File for translation and German formal translation added.
Bug-Fixes:   Some minor changes like removing unnecessary variables.

= 0.3 =
Release date: February 12th, 2016
Initial release.
