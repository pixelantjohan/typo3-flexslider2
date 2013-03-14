(function ($) {
	
	$(".flexslider").each(function () {
		var $slider = $(this);
		$slider.flexslider({
			animation: $slider.data("animation"),
			direction: $slider.data("direction"),
			reverse: !! $slider.data("reverse"),
			animationLoop: !! $slider.data("animationloop"),
			smoothHeight: !! $slider.data("smoothheight"),
			startAt: parseInt($slider.data("startat"), 10) - 1,
			slideshow: !! $slider.data("slideshow"),
			slideshowSpeed: $slider.data("slideshowspeed"),
			animationSpeed: $slider.data("animationspeed"),
			initDelay: $slider.data("initdelay"),
			randomize: !! $slider.data("randomize"),
			pauseOnAction: !! $slider.data("pauseonaction"),
			pauseOnHover: !! $slider.data("pauseonhover"),
			video: !! $slider.data("video"),
			nextText: $slider.data("nexttext"),
			prevText: $slider.data("prevtext")
		});
	});

}(window.jQuery));