<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/notifications.css">
    <script type="text/javascript" src="./public/js/notifications.js" defer></script>
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
                            NOTIFICATIONS
                        </div>
                        <div class="notifications-list">
                            <ul>
                                <?php foreach($notifications as $notification): ?>
                                <li>
                                    <div id="b<?=$notification->getNotifyingUserId()?>a<?=$notification->getCruiseId()?>" class="ex">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="notifications-text">
                                        <?php if ($notification->isAccepted()): ?>
                                            <a href="http://localhost:8080/user_profile?id=<?=$notification->getNotifyingUserId()?>"><b><?=$notification->getNotifyingUserNick()?></b></a> has accepted you as a crewman for their cruise: <a href="http://localhost:8080/cruise_description?id=<?=$notification->getCruiseId()?>"><b><?=$notification->getCruiseTitle()?></b></a> for further information please contact this email <b><?=$notification->getNotifyingUserEmail()?></b>
                                        <?php else: ?>
                                            <a href="http://localhost:8080/user_profile?id=<?=$notification->getNotifyingUserId()?>"><b><?=$notification->getNotifyingUserNick()?></b></a> has not accepted you as a crewman for their cruise: <a href="http://localhost:8080/cruise_description?id=<?=$notification->getCruiseId()?>"><b><?=$notification->getCruiseTitle()?></b></a>. See you next time.
                                        <?php endif ?>
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