<?php session_start();?>
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
</head>
<body style="background-color: #111112">
    <?php include_once './headers/nav.php' ?>

    <div class="container-fluid">
        <div class="row text-light">

            <div class="col-sm-auto bg-dark sticky-top" style="z-index: 1000">
                <div class="d-flex flex-sm-column flex-row flex-nowrap bg-dark align-items-center sticky-top">
                    <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center mt-5">
                        <li class="nav-item">
                            <a href="http://localhost" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <i class="fas fa-home fs-1 mt-3"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/profile" class="nav-link py-3 px-2" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
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


                </div>
            </div>

            <div class="col-sm p-3 min-vh-100 text-light">
                <div class="container w-50 mx-auto">
                    <div class="row w-50 mx-auto">
                        <h1 class="text-light text-center fw-bold pt-5" style="font-size:750%">404</h1> 
                    </div>
                    <div class="row w-50 mx-auto">
                        <h1 class="text-light text-center fw-light">Page not Found</h1> 
                    </div>
                    <p class="text-light text-center fw-light"><a class="text-decoration-none" href="http://localhost">Goto hompage</a> </h1> 
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