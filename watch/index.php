<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Head -->
    <title>Watching: <?php echo $_GET["v"] ?></title>

    <!-- CDN -->
    <?php include_once '../headers/cdn.html' ?>

    <!-- Links -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
</head>

<body class="bg-dark">
    <!-- Nav -->
    <?php include_once '../headers/nav.php' ?>
    <?php include_once '../headers/sidepanel.html' ?>


    <!-- Player -->
    <div class="vcontainer d-flex justify-content-center" style=" background-color: #141516">
        <div class="video-wrapper" style="max-width: 75%;">
            <video id="player" playsinline controls data-poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg">
                <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" />
            </video>
    
            <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
            <script>
                const player = new Plyr('#player');
            </script>
        </div>
    </div>

</body>

</html>