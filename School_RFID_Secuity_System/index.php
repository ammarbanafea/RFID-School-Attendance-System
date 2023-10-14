<?php
if (!isset($_SESSION['Admin-name'])) {
    header("location: login.php");
  }
?>