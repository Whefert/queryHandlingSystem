<?php
include "includes/header.php";
include "includes/navigation.php";
deleteUser();
?>
    <div class="container">
      
        <div class="row">
        <?php 

        include "./includes/addUser.php";
        if(isset($_GET['update_user'])){
             include "./includes/editUser.php";
        }
        ?>

      </div>
      </div>
    <div class="container">
        <div class="row mt-5">
          <div class="col">
            <h1>All Users</h1>
          </div>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">User Type</th>
                <th scope="col">Department</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
           <?php findAllUsers() ?>
            </tbody>
          </table>
        </div>
  </body>
</html>
