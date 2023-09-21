<nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand" href="/majorproject/index.php">Query Handling System</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Questions</a>
            </li>

            <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1 ){ ?>
            <li class="nav-item">
              <a class="nav-link" href="departments.php">Departments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="topic.php">Topics</a>
            </li>

          <?php }?>
          </ul>
          <div class="d-flex ">
            <?php 
                  if(isset($_SESSION['user_first_name'])){
                    echo "<p class=' my-auto me-2'>Hi ";
                    echo $_SESSION['user_first_name'];
                    echo "</p>";
                    echo "<button class='btn btn-warning' ><a href='logout.php'>Logout</a></button>";

                  }else{
                  echo "<button class='btn btn-outline-primary' > <a href='login.php'>Login</a> </button>";
                }
                        ?>
         
          </div>
        </div>
      </div>
    </nav>