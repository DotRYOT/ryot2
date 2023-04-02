<?php

if (isset($_POST['password_inp']) && $_POST['password_inp'] === "password_inp") {
  if (isset($_POST['password_check'])) {
    passwordCheck();
  }
}

if (isset($_POST['fileUpload']) && $_POST['fileUpload'] === "fileUpload") {
  if (isset($_POST['file_upload'])) {
    uploadVideo();
  }
}

function passwordCheck()
{
  $pass = require './inv/pass.php';
  if (password_verify($_POST['password'], $pass['passwordHash'])) {
    setcookie('AUTH', '$2y$10$IK7wI8dR8qwrLTYMeBkwveQiQ5H9oLhgpIoX/T644QEMcz7tFGCqS', time() + (86400 * 30), '/');
    header("Location: ./");
    exit();
  } else {
    header("Location: ./?page=signin");
    exit();
  }
}

function cookieCheck()
{
  if (!isset($_COOKIE['AUTH'])) {
    header("Location: ./?page=signin");
    exit();
  }
}

function randomPostID()
{
  $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  $pass = array();
  $alphaLength = strlen($alphabet) - 1;
  for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
  }
  return implode($pass);
}

function uploadVideo()
{
  // $file = $_FILES['file'];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  // $fileError = $_FILES['file']['error'];
  // $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));


  $allowed = array('mp4', 'MP4', 'mov', 'MOV', '7z', 'png', 'PNG');

  if (!empty($fileName)) {
    if (in_array($fileActualExt, $allowed)) {
      $rid = randomPostID();
      $fileNameNew = $rid . "." . $fileActualExt;
      $fileDest = "./f/" . $fileNameNew;
      move_uploaded_file($fileTmpName, $fileDest);
      header("Location: ./?up=$fileNameNew");
      exit();
    } else {
      header("Location: ../?error=imgerr&ext=".$fileActualExt);
      echo "err2";
      exit();
    }
  }
}
