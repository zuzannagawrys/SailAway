<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/notifications.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>NOTIFICATIONS</title>
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
                    <div class="notifications">
                        <div class="notifications-description">
                            Notifications
                        </div>
                        <div class="notifications-list">
                            <ul>
                                <li>
                                    <div class="ex">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    Midimo zaakceptowal Twoje zaproszenie do znajomych. 
                                </li>
                            </ul>
                        </div>
                    </div>   
                </div>
            </div>
        </main>
    </div>
</body>