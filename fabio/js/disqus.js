function loaddisqus() {

	/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */

	var disqus_developer = 0; // developer mode is on
	if ($testmode == 0) {
		if (typeof xdisqus_identifier === "undefined") {
		} else {
			//var disqus_identifier = xdisqus_identifier;
		}

	}
	var disqus_shortname = xDisqusName;// 'devcgcircuit'; // required:
	// replace example with your forum
	// shortname
	// var disqus_url = '';

	/* * * DON'T EDIT BELOW THIS LINE * * */
	(function() {
		var dsq = document.createElement('script');
		dsq.type = 'text/javascript';
		dsq.async = true;
		dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		document.getElementById('discussion').appendChild(dsq);
		// (document.getElementsByTagName('head')[0] ||
		// document.getElementsByTagName('body')[0]).appendChild(dsq);
	})();

}