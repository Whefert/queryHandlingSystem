<?php
include "includes/header.php";
include "includes/navigation.php";
?>

<?php
insertDepartment();

?>

    <div class="container">
      <div class="row">
      <h2>Add Department</h2>
        <form action="" method="POST">
          <div class="d-flex">
            <div class="col-md-6 me-2">
              <label for="department_name" class="form-label"
                >Department Name</label
              >
              <input
                type="text"
                class="form-control mb-3"
                id="departmentName"
                placeholder="Mathematics"
                name = "department_name"
              />
              <label for="addManager">Select Manager </label>
              <select class="form-control" id="addManager" name="manager_id">
              
        <?php //Find users who are not students
            findManagersAdminForSelect() ?>
            </select>
            </div>
            <div class="col-md-6 ms-2">
              <label for="addDescription" class="form-label"
                >Description</label
              >
              <textarea
                class="form-control"
                id="addDescription"
                placeholder="Type your question here"
                name="department_desc"
                rows="3"
              ></textarea>
            </div>
          </div>
          <div class="mb-3"></div>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
      </div>
    </div>

    <hr>
          <!-- Update and include query -->
    <?php              
    if(isset($_GET['edit'])){
      $depart_id = $_GET['edit'];
      include "./includes/update_department.php";
    }
    ?>

    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <h1>All Departments</h1>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
              <th scope="col">Department</th>
              <th scope="col">Description</th>
              <th scope="col">Manager</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
              </tr>
          </thead>
          <tbody>
        <?php
        findAllDepartments();
        ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>

<?php
deleteDepartment()
?>