<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="public/css/requests.css">
    <script type="text/javascript" src="./public/js/requests.js" defer></script>
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>REQUESTS</title>
</head>

<body>
    <div class="base-container">
        <?php include('navbar.php') ?>
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
                                            <div id="b<?=$request->getRequestingUserId()?>a<?=$request->getCruiseId()?>" class="yes">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <div id="c<?=$request->getRequestingUserId()?>a<?=$request->getCruiseId()?>" class="no">
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