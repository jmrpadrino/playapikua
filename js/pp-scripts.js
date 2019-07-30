jQuery('#test').change(function(){
	if(jQuery(this).is(":checked")) {
		jQuery('#pp-billing-details').removeClass('pp-hidden');
        jQuery.each(jQuery('#pp-billing-details input'), function(){
            jQuery(this).prop('required', 'required');
        })
	} else {
		jQuery('#pp-billing-details').addClass('pp-hidden');
        jQuery.each(jQuery('#pp-billing-details input'), function(){
            jQuery(this).removeProp('required');
        })
	}
});

jQuery('input[name="checkin"]').change(function(){
    var chechinInputVal = jQuery(this).val();
    var checkoutInput = jQuery('input[name="checkout"]');
    var newDate = new Date( chechinInputVal );
    var altdate = new Date( newDate.setDate( newDate.getDate() + 2 ) );
    
    checkoutInput.val( altdate.format('Y-m-d') );
    checkoutInput.attr( 'min', chechinInputVal );
    
})

jQuery(document).ready(function() {
    
	jQuery('input[type="radio"]').click(function() {
		jQuery('.pp-payment-method').addClass('pp-hidden');
		if(jQuery(this).attr('id') == 'arrival') {
			jQuery('#arrivalmethod').removeClass('pp-hidden'); 
		}
		else if(jQuery(this).attr('id') == 'bank'){ 
			jQuery('#bankmethod').removeClass('pp-hidden'); 
		}
		else if(jQuery(this).attr('id') == 'creditcard'){
			jQuery('#creditcardmethod').removeClass('pp-hidden'); 
		}
		else if(jQuery(this).attr('id') == 'paypal'){
			jQuery('#paypalmethod').removeClass('pp-hidden');   
		}
	});
});

