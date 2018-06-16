$(document).ready(function () {
	$( window ).load(function() {
		$("#nav-toggle").on("click", function() {
			$("#main-nav").slideDown('slow');
		});
	});

	$(".slideout-item").on("click", function() {
		$(".slideout-item").removeClass("active");

		if(!$(".slideout-item").hasClass("active")) {
			$(".slideout-item-content").slideUp("slow");
		}
		$(this).addClass("active");

		if($(this).hasClass("active")) {
			$(this).children(".slideout-item-content").slideDown("slow");
		}

		event.preventDefault();

	});
});