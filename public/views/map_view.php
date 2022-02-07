<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" type="text/css" href="public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="public/css/mapp_view.css">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>MAP_VIEW</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        main{
            position: fixed;
            margin-left: 25vw;
            width: 78vw;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 78vw;
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
            max-width: 300px;
            padding: 0.5em;
        }

        .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Playfair Display';
            font-size: larger;
            background-color: #302618;
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <div class="base-container">
        <?php include('navbar.php') ?>
        <main>
            <section class="map">
                <div id='map'></div>
                    <script id="map-script">

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
                                        description: '<h2><?=$cruise->getTitle() ?></h2>Dates: <?=$cruise->getStartDate() ?> - <?=$cruise->getEndDate() ?><br />Basin: <?=$cruise->getBasin() ?><br />Free spots: <?=$cruise->getFreePlaces() ?><br />Price per person: <?=$cruise->getPrice() ?><br />Place of embarkation: <?=$cruise->getPlaceOfEmbarkation() ?><br />Time of embarkation: <?=$cruise->getTimeOfEmbarkation() ?><br />Place of disembarkation: <?=$cruise->getPlaceOfDisembarkation() ?><br />Time of disembarkation: <?=$cruise->getTimeOfDisembarkation() ?>'
                                    }
                                },
                                <?php endforeach; ?>
                            ]
                        };

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

            </section>
        </main>
    </div>
</body>
