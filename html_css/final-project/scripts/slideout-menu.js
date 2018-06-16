// JavaScript Document

$(document).ready(function () {

    $('.slideout-menu-toggle').on('click', function checkSize(){
			
    		if($(".slideout-menu").css("float") === "left") {
	    		if($(".slideout-menu").hasClass("opened")) {
	    			$('#map').animate({ width: '95%'});
	    			$('.slideout-menu').animate({ width: '0%'});

					$(".slideout-menu").removeClass("opened");

					$(".slideout-menu").removeClass("opened");
				}
				else {
	    			$('#map').animate({ width: '56.6666%'});
	    			$('.slideout-menu').animate({ width: '30%'});

					$(".slideout-nav").delay(500);
					$(".slideout-nav").slideDown(500);
				};
    		};


		event.preventDefault();
	});
    $(window).resize(adjustSize);

    function adjustSize() {
		if($(".slideout-menu").css("float") == "none") {
			$('#map').animate({ width: '95%'});
	    	$('.slideout-menu').animate({ width: '100%'});
			$('.slideout-bottom').animate({ width: '100%'});
		}
		else if(($(".slideout-menu").css("float") == "left")) {
			$('#map').animate({ width: '60%'});
    		$('.slideout-menu').animate({ width: '30%'});
			$('.slideout-bottom').animate({ width: '30%'});
		}
	}
	
});