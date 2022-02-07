<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="public/css/notifications.css">
    <script type="text/javascript" src="./public/js/notifications.js" defer></script>
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>NOTIFICATIONS</title>
</head>

<body>
    <div class="base-container">
        <?php include('navbar.php') ?>
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