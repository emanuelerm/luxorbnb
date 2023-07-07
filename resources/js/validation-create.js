const btnSubmit = document.querySelector("#submit");

// Stato di validazione del form
const validationState = {
    titleField: false,
    descrField: false,
    roomsField: false,
    bedsField: false,
    bathroomsField: false,
    sqrMetersField: false,
    isAnyCheckboxChecked: false,
    imagesField: false,
    addressField: false,
};

// Funzione per validare il campo "Titolo"
function validateTitleField() {
    const titleInput = document.querySelector("#title");
    if (titleInput.value.length < 3) {
        titleInput.classList.add("is-invalid", "border", "border-danger");
        validationState.titleField = false;
    } else if (titleInput.value === "") {
        titleInput.value = "";
        titleInput.placeholder = "Il titolo è obbligatorio";
    } else {
        titleInput.classList.remove("is-invalid", "border-danger");
        titleInput.classList.add("is-valid", "border-success");
        validationState.titleField = true;
    }
    checkFormValidation();
}

function handleBlurTitle() {
    validateTitleField();

    const titleInput = document.querySelector("#title");
    if (titleInput.value === "") {
        titleInput.placeholder = "Il titolo è obbligatorio";
    }
}

function handleInputTitle() {
    validateTitleField();

    const titleInput = document.querySelector("#title");
    if (titleInput.value !== "") {
        titleInput.placeholder = "";
    }
}

// Funzione per validare il campo "Descrizione"
function validateDescrField() {
    const descrInput = document.querySelector("#description");
    if (descrInput.value.length < 10 || descrInput.value === "") {
        descrInput.classList.add("is-invalid", "border", "border-danger");
        validationState.descrField = false;
    } else {
        descrInput.classList.remove("is-invalid", "border-danger");
        descrInput.classList.add("is-valid", "border-success");
        validationState.descrField = true;
    }
    checkFormValidation();
}

function handleBlurDescr() {
    validateDescrField();

    const descrInput = document.querySelector("#description");
    if (descrInput.value === "") {
        descrInput.placeholder = "La descrizione è obbligatoria";
    }
}

function handleInputDescr() {
    validateDescrField();

    const descrInput = document.querySelector("#description");
    if (descrInput.value !== "") {
        descrInput.placeholder = "";
    }
}

// Funzione per validare i campi numerici (Stanze, Letti, Bagni)
function validateNumericField(inputId, fieldKey) {
    const input = document.querySelector(`#${inputId}`);
    if (input.value === "" || isNaN(input.value) || input.value <= 0) {
        input.value = "";
        input.classList.add("is-invalid", "border", "border-danger");
        validationState[fieldKey] = false;
    } else {
        input.classList.remove("is-invalid", "border-danger");
        input.classList.add("is-valid", "border-success");
        validationState[fieldKey] = true;
    }
    checkFormValidation();
}

// Funzione per validare il campo "Metri Quadrati"
function validateSqrMetersField() {
    const sqrMetersInput = document.querySelector("#square_meters");
    if (sqrMetersInput.value === "" || isNaN(sqrMetersInput.value)) {
        sqrMetersInput.value = "";
        sqrMetersInput.classList.add("is-invalid", "border", "border-danger");
        validationState.sqrMetersField = false;
    } else if (sqrMetersInput.value < 70) {
        sqrMetersInput.classList.add("is-invalid", "border", "border-danger");
        validationState.sqrMetersField = false;
    } else {
        sqrMetersInput.classList.remove("is-invalid", "border-danger");
        sqrMetersInput.classList.add("is-valid", "border-success");
        validationState.sqrMetersField = true;
    }
    checkFormValidation();
}

// Funzione per controllare se almeno un checkbox è selezionato
function checkCheckboxValidity() {
    const checkboxes = document.querySelectorAll("input[name='services[]']");
    validationState.isAnyCheckboxChecked = Array.from(checkboxes).some(
        (checkbox) => checkbox.checked
    );
    checkFormValidation();
}

// Funzione per validare il campo "Immagini"
function validateImagesField() {
    const imagesInput = document.querySelector("input[name='images[]']");
    const errorImageMessage = document.querySelector(
        "#image-validation-message"
    );
    if (imagesInput.files.length === 0) {
        errorImageMessage.classList.add("text-uppercase", "text-danger");
        errorImageMessage.textContent = "Selezionare almeno un'immagine";
        validationState.imagesField = false;
    } else {
        errorImageMessage.classList.remove("text-uppercase", "text-danger");
        errorImageMessage.textContent = "";
        validationState.imagesField = true;
    }
    checkFormValidation();
}

// Funzione per validare il campo "Address"
function validateAddressField() {
    const addressInput = document.querySelector(".tt-search-box-input");
    const addressContainer = document.querySelector(
        ".tt-search-box-input-container"
    );
    if (addressInput.value.length === 0 || addressInput.value === "") {
        addressContainer.classList.add("is-invalid", "border", "border-danger");
        validationState.addressField = false;
    } else {
        addressContainer.classList.remove("is-invalid", "border-danger");
        addressContainer.classList.add("is-valid", "border-success");
        validationState.addressField = true;
    }
    checkFormValidation();
}

function handleBlurAddress() {
    validateAddressField();

    const addressInput = document.querySelector(".tt-search-box-input");
    if (addressInput.value === "") {
        addressInput.placeholder = "L'indirizzo è obbligatorio";
    }
}

function handleInputAddress() {
    validateAddressField();

    const addressInput = document.querySelector(".tt-search-box-input");
    if (addressInput.value !== "") {
        addressInput.placeholder = "";
    }
}

// Funzione per controllare la validità del modulo e abilitare/disabilitare il pulsante di invio
function checkFormValidation() {
    const isFormValid = Object.values(validationState).every((field) => field);
    if (!isFormValid) {
        btnSubmit.setAttribute("disabled", "disabled");
    } else {
        btnSubmit.removeAttribute("disabled");
    }
}

// Ascoltatori di eventi per i campi di validazione
document.querySelector("#title").addEventListener("blur", handleBlurTitle);
document.querySelector("#title").addEventListener("input", handleInputTitle);

document
    .querySelector("#description")
    .addEventListener("blur", handleBlurDescr);
document
    .querySelector("#description")
    .addEventListener("input", handleInputDescr);

document
    .querySelector("#rooms")
    .addEventListener("blur", () =>
        validateNumericField("rooms", "roomsField")
    );
document
    .querySelector("#rooms")
    .addEventListener("input", () =>
        validateNumericField("rooms", "roomsField")
    );

document
    .querySelector("#beds")
    .addEventListener("blur", () => validateNumericField("beds", "bedsField"));
document
    .querySelector("#beds")
    .addEventListener("input", () => validateNumericField("beds", "bedsField"));

document
    .querySelector("#bathrooms")
    .addEventListener("blur", () =>
        validateNumericField("bathrooms", "bathroomsField")
    );
document
    .querySelector("#bathrooms")
    .addEventListener("input", () =>
        validateNumericField("bathrooms", "bathroomsField")
    );

document
    .querySelector("#square_meters")
    .addEventListener("blur", validateSqrMetersField);
document
    .querySelector("#square_meters")
    .addEventListener("input", validateSqrMetersField);

const checkboxes = document.querySelectorAll("input[name='services[]']");
for (let i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener("change", checkCheckboxValidity);
}

document
    .querySelector("input[name='images[]']")
    .addEventListener("change", validateImagesField);

document
    .querySelector(".tt-search-box-input")
    .addEventListener("blur", handleBlurAddress);
document
    .querySelector(".tt-search-box-input")
    .addEventListener("change", handleInputAddress);

// Verifica iniziale della validità del form
checkFormValidation();
