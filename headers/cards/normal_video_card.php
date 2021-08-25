<div class="col">
    <div class="card" style="max-height: 100%; height: 100%">
        
        <div class="hovereffect">
            <a href="http://localhost/watch/?v=<?php echo $wid?>"> 
                <img src="<?php echo $thumbLink?>" class="card-img-top img-responsive" alt="..."  style="height:75%">
                <div class="overlay">
                    <h2>
                        Views: <?php echo $videoViews?>
                        <br>
                        Likes: <?php echo $videoLikes?>
                    </h2>
                </div>
            </a>
        </div>
        
        <div class="card-body bg-dark">
            <a href="http://localhost/watch/?v=<?php echo $wid?>" class="text-decoration-none text-light"> <h5 class="card-title fw-bold m-0"><?php echo $videoTitle;?></h5></a>
            <a href="http://localhost/watch/?v=<?php echo $wid?>" class="text-decoration-none text-light"> <p class="card-text mb-2"><?php if ($videoDescription) { echo $videoDescription;} else {echo "<br/>";}?></p></a> 
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-dark p-0 m-0"> 
                    <a class="text-decoration-none d-flex" href="<?php echo 'http://localhost/channel/?c='.$channelUid?>">
                        <img class="rounded-circle" src="<?php echo $channelPfp?>" width=32 height=32> 
                        <h5 class="fs-6 ms-2 pt-1"><?php echo $channelName?> </h5> 
                    </a> 
                </li>
            </ul>
        </div>
    </div>
</div>