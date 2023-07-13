let form = document.querySelector("#dropin-container");

braintree.dropin.create(
    {
        authorization: "{!! $clientToken !!}",
        container: "#dropin-container",
    },
    function (createErr, instance) {
        form.addEventListener("submit", function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log("Error", err);
                    return;
                }

                // Invia il payload al tuo server per processare il pagamento
                // Esempio di richiesta Ajax

                let nonceInput = document.createElement("input");
                nonceInput.setAttribute("type", "hidden");
                nonceInput.setAttribute("name", "payment_method_nonce");
                nonceInput.setAttribute("value", payload.nonce);
                form.appendChild(nonceInput);
                form.submit();
            });
        });
    }
);
