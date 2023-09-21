<h2>Add a User</h2>

<?php insertUser() ?>
    <form action="" method="POST">
        <div class="d-flex">
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

          />
          <label for="password" class="form-label"
          >Password</label>
        <input
          type="password"
          class="form-control mb-3"
          id="password"
          name="password"
          placeholder="uccrocks"
        />
        <label for="user_type_id">User Type</label>
        <select class="form-control" id="user_type_id" name="user_type_id">
        <?php findUserTypeForSelect()?>
        </select>   
          </div>
        </div>
        <div class="mb-3"></div>
        <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
      </form>