// JavaScript Document
jQuery(document).ready(function() {
	var position = jQuery('#socialtape').position();
	var orientation
	var toggle = false;
	(position.left <= 0) ? orientation = "left" : orientation = "right";
    jQuery('#ytbutton').click(function() {
		(toggle) ? toggleOff() : toggleOn();
	});
	
	function toggleOff(){
		(orientation == 'left') ? jQuery('#socialtape').animate({left: "-10px"}, 1000) : jQuery('#socialtape').animate({right: "0px"}, 1000);	
		toggle = false;
	}	

	function toggleOn(){
		(orientation == 'left') ? jQuery('#socialtape').animate({left: "560px"}, 1000) : jQuery('#socialtape').animate({right: "560px"}, 1000);
		toggle = true;
	}
});
