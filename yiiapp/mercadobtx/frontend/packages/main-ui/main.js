/**
 * Javascript code relevant to the frontend.
 */
$(document).ready(function() {

	// setup handler that will update prices ever 2 seconds
	update_exchange_rates();
});

function update_exchange_rates() {
	var jqxhr = $.ajax({
		url: "/api/exchangerates",
		dataType: 'json'
	}).done(function(data) {
		$('span.mxn_to_btc').html(data['mxn_to_btc']);
		$('span.usd_to_btc').html(data['usd_to_btc']);
		$('span.usd_to_mxn').html(data['usd_to_mxn']);
		
		$('div.btc_to_mxn').html(parseFloat(data['btc_to_mxn']).toFixed(2));
		//$('div.btc_to_mxn').html(parseFloat(data['btc_to_usd']).toFixed(2));
		$('div.btc_to_mxn').append("  <b>MNX = 1 BTC</b>");
	}).fail(function() {
		console.log("update_exchange_rates returned an error");
	}).always(function() {
		setTimeout(function() {update_exchange_rates(); }, 120000); // keep calling it every 10 seconds
	});

}
