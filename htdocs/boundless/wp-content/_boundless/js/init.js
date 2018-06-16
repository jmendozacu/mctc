jQuery(window).load(function(){
    jQuery("#toggle").click(function() {
        document.getElementById("myNav").style.width = "100%";
        jQuery(".overlay-content").show();
        jQuery(".overlay-content ul").show();
        jQuery(".overlay-content .menu-item").each( function(e) {
            jQuery(this).delay(300 * (e + 1)).toggle("slide");
        });
    });
    document.addEventListener("onkeydown", function(e) {
        if (e.keyCode == 27) {
            jQuery(".overlay-content .menu-item").each(function (e) {
                jQuery(this).delay(300 * (e + 1)).toggle("slide");
            });
            document.getElementById("myNav").style.width = "0%";
            jQuery(".overlay-content").hide();
            jQuery(".overlay-content ul").hide();
        }
    });
});
// jQuery(".container .line").each(function() {
//     var i = 1;
//     var margin = 2% + (i * 1.7);
//     jQuery(this).css("margin-left", margin);
// });