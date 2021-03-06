<?php
    $title = $_GET['title'];
    include 'config.php';
    $sql = "SELECT title, post FROM forum WHERE title = '$title'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      foreach($row as $key => $value){
        echo $row["title"]."<br>";
        echo $row["post"];
        echo "<br>";
        break;
      }
    }
?>

<?php
    $sql = "SELECT comment FROM comment WHERE title = '$title'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
      foreach($row as $key => $value){
        echo $row["comment"]."<br>";
        break;
      }
    }
?>

<?php
  if(isset($_POST['submit'])){
    $comment = $_POST['comment'];
    $sql = "INSERT INTO comment(title, comment)
                        VALUES('$title', '$comment')";
    $insert = mysqli_query($conn,$sql);

    if($insert){
	  echo "<meta http-equiv='refresh' content='0'>";
    }
    else{
      echo "comment could not be made.";
    }
  }
?>
 

<form action="" method="post">
  <textarea name="comment" placeholder="Comment here" rows="5" cols="100" style="resize:none"></textarea><br>
  <input type="submit" name="submit" value="Submit"></input>
</form>

