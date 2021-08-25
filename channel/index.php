<?php session_start();
include_once "../utility/sql_connect.php";

$query1 = "SELECT * FROM ggusers WHERE uid = " . $_GET["c"];
$result1 = $con->query($query1);

if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $channelPfp = $row["pfp_url"];
        $channelName = $row["name"];
    }
} else {
    $channelPfp = "data:image/png;base64,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";
    $channelName = "Channel Not Found";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Head -->
    <title>Channel: <?php echo $channelName ?></title>

    <!-- CDN -->
    <?php include_once '../headers/cdn.html' ?>

    <!-- Links -->
    <link rel="stylesheet" href="http://localhost/style.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    <style>
        body {
            overflow-x: hidden;
        }

        .modal-header {
            border-bottom: 0px;
        }

        .modal-footer {
            border-top: 0px;
        }

        textarea {
            max-height: 200px;
        }

        .card {
            border: none;
        }

        .card-img-top {
            width: 100% !important;
            height: 200px !important;
            object-fit: cover;
        }

        .card-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .card-title {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .hovereffect {
            width: 100%;
            height: 100%;
            float: left;
            overflow: hidden;
            position: relative;
            text-align: center;
            cursor: default;
        }

        .hovereffect .overlay {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
            top: 0;
            left: 0;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.5);
            -webkit-transition: all .4s ease-in-out;
            transition: all .1s ease-in-out
        }

        .hovereffect img {
            display: block;
            position: relative;
            -webkit-transition: all .1s linear;
            transition: all .1s linear;
        }

        .hovereffect h2 {
            text-transform: uppercase;
            color: #fff;
            text-align: center;
            position: relative;
            font-size: 17px;
            background: rgba(0, 0, 0, 0.6);
            -webkit-transform: translatey(-100px);
            -ms-transform: translatey(-100px);
            transform: translatey(-100px);
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            padding: 10px;
        }

        .hovereffect a.info {
            text-decoration: none;
            display: inline-block;
            text-transform: uppercase;
            color: #fff;
            border: 1px solid #fff;
            background-color: transparent;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            margin: 50px 0 0;
            padding: 7px 14px;
        }

        .hovereffect a.info:hover {
            box-shadow: 0 0 5px #fff;
        }

        .hovereffect:hover img {
            -ms-transform: scale(1.1);
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        .hovereffect:hover .overlay {
            opacity: 1;
            filter: alpha(opacity=100);
        }

        .hovereffect:hover h2,
        .hovereffect:hover a.info {

            opacity: 1;
            filter: alpha(opacity=100);
            -ms-transform: translatey(0);
            -webkit-transform: translatey(0);
            transform: translatey(0);
        }

        .hovereffect:hover a.info {
            -webkit-transition-delay: .2s;
            transition-delay: .2s;
        }
    </style>
</head>

<body style="background-color: #111112;"  >
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
                            <a href="http://localhost/channel/?c=<?php echo $_SESSION['uid']?>" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
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

            <div class="col-sm min-vh-100 p-3 transition-fade" id="swup">
                <div class="channel-top d-flex align-middle">
                    <img src="<?php echo $channelPfp ?>" alt="" class="rounded-circle">
                    <h1 class="ms-3 mt-3"><?php echo $channelName ?></h1>
                </div>

                <hr class="color-light">

                <?php
                $query2 = "SELECT * FROM videos WHERE channel_uid = " . $_GET["c"] . " ORDER BY wid DESC LIMIT 4";
                $result2 = $con->query($query2);

                if ($result2->num_rows > 0) {

                ?>
                    <h1 class="fw-bold mb-4">Latest Uploads <a href="http://localhost/newest.php?c=<?php echo $_GET["c"] ?> " class="text-decoration-none text-primary"> ></a></h1>
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                    <?php
                    while ($row = $result2->fetch_assoc()) {
                        $thumbLink = $row["thumbnail_link"];
                        $videoTitle = $row["video_title"];
                        $videoDescription = $row["video_description"];
                        $wid = $row["wid"];
                        $videoLikes = $row["likes"];
                        $videoViews = $row["views"];
                        include "../headers/cards/normal_video_card.php";
                    }
                }
                    ?>
                </div>

                <?php
                $query3 = "SELECT * FROM videos WHERE channel_uid = " . $_GET["c"] . " ORDER BY views DESC LIMIT 4";
                $result3 = $con->query($query3);

                if ($result3->num_rows > 0) {

                ?>
                    <h1 class="fw-bold mb-4 mt-4">Most Popular Videos <a href="http://localhost/mostviewed.php?c=<?php echo $_GET["c"] ?> " class="text-decoration-none text-primary"> ></a></h1>
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                    <?php
                    while ($row = $result3->fetch_assoc()) {
                        $thumbLink = $row["thumbnail_link"];
                        $videoTitle = $row["video_title"];
                        $videoDescription = $row["video_description"];
                        $wid = $row["wid"];
                        $videoLikes = $row["likes"];
                        $videoViews = $row["views"];
                        include "../headers/cards/normal_video_card.php";
                    }
                }
                    ?>
                </div>

                <?php
                $query4 = "SELECT * FROM videos WHERE channel_uid = " . $_GET["c"] . " ORDER BY likes DESC LIMIT 4";
                $result4 = $con->query($query3);

                if ($result4->num_rows > 0) {

                ?>
                    <h1 class="fw-bold mb-4 mt-4">Most Loved Videos <a href="http://localhost/mostliked.php?c=<?php echo $_GET["c"] ?> " class="text-decoration-none text-primary"> ></a></h1>
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                    <?php
                    while ($row = $result4->fetch_assoc()) {
                        $thumbLink = $row["thumbnail_link"];
                        $videoTitle = $row["video_title"];
                        $videoDescription = $row["video_description"];
                        $wid = $row["wid"];
                        $videoLikes = $row["likes"];
                        $videoViews = $row["views"];
                        include "../headers/cards/normal_video_card.php";
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
    </script>


</body>

<?php $con->close(); ?>


</html>