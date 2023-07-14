let form = document.querySelector("#payment-form");
let nonceInput = document.querySelector("#nonce");

braintree.dropin.create(
    {
        authorization: "sandbox_jy348mff_x5d6drkmj4rmwngw",
        container: "#dropin-container",
    },
    function (err, dropinInstance) {
        if (err) {
            // Handle any errors that might've occurred when creating Drop-in
            console.error(err);
            return;
        }
        form.addEventListener("submit", function (event) {
            event.preventDefault();

            dropinInstance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    // Handle errors in requesting payment method
                    console.log(result);
                    $("#checkout-message").html(
                        `<h1>Qualcosa è andato storto</h1><p>Controlla di aver inserito correttamente i dati della carta.</p><p>Se hai inserito correttamente i dati e il credito sulla carta è sufficiente (ad esempio se stai utilizzando una ricaricabile) allora puoi provare a contattare il servizio clienti.</p><p class="transaction-error">Errore: <span>${result.results.message}</span></p>`
                    );
                    return;
                }

                // Send payload.nonce to your server
                nonceInput.value = payload.nonce;
                form.submit();
                let submitButton = document.getElementByID("submit-button");
                submitButton.classList.add("d-none");
            });
        });
    }
);
