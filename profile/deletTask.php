<?php
include 'function.php';
deletTask($_POST['task']);
header("location:../profile/profile.php");
die;