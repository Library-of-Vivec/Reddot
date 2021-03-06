<?php
  if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $post = $_POST['post'];
    include 'config.php';
    $sql = "INSERT INTO forum(title, post)
                        VALUES('$title', '$post')";
    $insert = mysqli_query($conn,$sql);

    if($insert){
      echo "post success";
    }
    else{
      echo "Post could not be made.";
    }
  }

 ?>

<form action="" method="post">
  <input type="text" name="title" placeholder="Title here"></input><br>
  <textarea name="post" placeholder="Post here" rows="5" cols="100" style="resize:none"></textarea><br>
  <input type="submit" name="submit" value="Submit"></input>
</form>
