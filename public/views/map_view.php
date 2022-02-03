<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="public/css/mapp_view.css">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>MAP_VIEW</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 75vw;
        }
        .marker {
            background-image: url("public/img/jachcik.png");
            background-size: cover;
            background-origin: border-box;
            background-repeat: no-repeat;
            width: 50px;
            height: 50px;
            /*border-radius: 50%;*/
            cursor: pointer;
        }
        .mapboxgl-popup {
            max-width: 200px;
        }

        .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
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
                    <i class="fas fa-search"></i>
                    <div class="search-bar">
                            <input placeholder="search basin">
                    </div>
                </li>
                <li>
                    <i class="far fa-calendar-alt"></i>
                    <div class="dates">
                        <form>
                            <input name="startDate" type="date" placeholder="start date">-<input name="endDate" type="date" placeholder="end date">
                        </form>
                    </div>
                </li>
                <li>
                    <i class="fas fa-mitten"></i>
                    <div class="spots">
                        <form>
                            <input name="freePlaces" type="number" placeholder="number of spots">
                    </form>
                </div>
                </li>
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
            <section class="map">
                <div id='map'></div>
                <script>

                    mapboxgl.accessToken = 'pk.eyJ1IjoienV6YWdhd3J5cyIsImEiOiJja3ZpNGtpcW8xdDNqMm9xNTV5NngwZXlvIn0.t4FWQezDYrT9EQQKmi4RPQ';

                    const map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/mapbox/light-v10',
                        center: [-96, 37.8],
                        zoom: 3
                    });

                    const geojson = {
                        type: 'FeatureCollection',
                        features: [
                            <?php foreach($cruises as $cruise): ?>
                            {
                                type: 'Feature',
                                geometry: {
                                    type: 'Point',
                                    coordinates: [<?=$cruise->getXlocation() ?>, <?=$cruise->getYlocation() ?>]
                                },
                                properties: {
                                    title: '<?=$cruise->getId() ?>',
                                    description: '<b><?=$cruise->getTitle() ?><b><br />Dates:<?=$cruise->getStartDate() ?> - <?=$cruise->getEndDate() ?><br />Basin:<?=$cruise->getBasin() ?><br />Free spots: <?=$cruise->getFreePlaces() ?><br />Price per person: <?=$cruise->getPrice() ?><br />Place of embarkation: <?=$cruise->getPlaceOfEmbarkation() ?><br />Time of embarkation: <?=$cruise->getTimeOfEmbarkation() ?><br />Place of disembarkation: <?=$cruise->getPlaceOfDisembarkation() ?><br />Time of disembarkation: <?=$cruise->getTimeOfDisembarkation() ?>'
                                }
                            },
                            <?php endforeach; ?>
                        ]
                    };

                    // // add markers to map
                    // for (const feature of geojson.features) {
                    //     // create a HTML element for each feature
                    //     const el = document.createElement('div');
                    //     el.className = 'marker';
                    //
                    //     // make a marker for each feature and add to the map
                    //     new mapboxgl.Marker(el)
                    //         .setLngLat(feature.geometry.coordinates)
                    //         .setPopup(
                    //             new mapboxgl.Popup({
                    //                 offset: 25 }) // add popups
                    //                 .setHTML(
                    //                     `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
                    //                 )
                    //         )
                    //         .addTo(map);
                    // }
                    // add markers to map
                    for (const feature of geojson.features) {
                        // create a HTML element for each feature
                        const el = document.createElement('div');
                        el.className = 'marker';


                        // make a marker for each feature and add to the map
                        const marker =new mapboxgl.Marker(el)
                            .setLngLat(feature.geometry.coordinates);

                        const popup =new mapboxgl.Popup({
                            closeButton: false,
                            closeOnClick: false,
                            offset: 25 }) // add popups
                            .setHTML(
                                `<p>${feature.properties.description}</p>`
                            );
                        const element = marker.getElement();
                        element.id = 'marker';
                        element.addEventListener('mouseenter', () => popup.addTo(map));
                        element.addEventListener('mouseleave', () => popup.remove());
                        element.addEventListener('click', event => {
                            window.location.href = `http://localhost:8080/cruise_description?id=${feature.properties.title}`;
                        });
                        marker.setPopup(popup);
                        marker.addTo(map);
                    }

                </script>
<!--               --><?php //foreach($cruises as $cruise): ?>
<!--                <div class="cruise-important-information-description">-->
<!--                    Information-->
<!--                </div>-->
<!--                <div class="cruise-important-information">-->
<!--                    <ul>-->
<!--                        <li>-->
<!--                            Dates:-->
<!--                            <div class="info">-->
<!--                                --><?//=$cruise->getStartDate() ?><!-- - --><?//=$cruise->getEndDate() ?>
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            Basin:-->
<!--                            <div class="info">-->
<!--                                --><?//=$cruise->getBasin() ?>
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            Free spots:-->
<!--                            <div class="info">-->
<!--                                --><?//=$cruise->getFreePlaces() ?>
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            Price per person:-->
<!--                            <div class="info">-->
<!--                                --><?//=$cruise->getPrice() ?>
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            Place of embarkation:-->
<!--                            <div class="info">-->
<!--                                --><?//=$cruise->getPlaceOfEmbarkation() ?>
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            Time of embarkation:-->
<!--                            <div class="info">-->
<!--                                --><?//=$cruise->getTimeOfEmbarkation() ?>
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            Place of disembarkation:-->
<!--                            <div class="info">-->
<!--                                --><?//=$cruise->getPlaceOfDisembarkation() ?>
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            Time of disembarkation:-->
<!--                            <div class="info">-->
<!--                                --><?//=$cruise->getTimeOfDisembarkation() ?>
<!--                            </div>-->
<!--                        </li>-->
<!--                    </ul>-->
<!---->
<!--                </div>-->
<!--                --><?php //endforeach; ?>
            </section>
        </main>
    </div>
</body>
<template id="cruise-template">
    <div id="">
        <div class="title">
            title
        </div>
        <div class="dates">
            <div class="start_date">
                start_date
            </div>
            -
            <div class="end_date">
                end_date
            </div>
        </div>
        <div class="basin">
            basin
        </div>
        <div class="free_places">
            free_places
        </div>
        <div class="price">
            price
        </div>
        <div class="place_of_embarkation">
            place_of_embarkation
        </div>
        <div class="time_of_embarkation">
            time_of_embarkation
        </div>
        <div class="place_of_disembarkation">
            place_of_disembarkation
        </div>
        <div class="time_of_disembarkation">
            time_of_disembarkation
        </div>
    </div>
</template>