<?php
	
	require('config.inc.php'); //This imports the connection to database
	require('functions.php');

	$page = $_GET['page'] ?? 1;
	$page = (int)$page;

	if($page < 1)
		$page = 1;

?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
        
    <title> Admin </title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/root_style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/features/scrollBar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/features/navbar.css">
    <link rel="stylesheet" href="assets/css/controlAdmin.css?v2">

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
    main{
        margin-top: 11%;

        margin-left: 5rem;
        margin-right: 5rem;
    }
</style>

    <?php include('feature_navbar.inc.php') ?> 

    <main>
        <h1>Hello, <?= $_SESSION['USER']['username']?>!</h1>
        <hr>
        <br>
    </main>

    <!-- Botones -->
    <div class="button-container btnCU">
        <button id="btnCU" class="button" onclick="window.location='pages/admin/access_admin.php';">Control de Usuarios</button>
    </div>

    <div class="button-container btnCP">
        <button id="btnCP" class="button" onclick="window.location='pages/admin/access_adminPost.php';">Control de Publicaciones</button>
    </div>

    <div class="button-container btnCO">
        <button id="btnCO" class="button" onclick="window.location='pages/admin/access_admin2.php';">Control de Objetos</button>
    </div>

    <div class="button-container btnCT">
        <button id="btnCT" class="button" onclick="window.location='pages/admin/access_admin3.php';">Control de Tipos</button>
    </div>

</body>

</html>