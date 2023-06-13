<?php
include_once("./lib/controller/users_controller.php");

$userController = new UsersController();

if (isset($_POST['email']) || isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userController->login($email, $password);
}

?>

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
            <a type="button" class="navbar-basket" onclick="basketShowHide()">
                <img src="./assets/img/basket.svg" alt="Logo" width="35" height="28">
            </a>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <div class="profile">
                    <a type="button" class="navbar-logged" href="../flower/lib/service/logout.php" onclick="">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['img']); ?>" alt="Imagem" width="35" height="28">
                    </a>
                </div>
            <?php
            } else {
            ?>
                <a type="button" class="navbar-profile" onclick="showLogin()">
                    <img src="./assets/img/profile.svg" alt="Profile" width="30" height="30">
                </a>
            <?php
            }
            ?>
        </nav>
    </header>

    <div class="container-login" id="Login">
        <div class="close" onclick="closeLogin()"></div>
        <form class="login" id="logged" action="" method="POST">
            <img src="./assets/img/logo.svg" alt="logo" width="82" height="85">
            <div class="user">
                <img src="./assets/img/user.svg" alt="Icone de Usuário">
                <input type="text" placeholder="Email" name="email" required>
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
            <a class="register" type="button" onclick="showRegister()"><strong>New here? Sign up now!</strong></a>
        </form>
        <form class="login registered" id="registered" action="" method="POST">
            <img src="./assets/img/logo.svg" alt="logo" width="82" height="85">
            <div class="user">
                <img src="./assets/img/user.svg" alt="Icone de Usuário">
                <input type="text" placeholder="Email" name="Remail" required>
            </div>
            <div class="user">
                <img class="lock" src="./assets/img/Lock.svg" alt="Senha Lock">
                <input type="password" placeholder="Password" name="Rpassword" required>
            </div>
            <div class="user">
                <img class="lock" src="./assets/img/Lock.svg" alt="Senha Lock">
                <input type="password" placeholder="Confirm Password" name="RCpassword" required>
            </div>
            <button class="btn-login" type="submit">REGISTER</button>
            <a class="register" type="button" onclick="showRegister()"><strong>Already registered? Log in by clicking here!</strong></a>
        </form>
    </div>

    <div class="container-sm basket" id="basket">
        <?php
        if (!isset($_SESSION['basket']) || empty($_SESSION['basket'])) {
        ?>
            <div class="void">
                <h3><strong>Your cart is empty.</strong></h3>
                <img src="./assets/img/sad.svg" width="82" height="85" alt="sadface">
            </div>
            <?php
        } else {
            $total = 0;
            foreach ($_SESSION['basket'] as $key => $product) {
            ?>
                <div class="card mb-3" style="max-width: 540px; margin-top: 10px;">
                    <a class="remove" href="?remove=<?php echo $key ?>"><img src="./assets/img/Trash.svg" width="28" height="28" alt="trash"></a>
                    <a class="remove add" href="?addone=<?php echo $key ?>"><img src="./assets/img/add.svg" width="28" height="28" alt="trash"></a>
                    <a class="remove one" href="?removeone=<?php echo $key ?>"><img src="./assets/img/rmv.svg" width="28" height="28" alt="trash"></a>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($product['img']); ?>" style="height: 120px; width: 120px" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name'] ?></h5>
                                <p class="card-text"><small class="text-body-secondary"><strong> R$ <?php echo number_format($product['price'] * $product['amount'], 2) ?></strong></small></p>
                                <p class="card-text" style="margin-top: -20px;"><small class="text-body-secondary"><strong> Qty: <?php echo $product['amount'] ?></strong></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $total += $product['price'] * $product['amount'];
            }
            ?>
            <div class="total">
                <span>
                    <?php echo "Total: R$ " . number_format($total, 2); ?>
                </span>
                <a href="#"><button class="purchase">Purchase</button></a>
            </div>
        <?php
        }
        ?>
    </div>

    <?php
    if (isset($_GET['addone'])) {
        $idProduct = (int) $_GET['addone'];

        if (isset($_SESSION['basket'][$idProduct]['amount'])) {
            $_SESSION['basket'][$idProduct]['amount']++;
        }

        unset($_GET['addone']);
        ob_end_clean();
        header("Location: index.php");
    }
    if (isset($_GET['removeone'])) {
        $idProduct = (int) $_GET['removeone'];

        if (isset($_SESSION['basket'][$idProduct]['amount'])) {
            if ($_SESSION['basket'][$idProduct]['amount'] > 1) {
                $_SESSION['basket'][$idProduct]['amount']--;
            } else {
                unset($_SESSION['basket'][$idProduct]);
            }
        }

        unset($_GET['removeone']);
        ob_end_clean();
        header("Location: index.php");
    }
    if (isset($_GET['remove'])) {
        $idProduct = (int) $_GET['remove'];

        if (isset($_SESSION['basket'][$idProduct]['amount'])) {
            if ($_SESSION['basket'][$idProduct]['amount'] >= 1) {
                unset($_SESSION['basket'][$idProduct]);
            }
        }

        unset($_GET['remove']);
        ob_end_clean();
        header("Location: index.php");
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="./assets/js/home.js?v=<?php echo time(); ?>"></script>
</body>

</html>