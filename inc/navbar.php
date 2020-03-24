<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">Citrus store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

      <?php if (!strpos($_SERVER['REQUEST_URI'], 'admin')) { ?>
        <li class="nav-item active">
      <?php } else { ?>
        <li class="nav-item">
      <?php } ?>
          <a class="nav-link" href="index.php">Home</a>
        </li>

      <?php if (strpos($_SERVER['REQUEST_URI'], 'admin')) { ?>
        <li class="nav-item active">
      <?php } else { ?>
        <li class="nav-item">
      <?php } ?>
          <a class="nav-link" href="admin.php">Admin</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
