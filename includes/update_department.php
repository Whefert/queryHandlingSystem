      <div class="container">
      <!-- Edit Department -->
      <h2>Edit Department</h2>
      <div class="row">
        <form action="" method="POST">
          <div class="d-flex">
            <div class="col-md-6 me-2">
              
      
            <label for="exampleFormControlTextarea1" class="form-label"
                >Department Name</label
              >

      <?php 
      $query = "SELECT department.department_id, department.department_name, department.department_desc, department.manager_id, users.first_name, users.last_name  
      FROM department
      LEFT JOIN users
      ON department.manager_id = users.user_id
      WHERE department.department_id = {$depart_id};
      ";
      $select_departments_id = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_departments_id)){
            $department_name= $row["department_name"];
            $department_desc= $row["department_desc"];
            $current_manager_id= $row["manager_id"];
            $manager_name= $row["first_name"]. " ". $row["last_name"];
          ?>

            <input type="text" class="form-control mb-3" id="exampleFormControlTextarea1" placeholder="Mathematics"
            name = "updated_department_name" value= "<?php echo $department_name?>"/>
            <label for="exampleFormControlSelect1">Select Manager </label>
              <select class="form-control" id="exampleFormControlSelect1" name="updated_manager_id">

        <?php             findManagersAdminForSelect() ?>       
            </select>
            </div>
          <div class="col-md-6 ms-2">
              <label for="exampleFormControlTextarea1" class="form-label"
                >Description</label
              >
              <textarea
                class="form-control"
                id="exampleFormControlTextarea1"
                name="updated_department_desc"
                rows="3"
              ><?php echo $department_desc?></textarea>
          </div>

            </div>
          <div class="mb-3"></div>
          <button type="submit" class="btn btn-primary" name="update_department">Update Department</button>
          </div>
          <?php

            //Update query
updateDepartment()

          ?>


        </form>
      </div>
    </div>
        <?php } ?>
