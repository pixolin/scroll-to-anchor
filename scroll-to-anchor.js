/**
 * jQuery Inline Anchor Navigation
 *
 * Adds a smooth scroll effect to URLs containing a hash (#).
 * Excludes single hashes, #respond (WordPress comment forms), and orphaned
 * hash characters at the end of a URL.
 *
 * (c) Caspar Hübinger, 2016
 * Licensed under GPL2. See enclosed LICENSE.
 */

(function($) {
	$('a[href*="#"]')
	.not('a[href="#"]') // Excemption #1: dummy hrefs
	.not('a[href*="#respond"]') // Excemption #2: WordPress comment form
	.on('click.achornav', function(e) {
		var linktHref = this.href.split('#');

		if(linktHref[1] === '') { // Excemption #3: orphaned # at end of URL
			e.preventDefault();
			return false;
		}

		var currentUrlRoot = window.location.href.split('#')[0],
			scrollToAnchor = $('#' + linktHref[1]).offset().top;

		// Animate for targets on the same page.
		if(linktHref[0] === currentUrlRoot) {
			$('html, body')
			.animate({ scrollTop : scrollToAnchor }, 250 ); // Duration: 250ms.

			e.preventDefault();
			return false;
		} else {
			// For targets on other pages, just go to URL.
			window.location.href = this.href;
		}

		return false;
	});
}(jQuery));
