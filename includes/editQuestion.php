<hr>
  <?php updateQuestion();?>
<h2>Edit Question</h2>
<form action="" method="POST">
  <div class="mb-3">
    <label for="question" class="form-label"
      >Question</label
    >
  
      <?php 
      $question_id = $_GET['edit_question'];
      $query = "SELECT question.question_id, question.question, 
      department.department_id, department.department_name, 
      topic.topic_id, topic.topic  
      FROM question
      LEFT JOIN department
      ON question.department_id = department.department_id
      LEFT JOIN topic
      ON topic.topic_id = topic.topic_id
      WHERE question.question_id = $question_id";
      $select_question = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_question)){
            $current_question= $row["question"];
            $current_topic = $row["topic"];
            $current_department = $row["department_name"]
          ?>
            <input type="hidden" id="custId" name="question_id" value="<?php echo $question_id ?>">

                  <textarea
                    class="form-control"
                    id="question"
                    placeholder="Type your question here"
                    name="question"
                    rows="3"
                  ><?php echo "$current_question"?></textarea>
                </div>
                <div class="d-flex">
                  <div class="col-md-6 me-2">
                    <label for="selectDepartment">Select Department</label>
                    <select class="form-control" id="selectDepartment" name="department_id">
                    <?php findDepartmentForSelect()?>
                    </select>
                  </div>
                  <div class="col-md-6 ms-2">
                    <label for="selectTopic">Select Topic</label>
                    <select class="form-control" id="selectTopic" name="topic_id">
                    <?php findTopicForSelect();?>
                    </select>
                  </div>
                </div>
      <?php }?>
  <button type="submit" class="btn btn-primary my-2" name="update_question">Submit</button>
</form>
    

