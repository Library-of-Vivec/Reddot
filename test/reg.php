<?php
  if(isset($_POST['submit'])){
    $username = $_POST['uname'];
    $password = sha1($_POST['pass']);
    $color = $_POST['color'];
    $image = $_POST['artwork'];

    $sql = "INSERT INTO tbltest(username, password, color, image)
                        VALUES('$username', '$password', '$color', '$image')";
    include 'config.php';
    $insres = mysqli_query($conn, $sql);
    if($insres){
      echo "Registered!";
    }
    else{
      echo "Something went wrong. Please try again.";
    }
    $sql2 = "SELECT image FROM tbltest WHERE username = 'armaros'";
    $imageresult1 = mysqli_query($conn, $sql2);

    while($rows=mysqli_fetch_assoc($imageresult1))
    {
        $image = $rows['image'];
        echo "<img src=\"data:image/jpeg;base64,<?php echo base64_encode( $image ); ?>\" />";
        echo "<br>";
  }
  }

 ?>
<form action="" method="post" enctype="multipart/form-data">
  <input type="text" name="uname" placeholder="Username">
  <input type="password" name="pass" placeholder="Password">
  <input type="text" name="color" placeholder="Favorite Color">
  <input type="file" name="artwork">
  <input type="submit" name="submit" value="Register">
</form>
