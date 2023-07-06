let ttInputBg = document.querySelector(".tt-search-box");
let ttInputContainer = document.querySelector(".tt-search-box-input-container");
let ttInput = document.querySelector("input.tt-search-box-input");

ttInputBg.style.background = "none";
ttInputBg.style.margin = 0;
ttInputContainer.classList.add("border-tomtom");
ttInput.setAttribute("name", "address");
ttInput.setAttribute("required", "true");
