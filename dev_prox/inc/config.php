<?php

  $db = mysqli_connect("localhost","root","","devpost");

  if ($db->connect_errno){
    echo "Oops, seems like there was a proble connecting to server.".$db ->connect_error;
    exit();
  }
