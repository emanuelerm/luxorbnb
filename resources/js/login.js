const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const container = document.getElementById("container");

signUpButton.addEventListener("click", () => {
    container.classList.add("right-panel-active");
    // let inputs = document.querySelectorAll("input");
    // inputs.forEach((input) => {
    //     input.value = "";
    //     input.classList.remove("is-invalid");
    // });
});

signInButton.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
    // let inputs = document.querySelectorAll("input");
    // inputs.forEach((input) => {
    //     input.value = "";
    // });
});

const passwordInput = document.querySelector("#password");
const passwordConfirmInput = document.querySelector("#password-confirm");
const wrongPsw = document.querySelector("#wrong-password strong");
const registerBtn = document.querySelector("#register-button");

function checkEmptyPassword() {
    if (passwordInput.value.length < 8) {
        passwordInput.classList.add("is-invalid", "border", "border-danger");
    } else {
        passwordInput.classList.remove("is-invalid", "border", "border-danger");
        passwordInput.classList.add("border", "border-success");
    }
}

function checkPasswordMatch() {
    if (passwordInput.value !== passwordConfirmInput.value) {
        passwordConfirmInput.classList.add(
            "is-invalid",
            "border",
            "border-danger"
        );
        wrongPsw.textContent = "Le password non coincidono";
        registerBtn.setAttribute("disabled", "disabled");
    } else if (
        passwordInput.value === "" &&
        passwordConfirmInput.value === ""
    ) {
        passwordConfirmInput.classList.add(
            "is-invalid",
            "border",
            "border-danger"
        );
        wrongPsw.textContent = "La password è obbligatoria";
        registerBtn.setAttribute("disabled", "disabled");
    } else {
        passwordConfirmInput.classList.remove(
            "is-invalid",
            "border",
            "border-danger"
        );
        passwordInput.classList.add("border", "border-success");
        passwordConfirmInput.classList.add("border", "border-success");
        wrongPsw.textContent = "";
        registerBtn.removeAttribute("disabled");
    }
}

passwordInput.addEventListener("blur", checkEmptyPassword);
passwordInput.addEventListener("input", checkEmptyPassword);

passwordConfirmInput.addEventListener("input", checkPasswordMatch);
passwordConfirmInput.addEventListener("blur", checkPasswordMatch);
