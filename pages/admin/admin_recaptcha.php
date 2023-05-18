<?php
	
	require('../../config.inc.php'); //This imports the connection to database
	require('../../functions.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION["recaptcha"] = "true";
        header("Location: ../../admin_main.php");
        exit;
    }

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
    <link rel="stylesheet" type="text/css" href="../../assets/css/root_style.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/features/scrollBar.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/features/navbar.css">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
            html, body {
                background-image: url('../../assets/images/pages/index/background.jpg');
                background-size: cover;
            }
            .g-recaptcha {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 10%;
            }
            .modal {
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                padding-top: 10%;
                background-color: rgba(0, 0, 0, 0.5); /* Fondo opaco */
                
            }

            .modal-content {
                background-color: rgba(59, 7, 7,0.5); /* Color de fondo del contenido del modal */
                margin: 10% auto;
                padding: 20px;
                border: 2px solid rgba(59, 7, 7, 0.7); /* Borde tinto */
                width: 80%;
                max-width: 600px;
            }
            h2 {
                color: aliceblue;
                font-weight: bold; 
                text-transform: uppercase; 
                text-align: center; 
                letter-spacing: 2px; 
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
            }
            h1 {
                color: aliceblue;
            }
            p {
                color: aliceblue;
                font-weight: bold; 
                text-align: center; 
            }
        </style>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            function onSubmit(token) {
                // Función que se ejecuta automaticamente al marcar el captcha
                document.getElementById("captchaForm").submit();
            }
        </script>

</head>

<body>

    <br><br><br><br><br>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <h2>Acceso a control Administratico</h2>
            <p>Marca la casilla del captcha para avanzar.</p>
            <form id="captchaForm" method="post">
                <div class="g-recaptcha" data-sitekey="6LemIiMlAAAAAFNPJt6j-VT7ffZ7mvgjUsB_MAPl" data-callback="onSubmit"></div>
                <button type="submit" style="display: none;">Enviar</button>
            </form>
        </div>
    </div>

</body>

</html>