<?php updateTopic(); ?>

<hr>
<div class="row">
        <h2>Edit Topic</h2>
        <form action="" method="POST">

<?php
        $topic_id = $_GET['update_topic'];
        $query = "SELECT topic_id, topic, topic_description, 
        department_id
        FROM topic
        WHERE topic_id = $topic_id";
        $find_topic = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($find_topic)){
          $topic_id = $row['topic_id'];
          $topic = $row['topic'];
          $topic_description = $row['topic_description'];
          $department_id = $row['department_id'];
?>
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
                value="<?php echo $topic ?>"
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
              ><?php echo $topic_description ?></textarea>

              <input type="hidden" id="custId" name="topic_id" value="<?php echo $topic_id ?>">

            </div>
            <div class="col-md-6 ">
            <label for="selectDepartment"class="form-label">Select Department</label>
            <select class="form-control" id="selectDepartment" name="department_id">
            <?php findDepartmentForSelect()?>
      </select>
          </div>
          
            </div>
          <?php }?>
          <button type="submit" class="btn btn-primary" name="update_topic">Submit</button>
        </form>
      </div>