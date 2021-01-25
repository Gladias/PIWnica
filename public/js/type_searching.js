const search = document.querySelector('select');
const catalogContainer = document.querySelector(".best-beers");

search.addEventListener('change', function(event) {
    event.preventDefault();
    const option = {search: this.value};

    fetch("/bestBeersSearch", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(option)
    }).then(function (response) {
        return response.json();
    }).then(function (beers) {
        catalogContainer.innerHTML = "";
        loadBestBeers(beers)
    });
});

function loadBestBeers(beers) {
    beers.forEach(beer => {
        console.log(beer);
        createBeer(beer);
    });
}

function createBeer(beer) {
    const template = document.querySelector("#beer-template");

    const clone = template.content.cloneNode(true);

    const a = clone.querySelector(".catalog-bar");
    a.href = `beer?id=` + beer.id;
    a.id = beer.id;
    const name = clone.querySelector(".name");
    name.innerHTML = beer.name;
    const rating = clone.querySelector(".rating");
    rating.innerHTML = beer.rating;
    const votes = clone.querySelector(".votes");
    votes.innerHTML = beer.rates_number;

    catalogContainer.appendChild(clone);
}