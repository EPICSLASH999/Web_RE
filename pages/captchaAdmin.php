<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        header("Location: controlAdmin.php");
        exit;
    }
?>

<html>
    <head>
        <title>No bots!</title>
        <style>
            html, body {
                background-image: url('img/background.jpg');
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
