<?php
  $username1 = $_POST["username"];
  $password1 = hash("sha384",$_POST["password"]);

  $servername = "localhost";
  $username = "root";
  $password = "";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";
  
  $query = "USE userdb;";

  $conn->query($query);

  $query = "INSERT INTO user(username, passHash) VALUES('$username1','$password1');";

  if (!$conn->query($query)){
    echo "<h1>User already exists.</h1>";
    //header("Location:../index.php"); --> if the user already exists would like
    // to just display some red error text on the index.php page
  } else {
    echo "<h1>User added successfully!</h1>";
  }
  /* close connection */
  $conn->close();
?>
<script>
  
  setTimeout(function () {
      window.location.href = "../index.php"; 
  }, 1000); //will call the function after 2 secs.
  
</script>