<link rel="stylesheet" href="../projectFinal/fontawesome/css/all.min.css">

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container ">
  <a class="navbar-brand mb-2" href="index.php">
      <img src="../projectFinal/foto/paw1.png" alt="" width="30" height="30" class="d-inline-block align-text-top me-2">RokaJelly <strong>Shop</strong></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link textForm" aria-current="page" href="index.php"><i class="fa-solid fa-house me-1"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link textForm " href="keranjang.php"><i class="fa-solid fa-cart-shopping me-1"></i>Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link textForm" href="riwayat.php">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link textForm" href="checkout.php"><i class="far fa-credit-card me-1"></i>Checkout</a>
        </li>
      </ul>
               <!--jika sudah login(ada sesssion pelanggan)-->
               <?php if(isset($_SESSION["pelanggan"])):?>
            <form class="d-flex me-3">
                <a class="btn btn-outline-secondary text-light textForm" href="logout.php" role="button"><i class="fa-solid fa-right-to-bracket me-1"></i>Sign Out</a>
            </form>
          <!--jika sudah login(ada sesssion pelanggan)-->
          <?php else: ?>
            <form class="d-flex me-3">
                <a class="btn btn-outline-secondary text-light textForm" href="login.php" role="button"><i class="fa-solid fa-right-to-bracket me-1"></i>Sign In</a>
            </form>
            <form class="d-flex me-3">
              <a class="btn btn-outline-secondary text-light textForm" href="daftar.php" role="button"><i class="fa-solid fa-user-plus me-1"></i>Sign Up</a>
            </form>
            <?php endif ?>
    </div>
  </div>
</nav>
<!-- navbar -->