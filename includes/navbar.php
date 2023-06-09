<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "header.php" ?>
</head>

<body>
    <header>
        <nav class="newsletter" data-bs-theme="dark" id="newsletter">
            <img src="./assets/img/message.svg" alt="news" width="18" height="18">
            <span>Subscribe to our newsletter and get <b>20% OFF</b> on your first purchase.</span>
            <a href="#">Sign me up now</a>
            <button type="button" class="btn-close" aria-label="Close" onclick="newsLetterClose()"></button>
        </nav>
        <nav class="navbar">
            <a class="navbar-brand" href="#">
                <img src="./assets/img/logo.svg" alt="Logo" width="55" height="55">
            </a>
            <ul class="navbar-features">
                <li><a href="#">Featured</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="search">
                <img src="./assets/img/glass.svg" alt="search" width="25" height="22">
                <input name="search" id="search" placeholder="Search for...">
            </div>
            <a type="button" class="navbar-basket" href="../flower/basket.php">
                <img src="./assets/img/basket.svg" alt="Logo" width="35" height="28">
            </a>
            <a type="button" class="navbar-profile" onclick="showLogin()">
                <img src="./assets/img/profile.svg" alt="Logo" width="35" height="28">
            </a>
        </nav>
    </header>

    <div class="container-login" id="Login">
        <div class="close" onclick="closeLogin()"></div>
        <form class="login" action="" method="POST">
            <img src="./assets/img/logo.svg" alt="logo" width="82" height="85">
            <div class="user">
                <img src="./assets/img/user.svg" alt="Icone de Usuário">
                <input type="text" placeholder="User" name="email" required>
            </div>
            <div class="user">
                <img class="lock" src="./assets/img/Lock.svg" alt="Senha Lock">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="forget">
                <input class="check" type="checkbox" id="manter">
                <label for="manter"><strong>Keep me connected</strong></label>
                <a href="#"><strong>Forgot password?</strong></a>
            </div>
            <button class="btn-login" type="submit">LOGIN</button>
            <a class="register" href="#"><strong>New here? Sign up now!</strong></a>
        </form>
    </div>

    <div class="container-sm basket" id="basket">

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="./assets/js/home.js"></script>
</body>

</html>