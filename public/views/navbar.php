<!DOCTYPE html>
<nav class="navbar">
            <a href="http://20.16.165.177/addCruise" class="add-project">
                <i class="fas fa-plus"></i>
                add cruise
            </a>
            <img src="public/img/logo.svg" class="logo">
            <ul>
                <li>
                    <i class="fas fa-map-marked-alt"></i>
                    <a href="http://20.16.165.177/map_view#" class="button">map</a>
                </li>
                <li>
                    <i class="fas fa-user"></i>
                    <a href="http://20.16.165.177/user_profile?id=<?=$_SESSION['username']?>" class="button">profile</a>
                </li>
                <li>
                    <i class="fas fa-bell"></i>
                    <a href="http://20.16.165.177/notifications" class="button">notifications</a>
                </li>
                <li>
                    <i class="fas fa-hand-point-right"></i>
                    <a href="http://20.16.165.177/requests" class="button">requests</a>
                </li>
                <li>
                    <i class="fas fa-sign-out-alt"></i>
                    <a href="http://20.16.165.177/logout" class="button">logout</a>
                </li>
            </ul>
</nav>