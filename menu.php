<link rel="stylesheet" href="../projectFinal/fontawesome/css/all.min.css">

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="../projectFinal/foto/paw1.png" alt="" width="40" height="40" class="me-2 ">
          RokaJelly <strong>Shop</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <form class="d-flex ms-auto" method="get" action="pencarian.php">
            <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="keyword">
            <button class="btn btn-light" type="submit">Search</button>
          </form>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="riwayat.php">History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkout.php">Checkout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-2" href="keranjang.php">Cart</a>
            </li>
           <!--jika sudah login(ada sesssion pelanggan)-->
           <?php if(isset($_SESSION["pelanggan"])):?>
            <form class="d-flex me-3">
                <a class="btn btn-outline-secondary text-light textForm" href="logout.php" role="button"><i class="fa-solid fa-right-to-bracket me-1"></i>Sign Out</a>
            </form>
          <!--jika sudah login(ada sesssion pelanggan)-->
          <?php else: ?>
            <form class="d-flex me-3">
                <a class="btn btn-outline-secondary text-light textForm mt-1" href="login.php" role="button"><i class="fa-solid fa-right-to-bracket me-1"></i>Sign In</a>
            </form>
            <form class="d-flex me-3">
              <a class="btn btn-outline-secondary text-light textForm mt-1" href="daftar.php" role="button"><i class="fa-solid fa-user-plus me-1"></i>Sign Up</a>
            </form>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
               
    </div>
  </div>
</nav>
<!-- navbar -->