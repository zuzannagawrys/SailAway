<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/user_profile.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>USER_PROFILE</title>
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
                    <div class="picture-and-description">
                        <img src="public/img/user.jpg">
                        <div class="opis">
                            <div class="nick">
                                <?=$user->getNick() ?>
                            </div>
                            <div class="name-surname">
                                <?=$user->getName() ?>&nbsp;&nbsp;<?=$user->getSurname() ?>
                            </div>
                        </div>
                    </div>
                    <div class="organised-upcoming">
                        <div class="organised-cruises">
                            <div class="organised-cruises-description">
                                Organised Cruises
                            </div>
                            <div class="organised-cruises-list">
                                <ul>
                                <?php foreach($organised_cruises as $cruise): ?>
                                            <li>
                                                <a href="http://localhost:8080/cruise_description?id=<?=$cruise->getId()?>"><?=$cruise->getTitle()?></a>
                                            </li>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="upcoming-cruises">
                            <div class="upcoming-cruises-description">
                                Upcoming Cruises
                            </div>
                            <div class="upcoming-cruises-list">
                                <ul>
                                    <li>
                                        Mazury
                                    </li>
                                    <li>
                                        Morze Śródziemne
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="past-friends">
                        <div class="past-cruises">
                            <div class="past-cruises-description">
                                Past Cruises
                            </div>
                            <div class="past-cruises-list">
                                <ul>
                                    <li>
                                        Mazury
                                    </li>
                                    <li>
                                        Morze Śródziemne
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="friends">
                            <div class="friends-description">
                                Friends
                            </div>
                            <div class="friends-list">
                                <ul>
                                    <li>
                                        <img src=public/img/user.jpg>
                                        Midimo
                                    </li>
                                    <li>
                                        <img src=public/img/user.jpg>
                                        John Con
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>