<meta name="google-signin-client_id" content="484320138775-5slru6lomq2l533o7rhgc7fscn05easo.apps.googleusercontent.com">

<div class="top-nav-section sticky-top">
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <button class="openbtn" onclick="openNav()">&#9776;</button>
            </li>
            <form class="d-flex inline mx-5">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>

                <?php
                if (isset($_SESSION["logged_in"])) {
                ?>
                    <img class="rounded-circle mt-1" src="<?php echo $_SESSION['pfp'] ?>" width=32 height=32>
                    
                <?php
                } else {
                ?>
                    <li class="gsignin">
                        <div class="g-signin2" data-onsuccess="onSignIn"></div>
                    </li>
                <?php } ?>
            </form>



            <script>
                function reload() {
                    if (window.localStorage) {
                        if (!localStorage.getItem('firstLoad')) {
                            localStorage['firstLoad'] = true;
                            window.location.reload();
                        } else localStorage.removeItem('firstLoad');
                    }
                };


                function onSignIn(googleUser) {
                    var profile = googleUser.getBasicProfile();

                    jQuery.ajax({
                        type: "POST",
                        url: '../videoweb/api/google_login.php',
                        dataType: "json",
                        data: {
                            "g_id": profile.getId(),
                            "email": profile.getEmail(),
                            "username": profile.getName(),
                            "pfp": profile.getImageUrl()
                        },

                        success: function(obj, textstatus) {
                            if (!('error' in obj)) {
                                console.log(obj);
                            } else {
                                console.log(obj.error);
                            }
                        }
                    });

                    reload();
                }
            </script>

        </ul>
    </nav>
</div>