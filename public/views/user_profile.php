<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="public/css/user_profile.css">
    <script type="text/javascript" src="./public/js/change_image.js" defer></script>
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>USER_PROFILE</title>
</head>

<body>
    <div class="base-container">
        <?php include('navbar.php') ?>
        <main>
            <div class="background">
                <div class="inner-background">
                    <div class="picture-and-description">
                        <img src=<?=$user->getImage() ?>>
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
                                Participated Cruises
                            </div>
                            <div class="upcoming-cruises-list">
                                <ul>
                                    <?php foreach($participated_cruises as $cruise): ?>
                                        <li>
                                            <?=$cruise->getTitle()?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<template id="input-button-template">
    <form method="post" ENCTYPE="multipart/form-data">
        <input type="file" name="image-input">
    <button onclick="Edit()">Edit</button>
    </form >
    <script>
        const Edit= () => {
            fetch("/editImage", {
                method: "POST"
            })
        }
    </script>
</template>