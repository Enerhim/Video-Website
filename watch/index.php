<?php session_start() ;

include_once "../utility/sql_connect.php";

$query1 = 'SELECT * FROM videos WHERE wid ='.$_GET["v"];                        
$result1 = $con->query($query1);

if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $thumbLink = $row["thumbnail_link"];
        $videoLink = $row["video_link"];
        $videoTitle = $row["video_title"];
        $videoDescription = $row["video_description"];
        $videoLikes = $row["likes"];
        $videoViews = $row["views"];
        
        $query2 = 'SELECT * FROM ggusers WHERE uid = '.$row["channel_uid"];                        
        $result2 = $con->query($query2);

        while ($row = $result2->fetch_assoc()) {   
            $channelPfp = $row["pfp_url"];
            $channelUid = $row["uid"];
            $channelName = $row["name"];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" class="transition-fade" id="swup">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Head -->
    <title>Watching: <?php echo $videoTitle ?></title>

    <!-- CDN -->
    <?php include_once '../headers/cdn.html' ?>

    <!-- Links -->
    <link rel="stylesheet" href="http://localhost/style.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    <style>
    </style>
</head>

<body style="background-color: #111112;">
    <?php include_once '../headers/nav.php' ?>

    <div class="container-fluid">
        <div class="row text-light">

            <div class="col-sm-auto bg-dark  sticky-top" style="z-index: 1000">
                <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                    <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center mt-5">
                        <li class="nav-item">
                            <a href="http://localhost" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <i class="fas fa-home fs-1 mt-3"></i>
                            </a>
                        </li>
                        <?php if (isset($_SESSION['logged_in'])) {?>
                        <li>
                            <a href="http://localhost/channel?c=<?php echo $_SESSION['uid']?>" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                                <i class="fas fa-user fs-1 mt-3"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/history/" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                                <i class="fas fa-history fs-1 mt-3"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/videos/" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                                <i class="fas fa-film fs-1 mt-3"></i>
                            </a>
                        </li>
                        <?php }?>


                </div>
            </div>

            <div class="col-sm min-vh-100 p-0">
                <!-- Player -->

                <div class="vcontainer d-flex justify-content-center" style=" background-color: #0b121c;">
                    <div class="video-wrapper" style="max-width: 75%;">
                        <video id="player" playsinline controls data-poster="<?php echo $thumbLink?>">
                            <source src="<?php echo $videoLink?>" type="video/mp4" />
                        </video>

                        <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
                        <script>
                            const player = new Plyr('#player');
                        </script>

                    </div>
                </div>

                <h1 class="text-white pt-3 px-5 mx-5"><?php echo $videoTitle?></h1>
                <a class="text-decoration-none d-flex px-5 pb-2 mb-1 mx-5 border-bottom border-dark border-2" href="<?php echo 'http://localhost/channel/'.$channelUid?>">
                    <img class="rounded-circle" src="<?php echo $channelPfp?>" width=32 height=32> 
                    <h5 class="fs-6 ms-2 pt-1"><?php echo $channelName?> </h5> 
                </a> 
                
                <p class="text-secondary px-5 mx-5">Description: </p>
                <p class="text-white px-5 pb-3 mx-5 border-bottom border-dark border-2">
                    <?php if ($videoDescription) { echo $videoDescription;} else {echo "No description";}?>
                </p>
                
                <p class="text-secondary px-5 mx-5">Comments: </p>
                <div class="input-group pb-3 px-5 mx-5 w-75">
                    <input name="comment_box" id="comment_box" type="text" class="form-control bg-dark text-light" style="border: 0px;" placeholder="Write a comment" aria-label="Write a comment" aria-describedby="commentInput">
                    <button class="btn btn-dark" type="button" id="commentInput"
                    onclick="upload_comment()"
                    
                    >Post</button>
                </div>

                <!-- Comment Section -->

                <div class="container mb-5">
                    <!-- Thread -->
                    <?php
                        $query1 = 'SELECT * FROM comments ORDER BY likes DESC';                        
                        $result1 = $con->query($query1);

                        if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                                    $comment_text = $row["comment_text"];
                                    $commenter_uid = $row["commenter_uid"];

                                $query2 = 'SELECT * FROM ggusers WHERE uid = '.$row["commenter_uid"];                        
                                $result2 = $con->query($query2);

                                while ($row = $result2->fetch_assoc()) {   
                                    $commenter_pfp = $row["pfp_url"];
                                    $commenter_name = $row["name"];
                                }
    
                                include "../headers/comments/thread.php";
                            }
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- Upload Modal -->

    <div class="modal fade" id="uploadFormModal" tabindex="-1" aria-labelledby="uploadFormModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-dark">

                <div class="modal-header" class="border-none">
                    <h5 class="modal-title text-light text-center" id="uploadFormModalLabel"><i class="fas fa-video"></i> Upload Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action='./api/upload_video.php' method="post" enctype="multipart/form-data">
                    <div class="modal-body" class="border-none">

                        <div class="container">

                            <hr class="text-white" />

                            <!-- Metadata -->
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="titleInput" name="titleInput" placeholder="Video Title" required>
                                <label for="titleInput">Video Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="descriptionInput" name="descriptionInput" placeholder="Video Description" maxlength=2000 height=200px></textarea>
                                <label for="descriptionInput">Video Description</label>
                            </div>

                            <!-- Video File -->
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3    ">
                                        <label class="input-group-text" for="video">Upload Video</label>
                                        <input type="file" name="video" id="video" class="form-control" onchange="readURLVideo(this);" accept="video/mp4, video/mkv, video/avi, video/webm" required />
                                    </div>
                                </div>

                                <div class="col">
                                    <video id="video-preview"> </video>
                                    <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
                                    <script>
                                        const player = new Plyr('#video-preview');
                                    </script>
                                </div>
                            </div>

                            <hr class="text-white" />


                            <!-- Thumbnail File -->
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3    ">
                                        <label class="input-group-text" for="thumbnail">Upload Thumbnail</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control" onchange="readURLThumb(this);" accept="image/png, image/jpg, image/jpeg, image/gif, image/webp" />
                                    </div>
                                </div>

                                <div class="col">
                                    <img id="thumbnail-preview" width="100%" height="80%" src="https://via.placeholder.com/200/?text=Select%20a%20thumbnail"> </img>
                                </div>
                            </div>
                        </div>

                        <br />
                    </div>

                    <div class="modal-footer" class="border-none text-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Video and Thumbnail Preview -->
    <script type="text/javascript">
        function readURLThumb(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#thumbnail-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURLVideo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#video-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        function upload_comment() {
            jQuery.ajax({
                type: 'POST',
                url: '../api/upload_comment.php',
                dataType: 'json',
                data: {
                    'comment_text': $('#comment_box').val()
                },

                success: function(obj, textstatus) {
                    console.log(obj)
                    location.reload();      
                }
            })
        }
    </script>


</body>

<?php $con->close() ?>


</html>