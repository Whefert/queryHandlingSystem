<hr>

<form action="" method="POST">
    <?php updateAnswer();?>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"
        >Edit Answer</label
        >
        <?php 
      $answer_id = $_GET['update_answer'];
      $query = "SELECT answer_id, answer
      FROM answer
      WHERE answer_id = $answer_id";
      $select_answer = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_answer)){
            $current_answer= $row["answer"];
          ?>
        <input type="hidden" id="custId" name="answer_id" value="<?php echo $answer_id ?>">

        <textarea
        class="form-control"
        id="exampleFormControlTextarea1"
        placeholder="Typer your answer here"
        rows="3"
        name="answer"
        ><?php echo $current_answer?></textarea>
       <?php } ?>
    <button type="submit" class="btn btn-primary my-1" name="update_answer">Submit</button>
    </div>
 </form>