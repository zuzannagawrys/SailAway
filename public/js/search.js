const searchNumberOfDays = document.querySelector('input[name="numberOfDays"]');
const cruiseContainer = document.querySelector(".map");
const mapScript = document.querySelector("#map-script");

searchNumberOfDays.addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();

            const data = {search: this.value};

            fetch("/searchNumberOfDays", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(function (response) {
                return response.json();
            }).then(function (cruises) {
            });
        }
    });






