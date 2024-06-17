<?php

  $conn = mysqli_connect('localhost', 'root', '', 'help');

  if (!$conn) {
    die('Error connect to DataBase');
  }