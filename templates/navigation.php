<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <!-- Brand -->
    <a class="navbar-brand" href="/moviebox/index.php">MovieBox</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Categories
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="movies_cat.php?q=1">Action</a>
            <a class="dropdown-item" href="movies_cat.php?q=2">Comedy</a>
            <a class="dropdown-item" href="movies_cat.php?q=3">Romance</a>
            <a class="dropdown-item" href="movies_cat.php?q=4">Horror</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="store_map.php?q=">Stores Location</a>
        </li>
      </ul>
    </div>

      <?php
        //if(isset($_SESSION['login_user'])){
        if (isset($_SESSION['login_user'])) {
          if (isset($_COOKIE["user"])) {
            echo '<p style="color: grey"> Hello ' . $_COOKIE["user"] . '</p></br>';
          }
          //echo '<button type="button" class="btn btn-link" >Logout</button>';
          echo '<button type="button" class="btn btn-link" ><a href="db/logout.php">Logout<?php session_destroy(); ?></a></button>';
          //echo '<a href="index.php" class="btnbtn-link active" role="button" aria-pressed="true">Logout</a>';
          //session_destroy();
        }
        else {
          echo '<button type="button" class="btn btn-link" id="login-btn">Login</button>';
        }
      ?>
      <!---<button type="button" class="btn btn-link" id="login-btn">Login</button>-->
      <button type="button" id="register_btn" class="btn btn-outline-light">Register</button>
      <!-- Search Form -->
      <form class="form-inline" action="/moviebox/db/search_start.php" method="post">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>

    </div>
  </nav>
<!-- for modals -->
  <div>
    <?php
      include 'login_modal.php'
    ?>
  </div>

  <div>
    <?php
      include 'signup_modal.php'
    ?>
  </div>
