<?php defined('APP') or die('direct script access denied!'); ?>

<!-- START OF NAVBAR -->
<header>
    <a href="../../index.php" class="logo"><i class="ri-home-heart-fill"></i><span>Logo</span></a>

    <ul class="navbar">
        <li><a href="../../admin_main.php" class="active">Control</a></li> 
        <li><a href="access_admin.php">Usuarios</a></li>
        <li><a href="access_adminPost.php">Post</a></li>
        <li><a href="access_admin2.php">Objetos</a></li>
        <li><a href="access_admin3.php">Tipos</a></li>
    </ul>
	<div class="bx bx-menu" id="menu-icon"></div>
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