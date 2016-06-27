# Scroll-to-anchor

## Add anchors and use a smooth scrolling animation for a better user experience.

![Scroll-to-anchor](/assets/banner-1544x500.png)

== Description ==

Do you write longer text in posts or pages and want to provide links to skip parts? Anchor links to the rescue! In HTML you can define skip marks, so called anchors. Using a link with a pound-sign, readers can jump to the anchor and skip parts, which might be less interesting.

This plugin makes it easier for you to create anchors: No HTML is needed  and all you need to do to add a new anchor is to click the new anchor icon in the visual editor icon bar and name the anchor (e.g. _summary_). If you click the OK-Button, a shortcode is inserted into your text, which automatically is replaced with the correct HTML in the frontend.

Once your anchor has been added, you can link to it: Add and select text, click the link icon and then enter the name of the anchor preceded by a pound sign, e.g. _#summary_. That's all.

For a <strong>better user experience</strong>, a JavaScript function replaces the typical behaviour (i.e. to jump directly to the anchor) with a smooth scrolling animation. You can set the speed of that animation under **Reading > Settings**.

A couple of other settings provide just as much flexibility as you may need: If your website has a sticky header, you can set an offset for the scrolling animation. You can also choose if you want anchors to show up and set a descriptive expression to precede the anchor's name.

Some users reported conflicts with other plugins, which use anchor tags for various reasons. To avoid issues, this plugin already excludes Woocommerce Tabs and Bootstrap Accordions, but you _could_ still run into issues with themes or plugins. To deal with this, you can add one or more CSS class names for sections, in which this plugin should be disabled. Although this is a little more complicated than I hoped for, it seems to be the best workaround. I'm happy to hear your thoughts, how this might even be improved in the future.

I made this plugin because I love WordPress. Period. I don't ask for donations, no upsell, no sketch of the team. **But I would love to get your feedback to learn more.**

== Installation ==

You can install **Scroll to Anchor** automatically from the plugin directory, or by uploading the files manually to your server. After activating **Scroll to Anchor** you'll be forwarded to the settings section at the bottom of the menu **Settings > Reading**.

To uninstall, just deactivate and delete the plugin. Remember to remove the shortcodes you may have added using the plugin.

== Frequently Asked Questions ==

Q: Why don't I see any additonal settings page?
To keep the plugin as unobstrusive as possible, I didn't add yet another settings page. Instead I added a settings section at **Settings > Reading**.

Q: Are there any restrictions for anchor names?
The plugin is disabled for anchors, if
* the anchor starts with <code>#respond</code> (usually comments),
* the anchor starts with <code>#tab</code> and a body-class <code>.woocommerce</code> is provided (WooCommerce's product tabs),
* the anchor is within a section <code>.accordion</code>
* you set other classes to be excluded.

### Screenshots ###
![Settings > Reading](https://github.com/pixolin/scroll-to-anchor/blob/master/assets/screenshot-1.png)
1. Settings > Reading
![Adding a new anchor](https://github.com/pixolin/scroll-to-anchor/blob/master/assets/screenshot-2.png)
2. Adding a new anchor
![Creating link to anchor](https://github.com/pixolin/scroll-to-anchor/blob/master/assets/screenshot-3.png)
3. Creating a link to anchor

### Changelog ###
#### 0.4.0 ####
Enhancement: Adds settings field to exclude CSS classes and avoid conflitcs with animations by third party themes and plugins, e.g. for accordions or tabs. Bootstrap's CSS class .accordion is excluded by default now.

#### 0.3.7 ####
Customized JavaScript according to [WordPress Coding Standards](https://make.wordpress.org/core/handbook/best-practices/coding-standards/javascript/)

#### 0.3.6 ####
Improvements in the JavaScript. Special thanks to Felix Arntz (flixos90).

#### 0.3.5 ##
Release date: April 8, 2016
Bug-Fix: added exception for Woocommerce Tabs
(thank you for feedback by francismacomber)

#### 0.3.4 ####
Release date: March 26, 2016
Bug-Fix: Settings weren't deleted from the database due to a wrong variable name.
Enhancement: Changes initial setting after installation to hide the anchor in the front end by default. Settings menu rearranged and with easier to understand descriptions.

#### 0.3.3 ####
Release date: March 14, 2016
Bug-Fix: Replaces hook used to show settings link

#### 0.3.2 ####
Release date: March 12, 2016
Enhancement: Menu plugins now shows link to settings section

#### 0.3.1 ####
Release date: February 13, 2016
Enhancement: .pot-File for translation and German formal translation added.
Bug-Fixes:   Some minor changes like removing unnecessary variables.

#### 0.3 ####
Release date: February 12, 2016
Initial release.

-----
The banner for the WordPress Plugin Repository is based on the image ["Coast and Geodetic Survey Ship FATHOMER. In service 1905-1941."](http://www.photolib.noaa.gov/htmls/theb0139.htm) published in **Public Domain** by National Oceanic and Atmospheric Administration/Department of Commerce, USA. Photograph by C&GS Season's Report Miller, 1911.

Text in the background is from the novel *Moby Dick* by Herman Melville, **Public Domain**.

And just in case you wonder about the maritime elements – this plugin is about *anchors*. :)
