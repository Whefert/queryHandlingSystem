<?php
include "includes/header.php";
include "includes/navigation.php";
?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-2 d-flex flex-column">
          <h3>Subject</h3>
          <?php
        // TODO: Extract sidebar to it's own file and change links to nav with pills
        listAllDepartments();
        ?>
        <hr>
        <?php if(isset($_SESSION['user_id'])){
          $user_id = $_SESSION['user_id'];
        echo "<button class='btn btn-primary'><a href='index.php?myQuestions={$user_id}'>View My Questions</a></button></div";
        } ?>
        </div>
        <div class="col-md-10">
          <?php if(isset($_SESSION['user_role'])){
          include "./includes/addQuestion.php";      
          }?>
<?php
         if(isset($_GET['edit_question'])){
          include "./includes/editQuestion.php";
         }


         if(isset($_GET['update_answer'])){
          include "./includes/editAnswer.php";
         }
        ?>
        <div class="row">
            <h3 class="display-3">All Questions</h3>
            <div class="question">
              
        <?php

        getAllQuestions();
        
        ?>

    
      </div>
    </div>
  </body>
</html>
