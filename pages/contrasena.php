<html>
    <head>
        <title> ¿Contraseña olvidada? </title>
        <script src="../JQuery-3.6.3/jquery-3.6.3.min.js" type="application/javascript"></script>
        <style>
            html, body {
                background-image: url('../assets/images/pages/index/background.jpg');
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
    </head>
    <body>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <h2>¿Se te ha olvidodo la contraseña?</h2>
                <p>No te preocupes, nosotros te ayudaremos. <br>
                Proporciona tu correo para enviarte una nueva contraseña.</p>
             
                <form id="formulario" method="Post">
                <div class="user-box">
                    <label>Correo: </label><input type="text" name="correo" id="el_correo" required>
                </div>
                <br>
                <div class="btn">
                    <button type="button" onclick="enviarCorreo()">Enviar correo</button>
                </div>
                <br>
                <a href="../index.php">Regresar</a>	
                </form>

            </div>
        </div>
        <script>
        function enviarCorreo() {
            var correo = document.getElementById('el_correo').value;
            console.log('Correo:', correo);
            $.post("enviar.php",
            {
                correo:$("#el_correo").val()
            });
            window.location.href = "../index.php";
        }
    </script>
    </body>
</html>