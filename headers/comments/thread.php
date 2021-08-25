<div class="row thread mb-3">
    <a class="text-decoration-none d-flex flex-wrap align-items-center" href="<?php echo 'http://localhost/channel/' . $commenter_uid ?>">
        <img class="rounded-circle" src="<?php echo $commenter_pfp ?>" width=18 height=18>
        <h5 class="fs-6 ms-2 pt-1"><?php echo $commenter_name ?> </h5>
    </a>
    <p class="m-0"><?php echo $comment_text?></p>
    <a href="" class="text-decoration-none text-secondary">Reply</a>
    <div class="replies border-start border-dark border-5">
        <?php
            // $y = 0;
            // while ($y < 10) {
            //     include "../headers/comments/reply.php";
            //     $y += 1;
            // }
        ?>

    </div>
</div>  