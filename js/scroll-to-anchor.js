/**
 * jQuery Inline Anchor Navigation
 *
 * Adds a smooth scroll effect to URLs containing a hash (#).
 * Excludes single hashes, #respond (WordPress comment forms), and orphaned
 * hash characters at the end of a URL.
 *
 * (c) Caspar Hübinger, 2016
 * (c) Bego Mario Garde, 2016
 * Licensed under GPL2. See enclosed LICENSE.
 */

jQuery(document).ready(function($) {
	var exceptions = sta_settings.exceptions.split(","),
		exceptionclass = '.accordion a[href*="#"]';

	// check if any more classes need to be excluded
	if( exceptions != "" ) {
		for (var i = 0; i < exceptions.length; i++) {
			exceptionclass += ', ' + exceptions[i] + ' a[href*="#"]';
		}
	}

	$('a[href*="#"]')
		.not('a[href="#"]') // Exception #1: dummy hrefs
		.not('a[href*="#respond"]') // Exception #2: WordPress comment form
		.not('.woocommerce a[href*="#tab"]') // Exception #3: Woocommerce tabs
		.not(exceptionclass) // Even more exceptions, when set by the user
		.on('click', function (e) {
			//Split link into part before and after hash mark #
			var linktHref = this.href.split('#');

			if (linktHref[1] === '') { // Exception: orphaned # at end of URL
				return;
			}

			var currentUrlRoot = window.location.href.split('#')[0],
				scrollToAnchor = $('#' + linktHref[1]);

			currentUrlRoot = currentUrlRoot.replace(/\/$/, '');
			linktHref[0] = linktHref[0].replace(/\/$/, '');

			// Do not animate for targets on another page
			if (linktHref[0] !== currentUrlRoot || !scrollToAnchor.length) {
				return;
			}

			$('html, body').animate({
				scrollTop: scrollToAnchor.offset().top - sta_settings.distance
			}, parseInt(sta_settings.speed, 10));

			scrollToAnchor.focus(); // Setting focus
			if (scrollToAnchor.is(":focus")){ // Checking if the target was focused
				return false;
			} else {
				scrollToAnchor.attr('tabindex','-1'); // Adding tabindex for elements not focusable
				scrollToAnchor.focus(); // Setting focus
			};

			e.preventDefault();
			return false;
		});
});
