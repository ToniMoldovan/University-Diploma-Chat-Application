<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="/">
        <img src="<?php echo $GLOBALS['assets'] . 'images/chat-app-logo.png'; ?>" alt="logo" height="60">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Rooms</a>
            </li>
            <li class="nav-item ml-lg-2">
                <a class="nav-link" href="/rooms/create">New Room</a>
            </li>
            <li class="nav-item dropdown ml-lg-4">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="profile-picture" src="<?php echo $GLOBALS['assets'] . 'images/default-user-profile-picture.png'; ?>" alt="Profile Picture">
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">My Rooms</a>
                    <a class="dropdown-item" href="#">Edit Profile</a>
                    <a class="dropdown-item" href="/logout-user">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
