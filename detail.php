<?php
ob_start();

if (!isset($_SESSION['user'])) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./includes/header.php" ?>
    <link rel="stylesheet" href="./assets/css/detail.css?v=<?php echo time(); ?>">
    <title>Detail</title>
</head>

<body>
    <?php
    include "./includes/navbar.php";

    if (isset($_SESSION['detail'])) {
    ?>

        <div class="detail">
            <div class="image">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['detail']['img']); ?>" alt="">
            </div>
            <div class="product-details">
                <h1><?php echo $_SESSION['detail']['name'] ?></h1>
                <img src="./assets/img/Avaliação.svg" alt="avaliaçao" width="150px">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when <br>
                    an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <div class="info">
                    <h4><strong>R$ <?php echo number_format($_SESSION['detail']['price'], 2) ?></strong></h4>
                    <h5><strong>Amount in stock: <?php echo $_SESSION['detail']['amount'] ?></strong></h5>
                </div>
                <a href="?add=<?php echo $_SESSION['detail']['key'] ?>" class="add">Add to basket</a>
            </div>
        </div>

    <?php
    }

    if (isset($_GET['add'])) {
        $idProduct = (int) $_GET['add'];

        if (isset($_SESSION['basket'][$idProduct])) {
            $_SESSION['basket'][$idProduct]['amount']++;
        } else {
            $_SESSION['basket'][$idProduct] = array(
                'amount' => 1,
                'name' => $_SESSION['detail']['name'],
                'price' => $_SESSION['detail']['price'],
                'img' => $_SESSION['detail']['img']
            );
        }

        unset($_GET['add']);
        ob_end_clean();
        header("Location: detail.php");
    }
    ?>

    <?php include_once "./includes/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="./assets/js/home.js"></script>
</body>

</html>