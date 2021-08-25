<div class="col">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-5">
                <div class="hovereffect">
                    <a href="http://localhost/watch/?v=<?php echo $wid ?>">
                        <img src="<?php echo $thumbLink ?>" class="card-img-top img-responsive" alt="..." style="height:75%">
                        <div class="overlay">
                            <h2>
                                Views: <?php echo $videoViews ?>
                                <br>
                                Likes: <?php echo $videoLikes ?>
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card-body h-100" style="background-color: #111112">
                    <a href="http://localhost/watch/?v=<?php echo $wid ?>" class="text-decoration-none text-light">
                        <h5 class="card-title fw-bold m-0"><?php echo $videoTitle; ?></h5>
                    </a>
                    <a href="http://localhost/watch/?v=<?php echo $wid ?>" class="text-decoration-none text-light">
                        <p class="card-text mb-2"><?php if ($videoDescription) {
                                                        echo $videoDescription;
                                                    } else {
                                                        echo "<br/>";
                                                    } ?></p>
                    </a>
                    <ul class="list-group d-flex h-75">
                        <li class="list-group-item p-0 mt-auto" style="background-color: #111112">
                            <a class="text-decoration-none d-flex" href="<?php echo 'http://localhost/channel/?c=' . $channelUid ?>">
                                <img class="rounded-circle" src="<?php echo $channelPfp ?>" width=32 height=32>
                                <h5 class="fs-6 ms-2 pt-1"><?php echo $channelName ?> </h5>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>