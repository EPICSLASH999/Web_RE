<?php defined('APP') or die('direct script access denied!'); ?>

<!-- START OF NAVBAR -->
<header>
    <a href="index.php" class="logo"><i class="ri-home-heart-fill"></i><span>Sekai-RE</span></a>

    <ul class="navbar">
        <li><a href="index.php#home" class="active">Home</a></li> 
        <li><a href="index.php#news">Last News</a></li>
        <li><a href="index.php#faq">FAQ</a></li>
        <li><a href="index.php#about">About Us</a></li>
        <li><a href="#">Guide</a>
            <ul>
                <li><a href="guide_re4_main.php">Resident Evil 4</a></li>
                <!--<li><a href="#">Resident Evil 4 Remake</a></li>-->
            </ul>
        </li>
    </ul>

    <div class="main">
        <?php if(logged_in()):?>
            <?php if($_SESSION['USER']['admin'] == 1):?>
                
                <a href=<?php if(!isset($_SESSION['recaptcha'])):?> "pages/admin/admin_recaptcha.php" <?php else:?> "admin_main.php" <?php endif;?> class="games"><i class="ri-game-line"></i>Admin</a>
                
            <?php endif;?>
        <?php endif;?>
        <a href="forum_main.php">Forum</a> 
        <?php if(logged_in()):?>
            <div >
                <a href="profile.php" class="user_container">
                    <img src="<?= get_image($_SESSION['USER']['image'])?>" class="user_container_image" >
                    <span class="user_container_name">Hi, <?= $_SESSION['USER']['username']?></span>
                </a>
                
            </div>
        <?php else:?>
        <button class="btnLogin-popup" onclick='location.href="#"'><i class="ri-user-fill"></i>Sign In</button>
        <?php endif;?>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>

</header>
<!-- END OF NAVBAR -->

<script>
    /* START OF RESPONSIVE BOX */
    let menu = document.querySelector('#menu-icon');
    let navbar = document.querySelector('.navbar');

    menu.onclick = () => {
        menu.classList.toggle('bx-x');
        navbar.classList.toggle('open');
    } 
	/* END OF RESPONSIVE BOX */

    

	var user = {

		logout: function(){

			let form = new FormData();
			form.append('data_type', 'logout');
			var ajax = new XMLHttpRequest();

			ajax.addEventListener('readystatechange',function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200){
						let obj = JSON.parse(ajax.responseText);
						//alert(obj.message); //Successfully logged out message

						window.location.href = "index.php";
					}else{
						alert("Please check your internet connection");
					}
				}
			});

			ajax.open('post','ajax.inc.php', true);
			ajax.send(form);
		}
	};
</script>