<?php
	
	require('config.inc.php');
	require('functions.php');

	if(!logged_in()){
		header("Location: forum_main.php");
		die;
	}

	$user_id = $_GET['id'] ?? $_SESSION['USER']['id'];

	$query = "select * from users where id = '$user_id' limit 1";
	$row = query($query);

	if($row)
	{
		$row = $row[0];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
	<title>Profile - Forum</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css?v2">

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
		
		.hide{
			display:none;
		}
	</style>
	<section class="class_1" >
		<?php include('feature_navbar.inc.php') ?>
		<div class="class_11" >
			<div class="class_12" >
				<?php include('success.alert.inc.php') ?>
				<?php include('fail.alert.inc.php') ?>

				<?php if(!empty($row)):?>
					<div class="class_19" >
					</div>
					<div class="class_20" >
						<img src="<?=get_image($row['image'])?>" class="class_21" >
						<div class="class_22" >
							<h1 class="class_23"  >
								<?=$row['username']?>
							</h1>

							<a target="_new" href="<?=$row['fb']?>"><i class="bi bi-facebook class_24"></i></a>
							<a target="_new" href="<?=$row['tw']?>"><i  class="bi bi-twitter class_24"></i></a>
							<a target="_new" href="<?=$row['yt']?>"><i  class="bi bi-youtube class_24"></i></a>
							<div class="class_15"  >
								<?=htmlspecialchars($row['bio'])?>
							</div>
						</div>

						<?php if(i_own_profile($row)):?>
							<a href="profile-settings.php">
								<button class="class_39"  >
									Edit Profile
								</button>
							</a>
							<button onclick="user.logout()" class="class_39"  >
								Logout
							</button>
						<?php endif;?>

						<div style="clear:both"></div>
					</div>
 				<?php else:?>
					<div class="class_16" >
						<i class="bi bi-exclamation-circle-fill class_14">
						</i>
						<div class="class_15"  >
							Profile not found!
						</div>
					</div>
	 			<?php endif;?>

			</div>
 
		</div>
		<br><br>
		<?php include('feature_login&register.inc.php') ?>
	</section>
	
</body>
</html>