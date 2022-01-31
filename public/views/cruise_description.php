<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/cr_desc.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>CRUISE_DESCRIPTION</title>
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
                    <div class="essential-info">
                        <div class="button-and-gallery">
                            <div class="apply-for-spot">
                                <i class="fas fa-plus"></i>
                                apply for spot
                            </div>
                            <div class="gallery">
                                <div class="gallery-sidepanel">
                                    <i class="fas fa-arrow-left"></i>
                                </div>
                                
                                <img src="public/uploads/<?=$cruise->getImage() ?>">
                                <div class="gallery-sidepanel">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="captain-and-info">
                            <div class="captain-description">
                                Captain
                            </div>
                            <a href="#" class="profile">
                                <img src="public/img/user.jpg">
                                Konrado
                            </a>
                            <div class="cruise-important-information-description">
                                Information
                            </div>
                            <div class="cruise-important-information">
                                <ul>
                                    <li>
                                        Dates:
                                        <div class="info">
                                            <?=$cruise->getStartDate() ?> - <?=$cruise->getEndDate() ?>
                                        </div>
                                    </li>
                                    <li>
                                        Basin:
                                        <div class="info">
                                            <?=$cruise->getBasin() ?>
                                        </div>
                                    </li>
                                    <li>
                                        Free spots:
                                        <div class="info">
                                            <?=$cruise->getFreePlaces() ?>
                                        </div>
                                    </li>
                                    <li>
                                        Price per person:
                                        <div class="info">
                                            <?=$cruise->getPrice() ?>
                                        </div>
                                    </li>
                                    <li>
                                        Place of embarkation:
                                        <div class="info">
                                            <?=$cruise->getPlaceOfEmbarkation() ?>
                                        </div>
                                    </li>
                                    <li>
                                        Time of embarkation:
                                        <div class="info">
                                            <?=$cruise->getTimeOfEmbarkation() ?>
                                        </div>
                                    </li>
                                    <li>
                                        Place of disembarkation:
                                        <div class="info">
                                            <?=$cruise->getPlaceOfDisembarkation() ?>
                                        </div>
                                    </li>
                                    <li>
                                        Time of disembarkation:
                                        <div class="info">
                                            <?=$cruise->getTimeOfDisembarkation() ?>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="detail-information">
                        <div class="detail-information-description">
                            Detail Information
                        </div>
                        <div class="detail-information-content">
                            <?= $cruise->getDescription() ?>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
        
</body>