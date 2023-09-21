<hr>

<form action="" method="POST">
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"
        >Add an Answer</label
        >

        <input type="hidden" id="custId" name="question_id" value="<?php echo $question_id ?>">

        <textarea
        class="form-control"
        id="exampleFormControlTextarea1"
        placeholder="Typer your answer here"
        rows="3"
        name="answer"
        ></textarea>
    <button type="submit" class="btn btn-primary my-1" name="add_answer">Submit</button>
    </div>
 </form>