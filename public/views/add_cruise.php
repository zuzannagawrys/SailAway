<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/add_cruise.css">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>ADD_CRUISE</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
    <style>
        body { margin: 0; padding: 0; }
        #map {
            width: 40vw;
            height: 40vh;
            margin: 1em;
        }
    </style>
</head>

<body>
    <div class="base-container">
        <nav class="navbar">
            <a href="http://localhost:8080/addCruise" class="add-project">
                <i class="fas fa-plus"></i>
                add cruise
            </a>
            <img src="public/img/logo.svg" class="logo">
            <ul>
                <li>
                    <i class="fas fa-map-marked-alt"></i>
                    <a href="http://localhost:8080/map_view#" class="button">map</a>
                </li>
                <li>
                    <i class="fas fa-user"></i>
                    <a href="http://localhost:8080/user_profile?id=<?=$_SESSION['username']?>" class="button">profile</a>
                </li>
                <li>
                    <i class="fas fa-bell"></i>
                    <a href="http://localhost:8080/notifications" class="button">notifications</a>
                </li>
                <li>
                    <i class="fas fa-hand-point-right"></i>
                    <a href="http://localhost:8080/requests" class="button">requests</a>
                </li>
            </ul>
        </nav>
        <main>
            <div class="background">
                <div class="inner-background">
                    <h1>UPLOAD YOUR CRUISE</h1>
                    <form action="addCruise" method="post" ENCTYPE="multipart/form-data">
                        <div class="messages">
                            <?php if(isset($messages))
                            {
                                foreach ($messages as $message){
                                    echo $message;
                                }
                            }
                            ?>
                        </div>
                        <input name="title" type="text" placeholder="cruise name">
                        <div class="desc">
                            START DATE
                        </div>
                        <input name="startDate" type="date" placeholder="start date">
                        <div class="desc">
                            END DATE
                        </div>
                        <input name="endDate" type="date" placeholder="end date">
                        <input name="basin" type="text" placeholder="basin">
<!--                        <div class="desc">-->
<!--                            PIN YOUR JOURNEY-->
<!--                        </div>-->
                        <a class="add-project" href="https://www.latlong.net/convert-address-to-lat-long.html"> click here to look up coordinates</a>
                        <!-- Load the `mapbox-gl-geocoder` plugin. -->
<!--                        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>-->
<!--                        <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">-->
<!---->
<!--                            <div id="map">-->
<!--                            </div>-->
<!--                            <div id="result"></div>-->
<!--                            <script>-->
<!--                                mapboxgl.accessToken = 'pk.eyJ1IjoienV6YWdhd3J5cyIsImEiOiJja3ZpNGtpcW8xdDNqMm9xNTV5NngwZXlvIn0.t4FWQezDYrT9EQQKmi4RPQ';-->
<!--                                const map = new mapboxgl.Map({-->
<!--                                    container: 'map',-->
<!--                                    style: 'mapbox://styles/mapbox/streets-v11',-->
<!--                                    center: [-79.4512, 43.6568],-->
<!--                                    zoom: 13-->
<!--                                });-->
<!---->
<!--                                // Add the control to the map.-->
<!--                                const geocoder=new MapboxGeocoder({accessToken: mapboxgl.accessToken, mapboxgl: mapboxgl, })-->
<!--                                map.addControl(geocoder);-->
<!--                                geocoder.addTo('#geocoder');-->
<!---->
<!--                                // Get the geocoder results container.-->
<!--                                const results = document.getElementById('result');-->
<!--                                // Add geocoder result to container.-->
<!--                                geocoder.on('result', (e) => {-->
<!--                                    results.innerText = JSON.stringify(e.result, null, 2);-->
<!--                                });-->
<!--                                // Clear results container when search is cleared.-->
<!--                                geocoder.on('clear', () => {-->
<!--                                    results.innerText = '';-->
<!--                                });-->
<!--                                // console.log(results);-->
<!--                                // let inp = document.createElement('input');-->
<!--                                // inp.name = 'location';-->
<!--                                // inp.type='hidden';-->
<!--                                // inp.innerText = results.innerText;-->
<!--                                // document.body.appendChild(inp);-->
<!--                            </script>-->
                        <input name="ylocation" type="number" step="0.000001" placeholder="latitude">
                        <input name="xlocation" type="number" step="0.000001" placeholder="longitude">
                        <input name="freePlaces" type="number" placeholder="number of free spots left">
                        <input name="price" type="text" placeholder="price per person">
                        <div id="placeOfEmbarkation" >
                            <input name="placeOfEmbarkation" type="text" placeholder="place of embarkation">
                        </div>
                        <input name="timeOfEmbarkation" type="text" placeholder="time of embarkation">
                        <input name="placeOfDisembarkation" type="text" placeholder="place of disembarkation">
                        <input name="timeOfDisembarkation" type="text" placeholder="time of disembarkation">
                        <textarea name="description" rows="20" placeholder="description"></textarea>
                        <input type="file" name="file">
                        <button type="submit" >SEND</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>