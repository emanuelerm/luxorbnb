import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

//Menu-toggle
const el = document.getElementById("wrapper");
const toggleButton = document.getElementById("menu-toggle");

toggleButton.addEventListener("click", function () {
    el.classList.toggle("toggled");
});

