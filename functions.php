<?php

function insertDepartment(){

global $connection;

if(isset($_POST['submit'])){
    $manager_id = $_POST['manager_id'];
    $department_name = $_POST['department_name'];
    $department_desc = $_POST['department_desc'];
    $query = "INSERT INTO department (department_name, department_desc, manager_id)
              VALUES('$department_name', '$department_desc', $manager_id)
    ";
    $insert_department = mysqli_query($connection, $query);
  }
}
function insertTopic(){

  global $connection;
  
  if(isset($_POST['add_topic'])){
      $topic = $_POST['topic'];
      $topic_description = $_POST['topic_description'];
      $department_id = $_POST['department_id'];
      $query = "INSERT INTO topic (topic, topic_description, department_id)
                VALUES('$topic', '$topic_description', '$department_id')";
      $insert_topic = mysqli_query($connection, $query);
    }
  }


function insertQuestion(){

  global $connection;
  
  if(isset($_POST['add_question'])){
      $question = $_POST['question'];
      $created_by = $_SESSION['user_id'];
      $create_date =  date('Y-m-d');
      $topic_id = $_POST['topic_id'];
      $department_id = $_POST['department_id'];
      $query = "INSERT INTO question 
                (question, create_date,topic_id, department_id, created_by)
                VALUES('$question', '$create_date', $topic_id, $department_id, $created_by)";
      $insert_question = mysqli_query($connection, $query);
      if(!$insert_question){
        echo("Error description: " . mysqli_error($connection));
      }
      header("Location: index.php");
    }
  }

  function insertUser(){

    global $connection;
    
    if(isset($_POST['add_user'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $department_id = $_POST['department_id'];
        $user_type_id = $_POST['user_type_id'];

        insertLoginCredentials($email,$password);

        $query = "INSERT INTO users 
                  (first_name, last_name, login_cred_id, user_type_id, department_id)
                  VALUES('$first_name', '$last_name', LAST_INSERT_ID(), $user_type_id, $department_id)";
        $insert_user = mysqli_query($connection, $query);
        if(!$insert_user){
          echo("Error description: " . mysqli_error($connection));
        }
        header("Location: user.php");
      }
    }

  function insertLoginCredentials($email, $password){
    global $connection;
    $query = "INSERT INTO login 
    (email, user_password)
    VALUES('$email', '$password')";
    $insert_login_credentials = mysqli_query($connection, $query);
  }

  function insertAnswer(){
    global $connection;
    if(isset($_POST['add_answer'])){
        $answer = $_POST['answer'];
        $question_id = $_POST['question_id'];
        $create_date =  date('Y-m-d');
        $query = "INSERT INTO answer (answer, create_date, question_id)
                  VALUES('$answer', '$create_date', $question_id)";
        $insert_answer = mysqli_query($connection, $query);
        header("Location: index.php");
      }
    }

function deleteDepartment(){
if(isset($_GET['delete'])){
    global $connection;
    $depart_id = $_GET['delete'];
    $query = "DELETE FROM department WHERE department_id = {$depart_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: departments.php");
  }
}

function deleteTopic(){
  if(isset($_GET['delete_topic'])){
      global $connection;
      $topic_id = $_GET['delete_topic'];
      $query = "DELETE FROM topic WHERE topic_id = {$topic_id}";
      $delete_topic_query = mysqli_query($connection, $query);
      header("Location: topic.php");
    }
  }

function deleteQuestion(){
  if(isset($_GET['delete_question'])){
      global $connection;
      $question_id = $_GET['delete_question'];
      $query = "DELETE FROM question WHERE question_id = {$question_id}";
      $delete_question_query = mysqli_query($connection, $query);
      header("Location: index.php");
    }
  }

  function deleteAnswer(){
    if(isset($_GET['delete_answer'])){
        global $connection;
        $answer_id = $_GET['delete_answer'];
        $query = "DELETE FROM answer WHERE answer_id = {$answer_id}";
        $delete_answer_query = mysqli_query($connection, $query);
        header("Location: index.php");
      }
    }

    function deleteUser(){
      if(isset($_GET['delete_user'])){
          global $connection;
          $user_id = $_GET['delete_user'];
          $query = "DELETE FROM users WHERE user_id = $user_id";
          $delete_user_query = mysqli_query($connection, $query);
          header("Location: user.php");
        }
      }


    function updateUser(){
      global $connection;

      if(isset($_POST['update_user'])){
        $user_id = $_POST['user_id'];
        $login_cred_id = $_POST['cred_id'];
        $updated_user_first_name = $_POST['first_name'];
        $updated_user_last_name = $_POST['last_name'];
        $updated_user_email = $_POST['email'];
        $updated_user_password =  $_POST['password'];
        $updated_user_type_id = $_POST['user_type_id'];
        $updated_department_id = $_POST['department_id'];

        //Update username and password
        $query =  "UPDATE login SET 
        email  = '$updated_user_email',
        user_password = '$updated_user_password'
        WHERE cred_id = '$login_cred_id'";
        $update_login_cred_query = mysqli_query($connection, $query);


        $query = "UPDATE users SET 
        first_name  = '$updated_user_first_name',
        last_name = '$updated_user_last_name',
        department_id = '$updated_department_id', 
        user_type_id = '$updated_user_type_id',
        login_cred_id = 4
        WHERE user_id = $user_id";
        $update_user_query = mysqli_query($connection, $query);

        header("Location: user.php");
      }
    }

    function updateTopic(){
      global $connection;

      if(isset($_POST['update_topic'])){
        $topic_id = $_POST['topic_id'];
        $topic = $_POST['topic'];
        $topic_description = $_POST['topic_description'];
        $department_id = $_POST['department_id'];

        $query =  "UPDATE topic SET 
        topic = '$topic',
        topic_description = '$topic_description',
        topic_description = '$topic_description',
        department_id = '$department_id'
        WHERE topic_id = $topic_id";
        $update_topic_query = mysqli_query($connection, $query);

        header("Location: topic.php");
      }
    }


    function updateQuestion(){
      global $connection;

      if(isset($_POST['update_question'])){
        $question_id = $_POST['question_id'];
        $updated_question = $_POST['question'];
        $updated_department = $_POST['department_id'];
        $updated_topic = $_POST['topic_id'];

        $query = "UPDATE question SET 
        question = '$updated_question',
        department_id = $updated_department, 
        topic_id = $updated_topic  
        WHERE question_id = $question_id";
        $update_question_query = mysqli_query($connection, $query);
        header("Location: index.php");
      }
    }


    function updateAnswer(){
      global $connection;

      if(isset($_POST['update_answer'])){
        $answer_id = $_POST['answer_id'];
        $updated_answer = $_POST['answer'];
        $update_date = date("Y-m-d");

        $query = "UPDATE answer SET 
        answer = '$updated_answer',
        update_date = $update_date
        WHERE answer_id = $answer_id";
        $update_answer_query = mysqli_query($connection, $query);
        header("Location: index.php");
      }
    }

    function updateDepartment(){
      global $connection;
      global $depart_id;
      if(isset($_POST['update_department'])){
        $updated_department_name = $_POST['updated_department_name'];
        $updated_department_desc = $_POST['updated_department_desc'];
        $updated_mananger_id = $_POST['updated_manager_id'];

        $query = "UPDATE department SET department_name = '$updated_department_name',
        department_desc = '$updated_department_desc', 
        manager_id = $updated_mananger_id  WHERE department_id = $depart_id";
        $update_department_query = mysqli_query($connection, $query);
        header("Location: departments.php");
      }
    }

    

function findAllDepartments(){
    global $connection;
    //Code to get department
    $query = "SELECT department.department_id, department.department_name,department.department_desc, users.first_name, users.last_name 
    FROM department 
    LEFT JOIN users 
    ON department.manager_id = users.user_id";
    $select_all_departments = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_all_departments)){
    $department_id = $row['department_id'];
    $department_name = $row['department_name'];
    $department_description = $row['department_desc'];
    $department_manager = $row['first_name'] . " ". $row['last_name'];        
    echo "<tr>";
    echo "<th scope='row'>{$department_id}</th>";
    echo "<td>{$department_name}</td>";
    echo "<td>{$department_description}</td>";
    echo "<td>{$department_manager}</td>";
    echo "<td><button class='btn btn-warning'>
        <a href='departments.php?edit={$department_id}'>
        Edit 
        </a></button></td>";
    echo "<td><button class='btn btn-danger'>
        <a href='departments.php?delete={$department_id}'>
        Delete
        </a></button></td>";
    echo" </tr>";
   }
}


function findAllUsers(){
  global $connection;
  //Code to get department
  $query = "SELECT 
        users.user_id, users.first_name, users.last_name,
        department.department_name,
        usertype.user_type
        FROM users
        LEFT JOIN usertype  ON users.user_type_id = usertype.type_id
        LEFT JOIN department  ON users.department_id = department.department_id;
        ";
  $select_all_users = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_all_users)){
  $user_id = $row['user_id'];
  $userName = $row['first_name'] ." ". $row['last_name'] ;
  $user_type = ucfirst($row['user_type']) ;
  $user_department = $row['department_name'];    
  echo "<tr>";
  echo "<th scope='row'>{$user_id}</th>";
  echo "<td>{$userName}</td>";
  echo "<td>{$user_type}</td>";
  echo "<td>{$user_department}</td>";
  echo "<td><button class='btn btn-warning'>
      <a href='user.php?update_user={$user_id}'>
      Edit 
      </a></button></td>";
  echo "<td><button class='btn btn-danger'>
      <a href='user.php?delete_user={$user_id}'>
      Delete
      </a></button></td>";
  echo" </tr>";
 }
}

function findAllTopics(){
  global $connection;
  //Code to get department
  $query = "SELECT topic.topic_id, topic.topic, topic.topic_description, department.department_name FROM topic
            LEFT JOIN department ON
            topic.department_id = department.department_id";
  $select_all_topics = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_all_topics)){
  $topic_id = $row['topic_id'];
  $topic = $row['topic'];
  $topic_description = $row['topic_description'];    
  $department_name = $row['department_name'];
  echo "<tr>";
  echo "<th scope='row'>{$topic_id}</th>";
  echo "<td>{$topic}</td>";
  echo "<td>{$topic_description}</td>";
  echo "<td>{$department_name}</td>";
  echo "<td><button class='btn btn-warning'>
      <a href='topic.php?update_topic={$topic_id}'>
      Edit 
      </a></button></td>";
  echo "<td><button class='btn btn-danger'>
      <a href='topic.php?delete_topic={$topic_id}'>
      Delete
      </a></button></td>";
  echo" </tr>";
 }
}


function confirmUserCredentials(){
  global $connection;
  //Find users who are not students
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT 
    login.cred_id, users.user_id, users.first_name, users.department_id,users.user_type_id 
    FROM login
    LEFT JOIN users
    ON  login.cred_id = users.login_cred_id    
    WHERE email = '$email' AND user_password = '$password'";
  $find_user_credentials = mysqli_query($connection, $query);
  if(mysqli_num_rows($find_user_credentials) == 0){
    echo "Invalid login, please try again.";
  }else{
  while($row = mysqli_fetch_assoc($find_user_credentials)){
    $_SESSION['user_first_name'] =$row['first_name'];
    $_SESSION['user_role'] =$row['user_type_id'];
    $_SESSION['user_id'] =$row['user_id'];
    $_SESSION['department_id'] =$row['department_id'];
    header("Location: index.php");
      }
    }
  }
}


function findUserTypeForSelect(){
  //Find users who are not students
    global $connection;
    $query = "SELECT * FROM userType";
    $select_all_userTypes = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_all_userTypes)){
      $userType_id = $row['type_id'];
      $user_type = $row['user_type'];        
      echo "<option value = '$userType_id'>";  
      echo ucfirst($user_type);
      echo "</option>";
    }
  }

function findManagersAdminForSelect(){
//Find users who are not students
  global $connection;
  global $current_manager_id;
  $query = "SELECT * FROM users WHERE user_type_id = 1 OR 2 ";
  $select_all_managers = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_all_managers)){
    $manager_id = $row['user_id'];
    $manager_name = $row['first_name'] . " ". $manager_name = $row['last_name'];        
    echo "<option value = $manager_id 
          if($manager_id == $current_manager_id)
           {echo 'selected'}>{$manager_name}</option>";
  }
}


function findDepartmentForSelect(){
  //Find all departments
    global $connection;
    global $current_department_id;
    $query = "SELECT * FROM department";
    $select_all_departments = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_all_departments)){
      $department_id = $row['department_id'];
      $department_name = $row['department_name'];
      echo "<option value = $department_id 
            if($department_id == $current_department_id)
             {echo 'selected'}>{$department_name}</option>";
    }
  }

  function findTopicForSelect(){
    //Find all departments
      global $connection;
      global $current_topic_id;
      $query = "SELECT 
      topic.topic_id, topic.topic_description, topic.topic,department.department_name FROM topic
      LEFT JOIN department ON
      topic.department_id = department.department_id";

      $select_all_topics = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_all_topics)){
        $topic_id = $row['topic_id'];
        $topic = $row['topic'];
        $department_name = $row['department_name'];
        echo "<option value = '$topic_id'
              if($topic_id == $current_topic_id)
               {echo 'selected'}>$topic - $department_name</option>";
      }
    }

function listAllDepartments(){
        global $connection;
        $query = "SELECT * FROM department";
        $select_all_departments = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_all_departments)){
          $department_name = $row['department_name'];
          echo "<a href='index.php?department=$department_name'>{$department_name}</a>";
        }
}

function getAllQuestions(){
        global $connection;
        //Code to get questions

        $query = "SELECT 
        question.question_id, question.question, question.create_date, 
        users.user_id, users.first_name ,users.last_name,
        department.department_id, department.department_name
        FROM Question 
        LEFT JOIN users ON question.created_by = users.user_id
        LEFT JOIN department ON question.department_id = department.department_id;";

        deleteQuestion();
        if(isset($_GET['department'])){
          $selected_department = $_GET['department'];
          echo "<p class='display-6'>$selected_department Department</p>";
          $query = "SELECT 
        question.question_id, question.question, question.create_date, 
        users.user_id, users.first_name ,users.last_name,
        department.department_id, department.department_name
        FROM Question 
        LEFT JOIN users ON question.created_by = users.user_id
        LEFT JOIN department ON question.department_id = department.department_id
        WHERE department.department_name = '$selected_department';";
         }

         if(isset($_GET['myQuestions'])){
          $user_id = $_GET['myQuestions'];
          echo "<p class='display-6'>My Questions</p>";
          $query = "SELECT 
        question.question_id, question.question, question.create_date, 
        users.user_id, users.first_name ,users.last_name,
        department.department_id, department.department_name
        FROM Question 
        LEFT JOIN users ON question.created_by = users.user_id
        LEFT JOIN department ON question.department_id = department.department_id
        WHERE question.created_by = '$user_id';"; 
         }
       
        $select_all_questions = mysqli_query($connection, $query);
        $question_count = 0;
        insertAnswer();
        while($row = mysqli_fetch_assoc($select_all_questions)){
          $question_count++;
          $question_id = $row['question_id'];
          $question = $row['question'];
          $create_date = $row['create_date'];
          $first_name= $row['first_name'];
          $last_name = $row['last_name'];
          $department_id = $row['department_id'];
          $department_name = $row['department_name'];
          echo "<p><strong>{$question_count}. {$question}</strong></p>";
          echo "<div class='d-flex'><p>Question Author: {$first_name} {$last_name} </p> <p class='ps-3'>Question Date: {$create_date}</p></div>";
          echo "<div class='d-flex'><p>Deparment: {$department_name}</p> <p class='ps-3'>Question Date: {$create_date}</p></div>";
          echo "<div class='mb-3'>";

          if(isset($_SESSION['user_role']) AND ($_SESSION['user_role'] == 1 Or ($_SESSION['user_role']==2 AND $_SESSION['department_id'] == $department_id))){ 
          echo "<button class='btn btn-warning me-1'><a href='index.php?edit_question=$question_id'>Edit Question</a></button>";
          echo "<button class='btn btn-danger me-1'><a href='index.php?delete_question=$question_id'>Delete Question</a></button>";
          }
          echo "</div>";
          getQuestionAnswers($question_id);
          if(isset($_SESSION['user_role']) AND ($_SESSION['user_role'] == 1 Or ($_SESSION['user_role']==2 AND $_SESSION['department_id'] == $department_id))){ 
          include "./includes/addAnswer.php";
          }
          deleteAnswer();
      }
}

function getQuestionAnswers($question_id){
    global $connection;
    global $department_id;
    $query = "SELECT answer.answer_id, answer.answer, answer.create_date, users.first_name ,users.last_name
    FROM answer 
    LEFT JOIN users ON answer.created_by = users.user_id
    WHERE question_id = {$question_id}";
    $select_all_answers = mysqli_query($connection, $query);
    $answer_count = 0;

    while($row = mysqli_fetch_assoc($select_all_answers)){
      $answer_count++;
      $answer_id = $row['answer_id'];
      $answer = $row['answer'];
      $create_date = $row['create_date'];
      $first_name= $row['first_name'];
      $last_name = $row['last_name'];

      echo "<div class='answers col-md-11 offset-md-1'>";
      echo "<div class='answer'>";
      echo "<p>{$answer_count}. {$answer}</p>";
      echo "<div class='d-flex'>";
      echo "<p>Answer Author: {$first_name} {$last_name}</p>";
      echo "<p class='ps-3'>Answer Date: <?php echo $create_date?></p>";
      echo "</div>";
      echo "<div class='mb-3'>";
      if(isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 1 || ($_SESSION['user_role'] == 2 && $_SESSION['department_id'] == $department_id)) ){
      echo "<button class='btn btn-warning'><a href='index.php?update_answer=$answer_id'>Edit Answer</a></button>";
      echo "<button class='btn btn-danger'><a href='index.php?delete_answer=$answer_id'>Delete Answer</a></button>";
      }
      echo "</div>";
      echo "</div>";
      echo "</div>";
    }
}

?>