let options = {
    searchOptions: {
        key: "6Zdz4adkb3YzaPURg8Zg71KMzMez217G",
        language: "it-IT",
        limit: 5,
    },
    autocompleteOptions: {
        key: "6Zdz4adkb3YzaPURg8Zg71KMzMez217G",
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
