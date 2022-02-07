<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="public/css/add_cruise.css">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>ADD_CRUISE</title>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js"></script>
</head>

<body>
    <div class="base-container">
        <?php include('navbar.php') ?>
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
                        <a class="add-project" href="https://www.latlong.net/convert-address-to-lat-long.html"> click here to look up coordinates</a>
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