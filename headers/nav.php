<meta name="google-signin-client_id" content="484320138775-5slru6lomq2l533o7rhgc7fscn05easo.apps.googleusercontent.com">

<div class="top-nav-section sticky-top">
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <ul class="navbar-nav">
            <form class="d-flex inline mx-5">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>

                <?php
                if (isset($_SESSION["logged_in"])) {
                ?>
                    <div class="dropdown">
                        <a href="" class="d-flex align-items-center justify-content-center link-dark text-decoration-none dropdown-toggle" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="rounded-circle mt-1" src="<?php echo $_SESSION['pfp'] ?>" width=32 height=32>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                            <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#uploadFormModal"> <i class="fas fa-video"></i> New Video</a></li>
                            <li><a class="dropdown-item" href=""> <i class="fas fa-cog"></i> Settings</a></li>
                            <li><a class="dropdown-item" href=""> Log out </a></li>
                        </ul>
                    </div>
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
                        url: '../api/google_login/database_entry.php',
                        dataType: "json",
                        data: {
                            "g_id": profile.getId(),
                            "email": profile.getEmail(),
                            "username": profile.getName(),
                            "pfp": profile.getImageUrl()
                        },

                        success: function(obj, textstatus) {
                            if (!('error' in obj)) {
                                console.log("Database Entry: " + obj);

                                // Session Vars
                                jQuery.ajax({
                                    type: "POST",
                                    url: '../api/google_login/session_vars.php',
                                    dataType: "json",
                                    data: {
                                        "g_id": profile.getId(),
                                    },

                                    success: function(obj, textstatus) {
                                        if (!('error' in obj)) {
                                            console.log("Session Vars: " + obj);
                                        } else {
                                            console.log(obj.error);
                                        }
                                    }
                                });
                                /// Session Vars

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