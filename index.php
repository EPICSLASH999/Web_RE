<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", initial-scale="1.0">
        <title>Safe-Zone</title>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/index_indexStyle.css">
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
        <link rel="stylesheet" type="text/css" href="css/index_login_register.css">
        <link rel="stylesheet" type="text/css" href="css/scrollBar.css">

        <!-- Icons -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
    
    <body>
        <!-- START OF NAVBAR -->
        <header>
            <a hred="#" class="logo"><i class="ri-home-heart-fill"></i><span>Logo</span></a>

            <ul class="navbar">
                <li><a href="#home" class="active">Home</a></li> 
                <li><a href="#news">Last News</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#">Guide</a>
                    <ul>
                        <li><a href="re4_main.php">Resident Evil 4</a></li>
                        <li><a href="#">Resident Evil 4 Remake</a></li>
                    </ul>
                </li>
            </ul>

            <div class="main">
                <a href="#" class="user"><i class="ri-game-line"></i>Games</a>
                <a href="#">Forum</a> 
                <button class="btnLogin-popup" onclick='location.href="#home"'><i class="ri-user-fill"></i>Sign In</button>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
        
        </header>
        <!-- END OF NAVBAR -->


        <!-- START OF SECTIONS -->
        <section id="home" class="sectionhome">
            <!-- START OF LOGIN & REGISTER POPUP FORMS -->
            <div class="wrapper">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>
                <!-- LOGIN FORM -->
                <div class="form-box login">
                    <h2>Login</h2>
                    <form autocomplete="off" action="#" id ="formLogin">
                        <div class="input-box">
                            <input type="email" autocomplete="off" required>
                            <label>Email</label>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="password" autocomplete="new-password" required>
                            <label>Password</label>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox"> 
                            Remember me</label>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn">Login</button>
                        <div class="login-register">
                            <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                        </div>
                    </form>
                </div>

                <!-- REGISTER FORM -->
                <div class="form-box register">
                    <h2>Registration</h2>
                    <form action="#" autocomplete="off" id="formRegister">
                        <div class="input-box">
                            <input type="text" autocomplete="off" required>
                            <label>Username</label>
                            <i class="uil uil-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="email" autocomplete="off" required>
                            <label>Email</label>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="password" autocomplete="new-password" required>
                            <label>Password</label>
                            <i class="uil uil-lock icon"></i>
                        </div>
                        <div class="input-box">
                            <input type="password" class="password" autocomplete="new-password" required>
                            <label>Confirm Password</label>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox"> 
                            I agree to the terms & conditions</label>
                        </div>
                        <button type="submit" class="btn">Register</button>
                        <div class="login-register">
                            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END OF LOGIN & REGISTER POPUP FORMS -->
        </section>
        <section id="news">Last News</section>
        <section id="faq">FAQ</section>
        <section id="about">About Us</section>
        <!-- END OF SECTIONS -->
        

        <!--js link for navbar -->
        <script type="text/javascript" src="js/navbar.js"></script>
        <!-- js link for sections -->
        <script type="text/javascript" src="js/scroll.js"></script>

        <!-- js link for login & register popups -->
        <script type="text/javascript" src="js/login_register.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </body>
</html>