<?php 
  $mysqli = new mysqli("localhost", "root", "", "userdb");

  /* check connection */
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  session_start();
  if (isset($_SESSION["userNo"])){
    $userNo = $_SESSION["userNo"];
    $mysqli->query("DELETE FROM online WHERE userNum='$userNo';");
  }
  session_destroy();
?>
<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="css/mystyle.css">
  <script src="js/script.js"></script>
</head>
<body>
  <h1>GAME NAME HERE</h1>
  <div class="forms">
    <form action="php/login.php" method="post">
      <h2>Login</h2>
      <div class="form">
        <span>Username:&nbsp;&nbsp;&nbsp;</span><input type="text" name="username">
        <span>Password:&nbsp;&nbsp;&nbsp;</span><input type="password" name="password">
      </div>
      <input type="button" onclick="submit();" value="Login">
    </form>
    <form action="php/addUser.php" method="post">
      <h2>Create new user</h2>
      <div class="form">
        <span>Username:&nbsp;&nbsp;&nbsp;</span><input type="text" name="username" id="userText">
        <span>Password:&nbsp;&nbsp;&nbsp;</span><input type="password" name="password">
      </div>
      <input type="button" onclick="validate();" value="Add User">
    </form>
  </div>
</body>
</html>