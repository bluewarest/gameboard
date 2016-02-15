jQuery(document).ready(function() {
    	// Grab current anchor value
		
    
	function close_accordion_section() {
		jQuery('.accordion .accordion-section-title').removeClass('active');
		jQuery('.accordion .accordion-section-content').slideUp(300).removeClass('open');
	}

	jQuery('.accordion-section-title').click(function(e) {
	var currentAttrValue = jQuery(this).attr('href');

		if(jQuery(e.target).is('.active')) {
            jQuery('.accordion ' + currentAttrValue).slideUp(300).removeClass('open');
            jQuery(this).removeClass('active');
			//close_accordion_section();
		}else {
			//close_accordion_section();

			// Add active class to section title
			jQuery(this).addClass('active');
			// Open up the hidden content panel
			jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
		}

		e.preventDefault();
	});
});