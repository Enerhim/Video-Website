<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Head -->
    <title>Video Sharing Website</title>

    <!-- CDN -->
    <?php include_once './headers/cdn.html' ?>

    <!-- Links -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
    <style>
        .vl {
            border-left: 1px solid gray;
        }

        .modal-header {
            border-bottom: 0px;
        }

        .modal-footer {
            border-top: 0px;
        }
    </style>
</head>

<body class="bg-dark">
    <!-- Nav -->
    <nav class="navbar navbar-expand-sm navbar-dark" style="color: white; z-index: 2; background-color: #141516">
        <a class="navbar-brand" href="http://localhost">
            <h1 class="ml-4">Video Sharing Website</h1>
        </a>
    </nav>
    <?php include_once './headers/nav.php' ?>
    <?php include_once './headers/sidepanel.html' ?>

    <!-- Content -->
    <div class="container p-0" style="margin-top: 10%">
        <div class="row">
            <section class="m-2 shadow-lg col-md" style="max-width: 320px">
                <div class="thumb-container">
                    <a href="http://localhost/watch/?v=00000a">
                        <img src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" alt="Thumbnail" class="rounded thumbnail" width="300px" height="200px">
                    </a>
                </div>
                <div class="details d-flex">
                    <a href="#geochannel"><img src="https://yt3.ggpht.com/ytc/AKedOLRw8FkWXQj3wvux2ybZOb3PeZ_lgGhiSTJuJ5kLhg=s68-c-k-c0x00ffffff-no-rj" alt="" class="rounded-circle creatoricon" style="width: 48px;  height: 48px; display:inline-block; margin: 10px;"></a>
                    <div class="info">
                        <a href="#geochannelvideo">
                            <p class="title text-white mt-2" style="margin-bottom: 5px">My Planet</p>
                        </a>
                        <a href="#geochannelvideo">
                            <p class="creatorname text-secondary">Geochannel</p>
                        </a>
                    </div>
                </div>
            </section>
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

                <form action="./api/upload_video.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body" class="border-none">

                        <div class="container">

                        <hr class="text-white"/>

                        <!-- Video File -->
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3    ">
                                        <label class="input-group-text" for="video">Upload Video</label>
                                        <input type="file" name="video" id="video" class="form-control" onchange="readURLVideo(this);" accept="video/mp4, video/mkv, video/avi, video/webm"/>
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

                            <hr class="text-white"/>


                        <!-- Thumbnail File -->
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3    ">
                                        <label class="input-group-text" for="thumbnail">Upload Thumbnail</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control" onchange="readURLThumb(this);" accept="image/png, image/jpg, image/jpeg, image/gif, image/webp" />
                                    </div>
                                </div>

                                <div class="col">
                                    <img id="thumbnail-preview" width="100%" height="80%"> </img>
                                </div>
                            </div>
                        </div>

                        <br />
                    </div>

                    <div class="modal-footer" class="border-none text-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Video Preview -->
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

</html>