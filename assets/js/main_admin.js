!(function ($) {
	"use strict";

	$(document).ready(function () {
		if ($(".outer").data("diperiksa") == true) {
			//hidden button
		}
	});

	$(".outer").on("click", function (event) {
		$(".outer").addClass("clicked");
	});

	$(".inner").on("click", function (event) {
		$(".outer clicked").data("diperiksa", true);
		$(".outer clicked").removeClass("clicked");
	});
})(jQuery);
