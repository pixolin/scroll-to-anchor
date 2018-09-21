=== Scroll to Anchor ===
Contributors: pixolin
Tags: anchors, scrolling
Requires at least: 4.0
Tested up to: 4.9.8.
Stable tag: 0.6.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add anchors and use a smooth scrolling animation for a better user experience.

== Description ==

Are some of your readers impatient, want to skip long text and immediately jumpt to the summary? This plugin helps you to create anchors in your posts or pages and provides a smooth scrolling animation when the link to an anchor has been clicked.

For more convenience the plugin adds an anchor icon to the toolbar of the classic(1) visual editor for post and pages (and your own custom post types, if enabled in the settings). Adding a new anchor is no more than the click on that icon, after you marked a text passage or placed the cursor at the desired position of your text. A popup window will ask for a name of the anchor and then insert a shortcode into your text, which automatically gets replaced with the correct HTML in the frontend. (Need custom styling of the anchor? You may add individual CSS class names each time you insert a new anchor. If you don't need that, just leave the field empty.)

Once an anchor has been added, you can link to it: Add and select text (e.g. "Jump to the summary"), click the link icon in the toolbar and enter the name of your anchor, preceded by a pound sign, e.g. _#summary_. That's all.

Links may not contain spaces, but you can use them in your anchor names anyway. If you name your anchor e.g. _Summary Chapter Two_, you'll see an information that the _link_ to that anchor has been changed into e.g. _#summary-chapter-two_.

For a <strong>better user experience</strong>, a JavaScript function replaces the typical behaviour to directly jump to the anchor. Instead the visitor of your website sees a smooth scrolling animation. (If this is too fast/slow, you can change the speed under **Settings > Reading**.)

A couple of other settings provide just as much flexibility as you may need: If your website has a sticky header, you can set an offset for the scrolling animation. You can also choose if you want anchors to be displayed in the front end and set a descriptive expression to precede the anchor's name.

Some users reported conflicts with other plugins, which (ab-)use anchor tags for various reasons. To avoid issues, this plugin already excludes Woocommerce Tabs and Bootstrap Accordions, but you _could_ still run into issues with themes or plugins. To deal with this, you can add one or more CSS class names for sections, in which this plugin should be disabled. Although this is a little more complicated than I hoped for, it seems to be the best workaround. I'm happy to hear your thoughts, how this might even be improved in the future.

(1) <strong>Currently</strong> the plugin <strong>doesn't support WordPress' new editor "Gutenberg"</strong>, but I hope to catch up soon and be able to extend the functionality of this little helper plugin.

I made this plugin because I love WordPress. Period. I won't ask for donations, no upsell, no sketch of the team.
**But I love to get your feedback to learn more.**

== Installation ==

You can install **Scroll to Anchor** automatically from the plugin directory, or by uploading the files manually to your server. After activating **Scroll to Anchor** you'll be forwarded to the settings section at the bottom of the menu **Settings > Reading**.

To uninstall, just deactivate and delete the plugin. Remember to remove the shortcodes you may have added using the plugin.

== Frequently Asked Questions ==

= Q: Why don't I see any additonal settings page? =
To keep the plugin as unobstrusive as possible, I didn't add yet another settings page. Instead I added a settings section at **Settings > Reading**.

= Q: Are there any restrictions for anchor names? =
The plugin is disabled for anchors, if
<ul>
<li>the anchor starts with <code>#respond</code> (usually comments),</li>
<li>the anchor starts with <code>#tab</code> and a body-class <code>.woocommerce</code> is provided (WooCommerce's product tabs),</li>
<li>the anchor is within a section <code>.accordion</code></li>
<li>you set other classes to be excluded.</li>
</ul>

= Q: Can I use anchor names with spaces and mix upper-/lowercase letters? =
As links may not contain spaces, your anchor name will be sanitized and spaces replaced with hyphens. If you e.g. add an anchor and set it's name as _Summary Chapter Two_, you'll see a message that the link to this anchor should be #summary-chapter-two. Howevery, if you chose to display anchors in the front end, they will just show up as you named them, e.g. _Anchor: Summary Chapter Two_.

= Q: I created a custom post type. Can I get the Scroll to Anchor icon in the toolbar when editing posts of that post type? =
Go to Settings > Reading and select the custom post types, where you want the icon to appear in the toolbar.

= Q: I created a custom post type. Can I get the Scroll to Anchor icon in the toolbar when editing posts of that post type? =
Go to Settings > Reading and select the custom post types, where you want the icon to appear in the toolbar.

= Q: Can I simply use a link <code><a href="#">Top</a></code> at the end of my page? =
The link target `#` is often used as a placeholder and the typical functionality replaced by a JavaScript function. To avoid conflicts with such functions, Scroll to Anchor ignores links using the hash symbol only. If you want to provide a link to the top of your page, please use >code><a href="#top">Top</a></code> instead. (More Information (on MDN)[https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#attr-href].)

= Q: Does Scroll to Anchor support WordPress' new editor Gutenberg?
Sorry, not yet. Stay tuned. =

== Screenshots ==

1. Settings > Reading
2. Adding a new anchor
3. Creating link to anchor

== Changelog ==

= 0.6.0 =
Fix: When a link with the anchor #top is clicked, Scroll to Anchor scrolls to the top of the page at the specified speed. The specified offset value is ignored.
License now GPLv2 *or later*. Thank you Udo Meisen for the talk about OpenSource Licensing.

= 0.5.0 =
Adds new setting to select custom post types to show anchor icon in the toolbar.

= 0.4.3.1 =
Fix: replaces incorrect sanitization in shortcode, which broke shortcodes with uppercase-letters. Also corrections in l18n and readme-file.

= 0.4.3 =
Enhancement: TinyMCE modals now can be localized.
Fix:
* Anchor names now may contain spaces, uppper-/lowercase letters and even German umlauts. If you e.g. add an anchor "Großes Glück", you will see a message that the anchor id was added as `#grosses-glueck` (but will display as _Anchor: Großes Glück_ in the front end). This seems to be the best solution for SEO and should give you a little more flexibility naming your anchors.
* Anchors may now encapsule content. However, if you want to use both, enclosing and not enclosing shortcodes _and_ updated from a previous version, you need to add closing slashes to your previously existing, not enclosing anchors (e.g. `[sta_anchor id="top" /]`). If you just edit new pages, don't worry.
* You get a warning in the TinyMCE modal, if you left the field for the anchor name empty

= 0.4.2 =
Fix: Code Bug, optimizes SVG file. Thanks to Sergej Müller.

= 0.4.1 =
Fix: error handling when variable $current['exceptions'] is empty.

= 0.4.0 =
Enhancement: Adds settings field to exclude CSS classes and avoid conflitcs with animations by third party themes and plugins, e.g. for accordions or tabs. Bootstrap's CSS class .accordion is excluded by default now.

= 0.3.7 =
Customized JavaScript according to [WordPress Coding Standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/javascript/)

= 0.3.6 =
Improvements in the JavaScript. Special thanks to Felix Arntz (flixos90).

= 0.3.5 =
Release date: April 8, 2016
Bug-Fix: added exception for Woocommerce Tabs
(thank you for feedback by francismacomber)

= 0.3.4 =
Release date: March 26, 2016
Bug-Fix: Settings weren't deleted from the database due to a wrong variable name.
Enhancement: Changes initial setting after installation to hide the anchor in the front end by default. Settings menu rearranged and with easier to understand descriptions.

= 0.3.3 =
Release date: March 14, 2016
Bug-Fix: Replaces hook used to show settings link

= 0.3.2 =
Release date: March 12, 2016
Enhancement: Menu plugins now shows link to settings section

= 0.3.1 =
Release date: February 13, 2016
Enhancement: .pot-File for translation and German formal translation added.
Bug-Fixes:   Some minor changes like removing unnecessary variables.

= 0.3 =
Release date: February 12, 2016
Initial release.
