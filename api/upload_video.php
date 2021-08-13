<?php
session_start();

$allowedVideoExts = array("mp4", "mkv", "avi", "webm");
$extensionVideo = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);

$allowedThumbExts = array("png", "jpg", "gif", "jpeg", "webp");
$extensionThumb = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);

$videoDirectory = "../videos/" . $_SESSION["uid"] . "/";
$thumbDirectory = "../thumbnail/" . $_SESSION["uid"] . "/";

$videoLink;
$thumbLink;

mkdir($videoDirectory, 0777, true);
mkdir($thumbDirectory, 0777, true);

if ((($_FILES["video"]["type"] == "video/mp4")
    || ($_FILES["video"]["type"] == "video/mkv")
    || ($_FILES["video"]["type"] == "video/avi")
    || ($_FILES["video"]["type"] == "video/webm"))

  // && ($_FILES["video"]["size"] < 1048576)
  && in_array($extensionVideo, $allowedVideoExts)
) {

  if ($_FILES["video"]["error"] > 0) {
    echo "Return Code: " . $_FILES["video"]["error"] . "<br />";
  } else {
    // echo "Upload: " . $_FILES["video"]["name"] . "<br />";
    // echo "Type: " . $_FILES["video"]["type"] . "<br />";
    // echo "Size: " . ($_FILES["video"]["size"] / 1024) . " Kb<br />";
    // echo "Temp file: " . $_FILES["video"]["tmp_name"] . "<br />";
    // echo "Upload Dir: " . $videoDirectory . "<br />";

    if (file_exists($videoDirectory . $_FILES["video"]["name"])) {
      // echo $_FILES["video"]["name"] . " already exists. ";
    } else {

      $videoLink = $videoDirectory . strval(time()) . "-" . $_SESSION["uid"] . "-" . $_POST["titleInput"] . "." . $extensionVideo;
      $videoLink = str_replace(' ', '_', $videoLink);
      move_uploaded_file(
        $_FILES["video"]["tmp_name"],
        $videoLink
      );
      // echo "Stored in: " . $videoDirectory . $_FILES["video"]["name"];
    }
  }
} else {
  echo "Invalid video <br/><br/><br/>";
}

echo "<br/><br/><br/>";


if (isset($_FILES["thumbnail"])) {
  if ((($_FILES["thumbnail"]["type"] == "image/png")
    || ($_FILES["thumbnail"]["type"] == "image/jpeg")
    || ($_FILES["thumbnail"]["type"] == "image/gif")
    || ($_FILES["thumbnail"]["type"] == "image/webp"))) {

    if ($_FILES["thumbnail"]["error"] > 0) {
      echo "Return Code: " . $_FILES["thumbnail"]["error"] . "<br />";
    } else {
      // echo "Upload: " . $_FILES["thumbnail"]["name"] . "<br />";
      // echo "Type: " . $_FILES["thumbnail"]["type"] . "<br />";
      // echo "Size: " . ($_FILES["thumbnail"]["size"] / 1024) . " Kb<br />";
      // echo "Temp file: " . $_FILES["thumbnail"]["tmp_name"] . "<br />";
      // echo "Upload Dir: " . $thumbDirectory . "<br />";

      if (file_exists($thumbDirectory . $_FILES["thumbnail"]["name"])) {
        // echo $_FILES["thumbnail"]["name"] . " already exists. ";
      } else {
        $thumbLink = $thumbDirectory . strval(time()) . "-" . $_SESSION["uid"] . "-" . $_POST["titleInput"] . "." . $extensionThumb;
        $thumbLink = str_replace(' ', '_', $thumbLink);
        move_uploaded_file(
          $_FILES["thumbnail"]["tmp_name"],
          $thumbLink
        );
        // echo "Stored in: " . $thumbDirectory . $_FILES["thumbnail"]["name"];
      }
    }
  } else {
    // echo " Invalid image <br/>";
  }
} else {
  // echo " Thumbnail not set";
}
?>

<div class="spinner-border" role="status">
  <span class="visually-hidden">Loading...</span>
</div>

<?php

include_once "../utility/sql_connect.php";

if ($stmt = $con->prepare('INSERT INTO videos (video_title, video_description, thumbnail_link, video_link, channel_uid) VALUES (?, ?, ?, ?, ?)')) {
  $stmt->bind_param('sssss', $_POST["titleInput"], $_POST["descriptionInput"], $thumbLink, $videoLink, $_SESSION["uid"]);
  $stmt->execute();
  echo "Uploaded video to db!";
} else {
  echo 'Could not prepare db statement for video registery! ';
}

$con->close();
header("Location: ../");