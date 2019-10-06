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
  $mysqli->query("INSERT INTO online(userNum) VALUES($userNo)");
} else {
  header("Location: ../");
}

$query  = "SELECT * FROM online;";

/* execute multi query */
if ($result = $mysqli->query($query)) {
  while ($row = $result->fetch_row()) {
    $r = $row[1];
      if ($result1 = $mysqli->query("SELECT username FROM user WHERE userNum='$r';")){
        $row1 = $result1->fetch_row();
        echo "<h3>User: ", $row1[0], " is online.</h3>";
      }
      $result1->free();
  }
  $result->free();
} else {
  header("Location: ../");
}

echo "<a href=\"../\">Logout</a>";

/* close connection */
$mysqli->close();
?>