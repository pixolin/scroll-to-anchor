=== Scroll to Anchor ===
Contributors: pixolin
Tags: anchors, scrolling
Requires at least: 4.0
Tested up to: 4.4
Stable tag: 0.3.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds smooth scrolling to anchors, that you can easily set in the visual editor.

== Description ==

Do you write longer text in posts or pages and want to provide links to skip parts?

Usually this is done by adding HTML anchors in the text editor as link targets. But not everyone feels happy writing HTML code, which also may be error-prone. Instead you can now use the new anchor icon in your visual editor toolbar to place anchors.

Click in your text where you want to place the anchor, then click the anchor icon. A dialog box appears where you can provide a short name for your anchor (e.g. "summary") and optionally give the anchor a CSS class name for individual styling. As a result, a shortcode will be placed into your text, which will then get replaced in the front end with the correct HTML.

Next you can create a link to this anchor at another section of your text. Write some Text (e.g. "Skip to summary"), mark the text and use the default link icon in the editor toolbar. Instead of the complete URL it is sufficient if you provide the anchor name, preceded by a hash sign (e.g. "#summary"). That’s about it. If a visitors of your website now clicks on that link in the front end, they will see the web page scrolling smoothly to the defined anchor.

= Individual Settings =

Is the animation too fast or too slow? Under **Settings > Reading** you can select the speed or even disable the animation.

You can also set an **offset** for anchors, which comes handy if you e.g. use a fixed header.

How do you want the anchor to be displayed? By default the anchor will be displayed as "Anchor: …" but you can chose any term you like, e.g. "Label: …". If you rather don't want to show the anchor at all, just uncheck the check box underneath.

== Installation ==

You can install **Scroll to Anchor** automatically from the plugin directory, or by uploading the files manually to your server. After activating **Scroll to Anchor** check the settings at the bottom of the menu **Settings > Reading**.

For uninstall, just deactivate and delete the plugin. Remember to delete the shortcodes you may have added using the plugin.

== Frequently Asked Questions ==

None so far. Please feel free to use the plugin support forum if you have any question.

== Screenshots ==

1. Settings > Reading
2. Adding a new anchor
3. Creating link to anchor

== Changelog ==

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
