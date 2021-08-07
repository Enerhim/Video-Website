<?php

$allowedVideoExts = array("mp4", "mkv", "avi", "webm");
$extensionVideo = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);

$videoDirectory = $videoDirectory.$_SESSION["uid"]."/";

if ((($_FILES["video"]["type"] == "video/mp4")
|| ($_FILES["video"]["type"] == "video/mkv")
|| ($_FILES["video"]["type"] == "video/avi")
|| ($_FILES["video"]["type"] == "video/webm"))

&& ($_FILES["video"]["size"] < 1048576)
&& in_array($extension, $allowedExts)) {
    
    if ($_FILES["video"]["error"] > 0) {
      echo "Return Code: " . $_FILES["video"]["error"] . "<br />";
    }
    else
    {
    echo "Upload: " . $_FILES["video"]["name"] . "<br />";
    echo "Type: " . $_FILES["video"]["type"] . "<br />";
    echo "Size: " . ($_FILES["video"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["video"]["tmp_name"] . "<br />";

    if (file_exists($videoDirectory . $_FILES["video"]["name"]))
      {
      echo $_FILES["video"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["video"]["tmp_name"],
      $videoDirectory . $_FILES["video"]["name"]);
      echo "Stored in: " . $videoDirectory . $_FILES["video"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
