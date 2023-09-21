<hr>
<h2>Update User</h2>


    <form action="" method="POST">
        <div class="d-flex">
<?php 
updateUser();
$user_id = $_GET['update_user'];
$query = "SELECT user_id, first_name, last_name,
login.cred_id,
login.email, login.user_password, 
department.department_name, 
department.department_id,
usertype.user_type, usertype.type_id
FROM users
LEFT JOIN login ON users.login_cred_id = login.cred_id
LEFT JOIN department ON users.user_id = department.department_id
LEFT JOIN usertype ON users.user_type_id = usertype.type_id  
WHERE user_id = $user_id";
$find_user = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($find_user)){
  $user_id = $row['user_id'];
  $cred_id = $row['cred_id'];
  $current_user_first_name = $row['first_name'];
  $current_user_last_name = $row['last_name'];
  $current_user_email = $row['email'];
  $current_user_password =  $row['user_password'];
  $current_user_type_id = $row['type_id'];
  $current_department_id = $row['department_id'];
    ?>
          <div class="col-md-6 me-2">
            <label for="firstName" class="form-label"
              >First Name</label
            >
            <input
              type="text"
              class="form-control mb-3"
              id="firstName"
              name="first_name"
              placeholder="Jeff"
              value="<?php echo $current_user_first_name?>"

            />
            <label for="email" class="form-label"
            >Email</label
          >
          <input
            type="email"
            class="form-control mb-3"
            id="email"
            name="email"
            placeholder="name@ucc.edu"
            value= "<?php echo $current_user_email?>"
          />
          <label for="department">Select Department </label>
          <select class="form-control" id="department" name="department_id">
          <?php findDepartmentForSelect()?>
          </select>
          </div>
          <div class="col-md-6 ms-2">
            <label for="lastName" class="form-label"
            >Last Name</label
          >
          <input
            type="text"
            class="form-control mb-3"
            id="lastName"
            placeholder="Doe"
            name="last_name"
            value="<?php echo $current_user_last_name?>"

          />
          <label for="password" class="form-label"
          >Password</label>
        <input
          type="password"
          class="form-control mb-3"
          id="password"
          name="password"
          placeholder="uccrocks"
          value="<?php echo $current_user_password?>"
        />

        <input type="hidden" id="custId" name="user_id" value="<?php echo $user_id ?>">
        <input type="hidden" id="custId" name="cred_id" value="<?php echo $cred_id ?>">

        <label for="user_type_id">User Type</label>
        <select class="form-control" id="user_type_id" name="user_type_id">
        <?php findUserTypeForSelect()?>
        </select>   
          </div>
        </div>
<?php } ?>

        <button type="submit" class="btn btn-primary" name="update_user">Submit</button>
      </form>