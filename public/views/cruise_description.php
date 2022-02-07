<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navbar.css">   
    <link rel="stylesheet" type="text/css" href="public/css/cr_desc.css">
    <script type="text/javascript" src="./public/js/apply_for_spot.js" defer></script>
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>CRUISE_DESCRIPTION</title>
</head>

<body>
    <div class="base-container">
        <?php include('navbar.php') ?>
        <main>
            <div class="background">
                <div class="inner-background">
                    <h1><?=$cruise->getTitle() ?></h1>
                    <div class="essential-info">
                        <div class="button-and-gallery">
                            <a id="<?=$cruise->getId() ?>" class="apply-for-spot">
                                <i class="fas fa-plus"></i>
                                apply for spot
                            </a>
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
                            <a href="http://localhost:8080/user_profile?id=<?=$user->getId()?>" class="profile">
                                <img src="<?=$user->getImage()?>">
                                <?=$user->getNick() ?>
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