<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/requests.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>REQUESTS</title>
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
                    <div class="notifications">
                        <div class="notifications-description">
                            REQUESTS
                        </div>
                        <div class="notifications-list">
                            <ul>
                                <?php foreach($requests as $request): ?>
                                <li>
                                    <div class="texts-and-stuff">
                                        <div class="texts">
                                            <a href="http://localhost:8080/user_profile?id=<?=$request->getRequestingUserId()?>"><b><?=$request->getRequestingUserNick()?></b></a> asks to be a part of your cruise: <a href="http://localhost:8080/cruise_description?id=<?=$request->getCruiseId()?>"><b><?=$request->getCruiseTitle()?></b></a>
                                        </div>
                                        <div class="stuff">
                                            <div class="yes">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div class="no">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>   
                </div>
            </div>
        </main>
    </div>
</body>