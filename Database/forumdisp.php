<?php
  include 'config.php';
  $sql = "SELECT title FROM forum";
  $result = mysqli_query($conn, $sql);
#echo "<form action=\"forumpost.php\" method=\"post\">";
#echo "<input type=\"submit\" name=\"submit\" value=\"".$value"\">".$value."</a><br></form>";
  while($row = mysqli_fetch_assoc($result)){
    foreach($row as $key => $value){
      echo "<a href='forumpost.php?title=$value'>".$value."</a><br>";
    }
  }

 ?>
