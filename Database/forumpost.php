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
