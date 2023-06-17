<?php
ob_start();

if (!isset($_SESSION['user'])) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once "./includes/header.php" ?>
  <link rel="stylesheet" href="./assets/css/confirmation.css?v=<?php echo time(); ?>">
  <title>Confirmation</title>
</head>

<body>
  <?php include_once "./includes/navbar.php" ?>

  <div class="buy">
    <div class="container-md details">
      <div class="shipping-payment">
        <h4>Shipping Address</h4>
        <div class="dividern"></div>
        <?php if (isset($_SESSION['user'])) { ?>
          <span><strong><?php echo $_SESSION['name'] ?> - (81) 99999-9999</strong></span> <br>
        <?php
        } else {
        ?>
          <span><strong>xxxxx - (81) 99999-9999</strong></span> <br>
        <?php } ?>
        <span><strong>Street example, 999, Exemplo</strong></span> <br>
        <span><strong>Recife / PE - Brazil</strong></span> <br>
        <span><strong>CEP: 99999-999</strong></span>
        <button class="change">change</button>
      </div>
      <div class="shipping-payment">
        <h4>Payment Method</h4>
        <div class="dividern"></div>
        <a href="#">Selecione a forma de pagamento</a>
      </div>
      <div class="shipping-payment">
        <?php
        $total = 0;
        foreach ($_SESSION['basket'] as $key => $product) {
        ?>
          <div class="product">
            <div class="img">
              <img src="data:image/jpeg;base64,<?php echo base64_encode($product['img']); ?>" alt="img">
            </div>
            <h5><?php echo $product['name'] ?></h5>
            <h5>R$ <?php echo number_format($product['price'], 2) ?></h5>
            <h5>Amount: <?php echo $product['amount'] ?></h5>
          </div>
        <?php
          $total += $product['price'] * $product['amount'];
        }
        ?>
      </div>
    </div>
    <div class="container-md confirm">
      <div class="resume">
        <h3>Resume</h3>
        <div class="dividern"></div>
        <div class="product-list">
          <?php
          foreach ($_SESSION['basket'] as $key => $product) {
          ?>
            <div class="product">
              <h5><?php echo $product['name'] ?></h5>
              <h5>R$ <?php echo number_format($product['price'] * $product['amount'], 2) ?></h5>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="dividern"></div>
        <span class="total">
          <h2>TOTAL </h2>
          <h2>R$ <?php echo number_format($total, 2) ?></h2>
        </span>
      </div>
      <button class="finalizar"><h3>Complete Purchase</h3></button>
    </div>
  </div>

  <?php include_once "./includes/footer.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="./assets/js/home.js"></script>
</body>

</html>