<?php
require './functions.php';

if (!isset($_GET['page'])) {
  cookieCheck();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Viewer</title>
  <link rel="stylesheet" href="./css/index.min.css">
  <script src="../assets/script/jquery-3.5.1.min.js"></script>
  <script src="../assets/script/jquery-form-plugin.js"></script>
  <link rel="shortcut icon" href="../assets/images/icon_w.png" type="image/x-icon">
  <script>
    function upload_image() {
      var bar = $('#bar');
      var percent = $('#percent');
      $('#myForm').ajaxForm({
        beforeSubmit: function() {
          document.getElementById("progress_div").style.display = "block";
          var percentVal = '0%';
          bar.width(percentVal)
          percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
          var percentVal = percentComplete + '%';
          bar.width(percentVal)
          percent.html(percentVal);
        },
        success: function() {
          var percentVal = '100%';
          bar.width(percentVal)
          percent.html(percentVal);
        },
        complete: function(xhr) {
          if (xhr.responseText) {
            document.getElementById("output_image").innerHTML = xhr.responseText;
          }
        }
      });
    }
  </script>
</head>

<body>
  <section class="main">
    <?php
    if (isset($_GET['page'])) {
      if ($_GET['page'] === "signin") {
        require './signin.inc.php';
      }
    } else {
      $_GET['page'] = null;
    }
    if (isset($_GET['up'])) {
      $up = $_GET['up'];
      echo "
    <div class='copy'>
      <input type='text' id='myInput' value='https://ryot.cc/c/f/$up'>
      <button type='button' name='copyText' onclick='copyText()'>Copy Link</button>
    </div>";
    }
    if (!isset($_GET['page'])) {
      if ($_GET['page'] === null) {
        echo '
    <form action="./functions.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="fileUpload" value="fileUpload">
      <input type="file" name="file">
      <button type="submit" name="file_upload">Upload</button>
    </form>';
      }
    }
    ?>
    <div class="loader">
      <div class="progress" id="progress_div">
        <div class="bar" id="bar1"></div>
        <div class="percent" id="percent1">0%</div>
      </div>
    </div>
    <div id="output_image"></div>
    <script>
      function copyText() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        document.execCommand("copy");
      }
    </script>
  </section>
</body>

</html>