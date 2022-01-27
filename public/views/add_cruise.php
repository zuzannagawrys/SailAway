<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/add_cruise.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>ADD_CRUISE</title>
</head>

<body>
    <div class="base-container">
        <nav class="navbar">
            <div class="add-project">
                <i class="fas fa-plus"></i>
                add cruise
            </div>
            <img src="public/img/logo.svg" class="logo">
            <ul>
                <li>
                    <i class="fas fa-map-marked-alt"></i>
                    <a href="#" class="button">map</a>
                </li>
                <li>
                    <i class="fas fa-user"></i>
                    <a href="#" class="button">profile</a>
                </li>
                <li>
                    <i class="fas fa-bell"></i>
                    <a href="#" class="button">notifications</a>
                </li>
                <li>
                    <i class="fas fa-hand-point-right"></i>
                    <a href="#" class="button">requests</a>
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
                        START DATE
                        <input name="startDate" type="date" placeholder="start date">
                        END DATE
                        <input name="endDate" type="date" placeholder="end date">
                        <input name="basin" type="text" placeholder="basin">
                        <input name="freePlaces" type="number" placeholder="number of free spots left">
                        <input name="price" type="text" placeholder="price per person">
                        <input name="placeOfEmbarkation" type="text" placeholder="place of embarkation">
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