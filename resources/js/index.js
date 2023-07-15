document.addEventListener("DOMContentLoaded", function() {
	var paymentSuccess = document.getElementById("payment-success");
	var paymentError = document.getElementById("payment-error");
 
	if (paymentSuccess) {
	    setTimeout(function() {
		   paymentSuccess.classList.add("payment-success-hidden");
	    }, 5000);
	}
 
	if (paymentError) {
	    setTimeout(function() {
		   paymentError.classList.add("payment-error-hidden");
	    }, 5000);
	}
 });