<?php
include "includes/header.php";
include "includes/navigation.php";
?>
    <div class="container-fluid ">
      <div class="row my-auto">
        <div class="col-8">
          <img src="assets/students.jpg.jpg" class="img-fluid" alt="..." />
        </div>
        <div class="col align-items-center p-3 my-auto">
          <!-- <h1 class="pb-2">Query Handling System</h1> -->

          <!-- Create a user -->
          <h3>Login</h3>
          <form method="POST" class="mb-2">
            <div class="mb-1">
              <label for="email" class="form-label"
                >Email address</label
              >
              <input
                type="email"
                class="form-control"
                id="email"
                aria-describedby="emailHelp"
                name="email"
              />
              <div id="emailHelp" class="form-text">
                We'll never share your email with anyone else.
              </div>
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label"
                >Password</label
              >
              <input
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                name="password"
              />
            </div>
            <button type="submit" class="btn btn-primary" name='login'>Login</button>
          </form>
          <?php
          confirmUserCredentials();
          ?>
        
        </div>
      </div>
    </div>
  </body>
</html>
