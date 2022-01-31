const search = document.querySelector('input[placeholder="search basin"]');
const searchStartDate = document.querySelector('input[name="startDate"]');
const cruiseContainer = document.querySelector(".map");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (cruises) {
            cruiseContainer.innerHTML = "";
            loadCruises(cruises)
        });
    }
});
searchStartDate.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/searchStartDate", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (cruises) {
            cruiseContainer.innerHTML = "";
            loadCruises(cruises)
        });
    }
});

function loadCruises(cruises) {
    cruises.forEach(cruise => {
        console.log(cruise);
        createCruise(cruise);
    });
}

function createCruise(cruise) {
    const template = document.querySelector("#cruise-template");

    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("div");
    div.id = cruise.id;
    const title = clone.querySelector(".title");
    title.innerHTML = cruise.title;
    const start_date = clone.querySelector(".start_date");
    start_date.innerHTML = cruise.start_date;
    const end_date = clone.querySelector(".end_date");
    end_date.innerHTML = cruise.end_date;
    const basin = clone.querySelector(".basin");
    basin.innerHTML = cruise.basin;
    const free_places = clone.querySelector(".free_places");
    free_places.innerHTML = cruise.free_places;
    const price= clone.querySelector(".price");
    price.innerHTML = price.title;
    const place_of_embarkation = clone.querySelector(".place_of_embarkation");
    place_of_embarkation.innerHTML = cruise.place_of_embarkation;
    const time_of_embarkation = clone.querySelector(".time_of_embarkation");
    time_of_embarkation.innerHTML = cruise.time_of_embarkation;
    const place_of_disembarkation = clone.querySelector(".place_of_disembarkation");
    place_of_disembarkation.innerHTML = cruise.place_of_disembarkation;
    const time_of_disembarkation = clone.querySelector(".time_of_disembarkation ");
    time_of_disembarkation .innerHTML = cruise.time_of_disembarkation ;
    cruiseContainer.appendChild(clone);
}
