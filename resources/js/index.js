document.addEventListener("DOMContentLoaded", function() {
	var paymentSuccess = document.getElementById("payment-success");
	if (paymentSuccess) {
	    setTimeout(function() {
		console.log('funziono');
		   paymentSuccess.classList.add("payment-success-hidden");
	    }, 5000);
	}
 });