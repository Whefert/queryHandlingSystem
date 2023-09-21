<?php insertTopic(); ?>

<div class="row">
<h2>Add a Topic</h2>
        <form action="" method="POST">
          <div class="d-flex mb-2">
            <div class="col-md-6 me-2">
              <label for="exampleFormControlTextarea1" class="form-label"
                >Topic</label
              >
              <input
                type="text"
                class="form-control mb-3"
                id="exampleFormControlTextarea1"
                placeholder="Admission"
                name="topic"
              />
              <label for="exampleFormControlTextarea1" class="form-label"
                >Topic Description</label
              >
              <textarea
                class="form-control"
                id="exampleFormControlTextarea1"
                placeholder="Type your question here"
                rows="3"
                name="topic_description"
              ></textarea>
            </div>
            <div class="col-md-6 ">
            <label for="selectDepartment"class="form-label">Select Department</label>
      <select class="form-control" id="selectDepartment" name="department_id">
      <?php findDepartmentForSelect()?>
      </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="add_topic">Submit</button>
        </form>
      </div>