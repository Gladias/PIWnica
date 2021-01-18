const search = document.querySelector('input[placeholder="Szukaj piw..."]');
const beerContainer = document.querySelector(".beers");

search.addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};
        document.querySelector("h2").innerHTML = "Wyniki wyszukiwania dla: " + this.value;

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (beers) {
            beerContainer.innerHTML = "";
            loadBeers(beers)
        });
    }
});

function loadBeers(beers) {
    beers.forEach(beer => {
        console.log(beer);
        createBeer(beer);
    });
}

function createBeer(beer) {
    const template = document.querySelector("#beer-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${beer.image}`
    const name = clone.querySelector("h3");
    name.innerHTML = beer.name;
    const description = clone.querySelector("p");
    description.innerHTML = beer.description;

    beerContainer.appendChild(clone);
}