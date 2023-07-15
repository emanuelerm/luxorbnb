document.addEventListener("DOMContentLoaded", function () {
    // Aggiungi un event listener per rilevare i cambiamenti nelle selezioni dell'utente
    const checkboxes = document.querySelectorAll(
        'input[name="properties_to_sponsor[]"]'
    );
    const offerRadios = document.querySelectorAll(
        'input[name="selected_offer"]'
    );
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener("change", updateCheckout);
    });
    offerRadios.forEach(function (radio) {
        radio.addEventListener("change", updateCheckout);
    });

    // Funzione per aggiornare le sezioni dinamiche del checkout
    function updateCheckout() {
        // Seleziona le proprietà selezionate
        const selectedProperties = Array.from(
            document.querySelectorAll(
                'input[name="properties_to_sponsor[]"]:checked'
            )
        ).map((property) => property.value);

        // Seleziona l'offerta selezionata
        const selectedOffer = document.querySelector(
            'input[name="selected_offer"]:checked'
        );

        // Recupera il nome e il prezzo dell'offerta selezionata
        let offerName = "";
        let offerPrice = 0;
        if (selectedOffer) {
            const offerValue = selectedOffer.value;
            if (offerValue === "1") {
                offerName = "Bronze";
                offerPrice = 2.99;
            } else if (offerValue === "2") {
                offerName = "Silver";
                offerPrice = 5.99;
            } else if (offerValue === "3") {
                offerName = "Gold";
                offerPrice = 9.99;
            }
        }

        // Calcola il totale del pagamento
        let totalPrice = offerPrice * selectedProperties.length;

        // Aggiorna la sezione delle proprietà selezionate
        const selectedPropertiesSection = document.getElementById(
            "selected-properties"
        );
        selectedPropertiesSection.innerHTML = `<p class="text-white mb-3">Proprietà selezionate: ${selectedProperties.length}</p>`;

        // Aggiorna la sezione dell'offerta selezionata
        const selectedOfferSection = document.getElementById("selected-offer");
        selectedOfferSection.innerHTML = selectedOffer
            ? `<p class="text-white mb-3">Offerta selezionata: ${offerName}</p>`
            : '<p class="text-white mb-3">Nessuna offerta selezionata</p>';

        // Aggiorna la sezione del totale del pagamento
        const totalAmountSection = document.getElementById("total-amount");
        totalAmountSection.innerHTML = `<p class="text-white mb-3">Totale pagamento: ${totalPrice.toFixed(
            2
        )}€</p>`;
    }
});
