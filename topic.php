<?php
include "includes/header.php";
include "includes/navigation.php";

deleteTopic();
?>
    <div class="container">
    <?php include "./includes/addTopic.php";
    if(isset($_GET['update_topic'])){
      include "./includes/editTopic.php";
    }
    
    ?>
    </div>

    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <h1>All Topics</h1>
        </div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Topic</th>
              <th scope="col">Description</th>
              <th scope="col">Department</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
          <?php findAllTopics() ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
