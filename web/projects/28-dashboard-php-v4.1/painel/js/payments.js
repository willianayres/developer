$(function(){

	$('[name=payment_parcels],[name=payment_interval').mask('99');
	$('[name=payment_value]').maskMoney({prefix:'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesSyay: false});

	$('[name=payment_due]').Zebra_DatePicker();

});