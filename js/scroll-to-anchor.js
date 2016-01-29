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

 jQuery(document).ready(function($){

	$('a[href*="#"]')
	.not('a[href="#"]') // Excemption #1: dummy hrefs
	.not('a[href*="#respond"]') // Excemption #2: WordPress comment form
	.on('click', function(e) {

		//Split link into part before and after hash mark #
		var linktHref = this.href.split('#');


		if(linktHref[1] === '') { // Excemption #3: orphaned # at end of URL
			e.preventDefault();
			return false;
		}

		var currentUrlRoot = window.location.href.split('#')[0],
			  scrollToAnchor = $('#' + linktHref[1]);

		    currentUrlRoot = currentUrlRoot.replace(/\/$/, '');
				linktHref[0]   = linktHref[0].replace(/\/$/, '');

		// Animate for targets on the same page.
		if(linktHref[0] === currentUrlRoot) {
			$('html, body')
			.animate({ scrollTop : scrollToAnchor.offset().top - sta_settings.distance }, parseInt(sta_settings.speed, 10) ); // Duration: 250ms.

			e.preventDefault();
			return false;
		} else {
			// For targets on other pages, just go to URL.
			window.location.href = this.href;
		}

		return false;
	});
});
