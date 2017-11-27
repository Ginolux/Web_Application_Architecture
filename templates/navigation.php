<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <!-- Brand -->
    <a class="navbar-brand" href="#">MovieBox</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Dropdown link
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Link 1</a>
            <a class="dropdown-item" href="#">Link 2</a>
            <a class="dropdown-item" href="#">Link 3</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
    </div>

      <button type="button" class="btn btn-link" id="login-btn">Login</button>
      <button type="button" id="register_btn" class="btn btn-outline-light">Register</button>
      <!-- Search Form -->
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="text" placeholder="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>

    </div>
  </nav>
<!-- for modals -->
  <div>
    <?php
      include 'templates/login_modal.php'
    ?>
  </div>

  <div>
    <?php
      include 'templates/signup_modal.php'
    ?>
  </div>
