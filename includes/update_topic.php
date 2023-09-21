      <div class="container">
      <!-- Edit topic -->
      <h2>Edit topic</h2>
      <div class="row">
        <form action="" method="POST">
          <div class="d-flex">
            <div class="col-md-6 me-2">
              
      
            <label for="exampleFormControlTextarea1" class="form-label"
                >topic Name</label
              >

      <?php 
      $query = "SELECT topic.topic_id, topic.topic_name, topic.topic_desc, topic.manager_id, users.first_name, users.last_name  
      FROM topic
      LEFT JOIN users
      ON topic.manager_id = users.user_id
      WHERE topic.topic_id = {$depart_id};
      ";
      $select_topics_id = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_topics_id)){
            $topic_name= $row["topic_name"];
            $topic_desc= $row["topic_desc"];
            $current_manager_id= $row["manager_id"];
            $manager_name= $row["first_name"]. " ". $row["last_name"];
          ?>

            <input type="text" class="form-control mb-3" id="exampleFormControlTextarea1" placeholder="Mathematics"
            name = "updated_topic_name" value= "<?php echo $topic_name?>"/>
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
                name="updated_topic_desc"
                rows="3"
              ><?php echo $topic_desc?></textarea>
          </div>

            </div>
          <div class="mb-3"></div>
          <button type="submit" class="btn btn-primary" name="update_topic">Update topic</button>
          </div>
          <?php

            //Update query
updateTopic()

          ?>


        </form>
      </div>
    </div>
        <?php } ?>
