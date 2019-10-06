<!DOCTYPE html>
  <head>
  </head>
  <body>
<?php
  $username1 = $_POST['username'];
  $password1 = $_POST['password'];
  $passHash = hash("sha384",$password1);

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

  $query = "SELECT * FROM user WHERE username='$username1' AND passHash='$passHash';";

  if ($result = $conn->query($query)){
    if ($row = $result->fetch_row())
    {
      //echo $row[0]+" "+$row[1]+" "+$row[2];
      echo "<h1>Login Successful!</h1><br/>";
      session_start();
      $conn->query("INSERT INTO online VALUES($row[0]);");
      
      $_SESSION["userNo"] = $row[0];
      /*
      $_SESSION["username"] = $row[1];
      $_SESSION["pass"] = $row[2];
      $_SESSION["gamesPlayed"] = $row[3];
      $_SESSION["totalScore"] = $row[4];*/
      echo "
      <script>
  
      setTimeout(function () {
          window.location.href = \"../game/game.php\"; 
      }, 1000); //will call the function after 2 secs.
      
      </script>
      ";
      //echo "<h1>Username: ",$row[1],"</h1><br/>";
      //echo "<h1>Volunteer Hours: ",$row[3],"</h1><br/>";
    }else {
      echo "<h1>Login Unsuccessful.</h1><br>";
      echo "
        <script>
    
        setTimeout(function () {
            window.location.href = \"../index.php\"; 
        }, 1000); //will call the function after 2 secs.
        
        </script>
      ";
    }
    $result->close();
  } else {
    echo "<h1>Query Unsuccessful.</h1><br>";
  }
  /* close connection */
  $conn->close();
?>
  </body>
</html>