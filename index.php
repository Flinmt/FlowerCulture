<?php
include_once("./lib/controller/products_controller.php");
ob_start();

if (!isset($_SESSION['user'])) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "./includes/header.php" ?>
    <title>HomePage</title>
</head>

<body>
    <?php include_once "./includes/navbar.php" ?>

    <div id="carousel" class="carousel slide container-lg carousel-dark" data-bs-ride="carousel" data-bs-pause="hover">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/img/test1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./assets/img/test1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./assets/img/test1.png" class="d-block w-100" alt="...">
            </div>
        </div>

        <div class="btn-carousel">
            <button class="carousel-control-prev btn prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next btn next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container-lg categories">
        <h2>Categories</h2>
        <div class="row">
            <div class="col">
                <button class="btn-categories">
                    <img src="./assets/img/bouquet.svg" alt="Bouquets" width="60" height="60">
                </button>
                <span>Bouquets</span>
            </div>
            <div class="col">
                <button class="btn-categories">
                    <img src="./assets/img/arrangements.svg" alt="Bouquets" width="60" height="60">
                </button>
                <span>Arrangements</span>
            </div>
            <div class="col">
                <button class="btn-categories">
                    <img src="./assets/img/plants.svg" alt="Bouquets" width="60" height="60">
                </button>
                <span>Plants</span>
            </div>
            <div class="col">
                <button class="btn-categories">
                    <img src="./assets/img/flower.svg" alt="Bouquets" width="60" height="60">
                </button>
                <span>Individual flowers</span>
            </div>
            <div class="col">
                <button class="btn-categories">
                    <img src="./assets/img/others.svg" alt="Bouquets" width="55" height="55">
                </button>
                <span>Others</span>
            </div>
        </div>
    </div>

    <div class="container-lg warranty">
        <h3> <br> We promote <br> the best consumer experience</h3>
        <img src="./assets/img/satisfaction.svg" alt="satisfaction" class="garantee">
        <div class="row">
            <div class="col">
                <div class="content first">
                    <div class="mark"><img src="./assets/img/quality.svg" alt="quality"></div>
                    <h5>High-quality products</h5>
                    <p>
                        We only work with renowned and trusted brands, ensuring that each item in our catalog meets the
                        highest standards.
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="content second">
                    <div class="mark"><img src="./assets/img/package.svg" alt="quality"></div>
                    <h5>New stock daily</h5>
                    <p>
                        Our team is constantly researching and selecting the best items to add to our inventory.
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="content third">
                    <div class="mark"><img src="./assets/img/truck.svg" alt="quality"></div>
                    <h5>Fast and free shipping</h5>
                    <p>
                        As soon as you place your order, our team will take care of all the details to ensure it is
                        processed and shipped as quickly as possible.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-lg categories products">
        <h2>Featured Products</h2>
        <div class="row">
            <?php

            $controller = new ProductsController();
            $products = $controller->getListOfObjects();

            if ($products != null) {
                $col = 0;
                foreach ($products as $key => $product) {
                    if ($col >= 4) {
                        break;
                    }
                    if ($product->isFeatured()) {
                        $col++;
                        $product->setShow(true);
            ?>
                        <div class="col">
                            <div class="card h-100" style="width: 15rem;">
                                <a href="?detail=<?php echo $key ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($product->getImage()); ?>" class="card-img-top" alt="..." style="height: 180px;"></a>
                                <div class="card-body">
                                    <a href="?add=<?php echo $key ?>" class="cart"><img src="./assets/img/cart.svg" width="22" alt="cart"></a>
                                    <p class="card-text" style="margin-top: -12px;"><strong><?php echo $product->getName(); ?></strong></p>
                                    <p class="card-text" style="margin-top: -18px; margin-bottom: -10px;"><strong>R$ <?php echo number_format($product->getPrice(), 2); ?></strong></p>
                                </div>
                            </div>
                        </div>
            <?php

                    }
                }
            }
            ?>
        </div>
    </div>

    <div class="container-lg products all" id="more">
        <?php
        for ($i = 0; $i < 4; $i++) {
        ?>
            <div class="row">
                <?php
                $col = 0;
                foreach ($products as $key => $product) {
                    if ($col >= 4) {
                        break;
                    }
                    if ($product->isShow() == false) {
                        $col++;
                        $product->setShow(true);
                ?>
                        <div class="col">
                            <div class="card h-100" style="width: 15rem;">
                                <a href="?detail=<?php echo $key ?>"><img src="data:image/jpeg;base64,<?php echo base64_encode($product->getImage()); ?>" class="card-img-top" alt="..." style="height: 180px;"></a>
                                <div class="card-body">
                                    <a href="?add=<?php echo $key ?>" class="cart"><img src="./assets/img/cart.svg" width="22" alt="cart"></a>
                                    <p class="card-text" style="margin-top: -12px;"><strong><?php echo $product->getName(); ?></strong></p>
                                    <p class="card-text" style="margin-top: -18px; margin-bottom: -10px;"><strong>R$ <?php echo number_format($product->getPrice(), 2); ?></strong></p>
                                </div>
                            </div>
                        </div>
                <?php

                    }
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>

    <?php
    if (isset($_GET['add'])) {
        $idProduct = (int) $_GET['add'];

        if (isset($products[$idProduct])) {
            if (isset($_SESSION['basket'][$idProduct])) {
                $_SESSION['basket'][$idProduct]['amount']++;
            } else {
                $_SESSION['basket'][$idProduct] = array(
                    'amount' => 1,
                    'name' => $products[$idProduct]->getName(),
                    'price' => $products[$idProduct]->getPrice(),
                    'img' => $products[$idProduct]->getImage()
                );
            }
        }

        unset($_GET['add']);
        ob_end_clean();
        header("Location: index.php");
    }

    if (isset($_GET['detail'])) {
        $idProduct = (int) $_GET['detail'];

        if (isset($products[$idProduct])) {
            $_SESSION['detail'] = array(
                'key' => $idProduct,
                'amount' => $products[$idProduct]->getAmount(),
                'name' => $products[$idProduct]->getName(),
                'price' => $products[$idProduct]->getPrice(),
                'img' => $products[$idProduct]->getImage()
            );
        }
        unset($_GET['detail']);
        ob_end_clean();
        header("Location: detail.php");
    }
    ?>

    <br>
    <center><button type="button" class="btn-products" id="all" onclick="productsShowHide()">View all products</button>
    </center>
    <br>

    <center>
        <div class="card mb-3 promo" style="max-width: 950px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="./assets/img/image.svg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body promo-text">
                        <p class="card-title" font-size="20">LIMITED OFFER</p>
                        <h2 class="card-text">35% OFF for orders placed <br> until Valentine's Day</h2>
                        <button class="enjoy">ENJOY <img src="./assets/img/arrowleft.svg" width="18" alt=""></button>
                    </div>
                </div>
            </div>
        </div>
    </center>

    <center>
        <h2 style="color: black; margin-top: 35px;">
            Subscribe to our newsletter to <br> receive updates on our new products
        </h2>
        <p style="color: rgba(0, 0, 0, 0.555); font-size: 16;">
            Get 20% OFF on your first purchase by subscribing to our newsletter
        </p>
    </center>
    <div class="container" style="max-width: 500px;">
        <div class="email">
            <img src="./assets/img/mail.svg" alt="mail" width="25" height="22">
            <input name="email" id="email" placeholder="Please enter your email">
        </div>
        <button type="submit" class="sign">Sign me up <img src="./assets/img/warrow.svg" width="18" alt="arrow"></button>
    </div>

    <?php include_once "./includes/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="./assets/js/home.js"></script>
</body>

</html>