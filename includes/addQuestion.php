<?php 
insertQuestion();
?>        
  
<h2>Add A Question</h2>
<form action="" method="POST">
  <div class="mb-3">
    <label for="question" class="form-label"
      >Question</label
    >
    <textarea
      class="form-control"
      id="question"
      placeholder="Type your question here"
      name="question"
      rows="3"
    ></textarea>
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

  <button type="submit" class="btn btn-primary my-2" name="add_question">Submit</button>
</form>
    

