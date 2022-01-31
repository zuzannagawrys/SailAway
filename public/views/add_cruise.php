<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/add_cruise.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>ADD_CRUISE</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        var geocoder;

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
        }
        //Get the latitude and the longitude;
        function successFunction(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            codeLatLng(lat, lng)
        }

        function errorFunction(){
            alert("Geocoder failed");
        }

        function initialize() {
            geocoder = new google.maps.Geocoder();



        }

        function codeLatLng(lat, lng) {

            var latlng = new google.maps.LatLng(lat, lng);
            geocoder.geocode({'latLng': latlng}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results)
                    if (results[1]) {
                        //formatted address
                        alert(results[0].formatted_address)
                        //find country name
                        for (var i=0; i<results[0].address_components.length; i++) {
                            for (var b=0;b<results[0].address_components[i].types.length;b++) {

                                //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                    //this is the object you are looking for
                                    city= results[0].address_components[i];
                                    break;
                                }
                            }
                        }
                        //city data
                        alert(city.short_name + " " + city.long_name)


                    } else {
                        alert("No results found");
                    }
                } else {
                    alert("Geocoder failed due to: " + status);
                }
            });
        }
    </script>
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
                    <a href="http://localhost:8080/user_profile#" class="button">profile</a>
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
                        <input name="freePlaces" type="number" placeholder="number of free spots left">
                        <input name="price" type="text" placeholder="price per person">
                        <div id=placeOfEmbarkation" >
                            <input name="placeOfEmbarkation" type="text" placeholder="place of embarkation">
                        </div>
                        <input name="timeOfEmbarkation" type="text" placeholder="time of embarkation">
                        <input name="placeOfDisembarkation" type="text" placeholder="place of disembarkation">
                        <input name="timeOfDisembarkation" type="text" placeholder="time of disembarkation">
                        <textarea name="description" rows="20" placeholder="description"></textarea>
                        <input type="file" name="file">
                        <button type="submit">SEND</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
        
</body>