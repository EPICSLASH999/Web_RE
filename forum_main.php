<?php
	
	require('config.inc.php');
	require('functions.php');

	$page = $_GET['page'] ?? 1;
	$page = (int)$page;

	if($page < 1)
		$page = 1;

?> 

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Forum</title>
		
		<!-- Original -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/root_style.css">
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
		<link rel="stylesheet" type="text/css" href="css/login_register.css">
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

		<style>
			
			@keyframes appear{
				0%{
					opacity: 0;
				}
				100%{
					opacity: 1;
				}
			}

			.hide{
				display:none;
			}
	
		</style> 
		
		
		
		<div class="container">
			<section class="class_1" >
				<?php include('feature_navbar.inc.php') ?>
				<?php include('feature_login&register.inc.php') ?>

				<div class="class_11" >
					<?php include('success.alert.inc.php') ?>
					<?php include('fail.alert.inc.php') ?>
					<h1 class="class_41"  >
						Posts
					</h1>

					<?php if(logged_in()):?>
						<form onsubmit="mypost.submit(event)" method="post" class="class_42" >
							<div class="class_43" >
								<textarea placeholder="Whats on your mind?" name="post" class="js-post-input class_44" ></textarea>
							</div>
							<div class="class_45" >
								<button class="class_46"  >
									Post
								</button>
							</div>
						</form>
					<?php else:?>
						<div class="class_13" >
							<i class="bi bi-info-circle-fill class_14">
							</i>
							<div class="class_15" style="cursor:pointer;text-align: center;"  onclick="login.show()">
								You're not logged in <br>Click here to login and post
					</div>
						</div>
					<?php endif;?>

					<section class="js-posts">
						<div style="padding:10px;text-align:center;">Loading posts....</div>
					</section>
		
					<div class="class_37" style="display: flex;justify-content: space-between;" >
						<button onclick="mypost.prev_page()" class="class_54"  >
							Prev page
						</button>
						<div class="js-page-number">Page 1</div>
						<button onclick="mypost.next_page()" class="class_39"  >
							Next page
						</button>

					</div>
		
				</div>
				<br><br>
				
				<?php include('forum_post.edit.inc.php') ?>
			</section>

			
			<!--post card template-->
			<div class="js-post-card hide class_42" style="animation: appear 3s ease;" >
				<a href="#" class="js-profile-link class_45" >
					<img src="assets/images/user.jpg" class="js-image class_47" >
					<h2 class="js-username class_48" style="font-size:16px" >
						Jane Name
					</h2>
				</a>
				<div class="class_49" >
					<h4 class="js-date class_41"  >
						3rd Jan 23 14:35 pm
					</h4>
					<div class="js-post class_15"  >
						is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets c
					</div>
					<div class="class_51" >
						<i class="bi bi-chat-left-dots class_52">
						</i>
						<div class="js-comment-link class_53" style="color:blue;cursor: pointer;"  >
							Comments
						</div>
					</div>
		
				</div>
			</div>
			<!--end post card template-->
		</div>
		
		
	
	</body>

	<!-- JS SCRIPTS -->
	<script>
		var page_number = <?=$page?>;
		var home_page = true;
	</script>
	<script src="./assets/js/mypost.js"></script>

	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>