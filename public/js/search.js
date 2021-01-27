let search;
const beerContainer = document.querySelector(".beers");

setTimeout(function() {
    search = document.querySelectorAll('input[placeholder="Szukaj piw..."]');

    search.forEach(element => {
        element.addEventListener("keyup", function(event) {
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
    });
}, 1000);

function loadBeers(beers) {
    beers.forEach(beer => {
        console.log(beer.id);
        createBeer(beer);
    });
}

function createBeer(beer) {
    const template = document.querySelector("#beer-template");

    const clone = template.content.cloneNode(true);

    const a = clone.querySelector(".search-result");
    a.href = `beer?id=` + beer.id;
    a.id = beer.id;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${beer.image}`
    const name = clone.querySelector("h3");
    name.innerHTML = beer.name;
    const description = clone.querySelector("p");
    description.innerHTML = beer.description;

    beerContainer.appendChild(clone);
}