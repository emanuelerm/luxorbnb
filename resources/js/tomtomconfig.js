let options = {
    searchOptions: {
        key: "EopC1RkBTup2TT7PwQUK9a1L3IUYg02g",
        language: "it-IT",
        limit: 5,
    },
    autocompleteOptions: {
        key: "EopC1RkBTup2TT7PwQUK9a1L3IUYg02g",
        language: "it-IT",
    },
    labels: {
        noResultsMessage: "Nessun risultato trovato.",
    },
};

const input = document.getElementById("address");

let ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
let searchBoxHTML = ttSearchBox.getSearchBoxHTML();

input.append(searchBoxHTML);
