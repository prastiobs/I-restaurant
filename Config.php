<?php
  //config your database
  $host = "localhost";
  $user = "root";
  $password = "";
  $connect = mysqli_connect($host, $user, $password, 'restoran');

  if (mysqli_connect_errno()){
    die("Disconnect. ".mysqli_connect_error());
  } 
?>