<?php
	
	require('config.inc.php'); //This imports the connection to database
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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> 
        
        <title>Safe-Zone</title>
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/root_style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/index_indexStyle.css?v3">
        <link rel="stylesheet" type="text/css" href="assets/css/features/navbar.css?v2">
        <link rel="stylesheet" type="text/css" href="assets/css/features/login_register.css?v1">
        <link rel="stylesheet" type="text/css" href="assets/css/features/scrollBar.css">
        <link rel="stylesheet" type="text/css" href="assets/css/features/popup.css">
        
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
        <?php include('feature_navbar.inc.php') ?> 
        
        <!-- START OF SECTIONS -->
        <section id="home" class="sectionhome">
            <?php include('feature_login&register.inc.php') ?>
            <?php include('feature_popup.inc.php') ?> 
        </section>
        <section id="news" class="sectionlastnews">
        
        <h1>Last News</h1>

        <p>A pocos días de haber anunciado que había comenzado a trabajar en el crack del remake de Resident Evil 4 Remake y luego de haber compartido 4
             betas del mismo a un grupo de testers, EMPRESS anunció hoy a través de su canal de Telegram que el crack final ha sido publicado.
        Resident Evil 4 (2023) hizo su debut en PC y consolas el pasado 23 de marzo y según EMPRESS el juego cuenta en PC con la versión v18 de Denuvo 
        (más avanzada que la de Hogwarts Legacy) junto con protecciones adicionales para los DLC (SecureDLC V2), triggers personalizados de VMProtect y DRMs 
        propios de Capcom y Steam. Pueden leer el .nfo completo del crack en este enlace. La emperatriz también dio la pista de su próximo crack, en el cual 
        menciona que es «la tercera es la vencida» (Third Time Is The Charm). Puede que sea Total War: Warhammer III o Dead Island 2, ya que este último cambió 
        de desarrollador tres veces (Yager Developments, Sumo Digital y Dambuster Studios).</p>
        
        <p>Al margen de algunos crashes con ray tracing al jugar con placas de 8GB de VRAM o menos (más allá de que el trazado de rayos no hace la gran diferencia),
         el port de PC de Resident Evil 4 fue recibido con bombos y platillos por su gran optimización y gráficos, sin necesidad de precarga de sombreados o stuttering, aunque los usuarios de Nvidia no estuvieron muy contentos por no haber incluido DLAA o DLSS 2, el cual se puede utilizar mediante un mod al igual que todos los recientes títulos de Capcom desarrollados con el versátil motor gráfico RE Engine.
         Como no podía ser de otra manera, varios modders lanzaron mods de desnudos para Ashley Graham, Ada Wong, Leon, Luis Sierra e incluso el excéntrico buhonero.</p>
         
        
        </section>
        <section id="faq" class="sectionfaq">
            <h1>FAQ</h1>
        
            <h4>¿De dónde puedo descargar los juegos gratis?</h4>
        <p>Esta página apoya el trabajo de los creadores, recuerda que descargar juegos piratas es ilegal y va en contra de los derechos de autor. La piratería de software, incluidos los juegos, es una violación de la ley y puede tener consecuencias legales graves.</p>
        <p>Descargar juegos piratas no solo es ilegal, sino que también puede ser perjudicial para ti y para tu equipo. Los archivos de juegos piratas a menudo contienen malware, virus u otro software malicioso que pueden dañar tu computadora, robar tu información personal o comprometer la seguridad de tu sistema.</p>
        <p>Cualquier mención o relación a la piratería te dará un ban permanente</p>
        <h4>¿Dónde puedo descargar mods?</h4>
        <p>Existen diversos sitios donde se pueden descargar mods, como primera y más segura opción te recomendamos https://www.nexusmods.com/residentevil42023/mods/, ten en cuenta que hay algunos mods que pueden ser +18, quedas advertido.</p>
        <h4>¿Puedo ser admin?</h4>
        <p>Actualmente el scope de la pagina no es lo suficientemente grande como para que necesitemos meter manos extras, sin embargo, si en un futuro el sitio crece consideraremos la posibilidad de agregar más administradores.</p>
        <h4>¿Estan afiliados con Capcom?</h4>
        <p>No, no estamos afiliados a Capcom de ninguna manera, solo somos una página donde compartimos noticias y creamos una comunidad pacífica. Todos los derechos le pertenecen a Capcom</p>


        </section>
        <section id="about" class="sectionaboutus">
        <h1>About Us</h1>

        
<h3>¡Bienvenido a nuestra página dedicada al Universo Resident Evil!</h3>

<p>En nuestro sitio web, somos apasionados fanáticos de la aclamada saga de videojuegos Resident Evil y su fascinante universo. 
Nuestro objetivo es proporcionar a los aficionados como tú un espacio dedicado a explorar y profundizar en todos los aspectos de esta franquicia icónica.</p>

<p>Como amantes de Resident Evil, comprendemos la importancia de la historia, los personajes, la jugabilidad y la atmósfera única que han definido esta serie a lo largo de los años. 
Nos enorgullece ofrecer un recurso en línea que reúne toda la información esencial, anécdotas interesantes y datos curiosos sobre el universo de Resident Evil.</p>


<p>Nuestro equipo está compuesto por entusiastas y expertos en la saga Resident Evil, quienes se dedican a recopilar y actualizar constantemente nuestra base de datos con información precisa y detallada.
Desde los primeros juegos clásicos hasta los últimos lanzamientos y expansiones, nos aseguramos de cubrir cada rincón y aspecto del universo de Resident Evil.</p>


<p>En nuestro sitio web, encontrarás una amplia variedad de contenidos. 
Desde perfiles detallados de los personajes más icónicos como Chris Redfield, Jill Valentine, Leon S. Kennedy y Albert Wesker, hasta análisis en profundidad de los distintos juegos y sus tramas intrincadas. 
También proporcionamos información sobre armas, enemigos, ubicaciones y eventos clave dentro del universo Resident Evil.</p>


<p>Además de ser una fuente confiable de conocimiento, también nos esforzamos por crear una comunidad vibrante para los fanáticos.
 Nuestro foro de discusión es un lugar donde puedes conectarte con otros seguidores de Resident Evil, compartir teorías, discutir tus momentos favoritos de la serie y participar en debates apasionantes.</p>


<p>Valoramos la diversidad de opiniones y perspectivas, y animamos a los fanáticos a contribuir con su conocimiento y pasión para enriquecer nuestra plataforma. 
Si tienes información adicional, anécdotas personales o cualquier otro dato interesante sobre el universo Resident Evil, no dudes en compartirlo con nosotros.</p>


<p>¡Te invitamos a explorar nuestra página y sumergirte en el fascinante y peligroso mundo de Resident Evil! 
Esperamos que encuentres nuestra plataforma informativa y entretenida, y que te conviertas en un miembro activo de nuestra comunidad de fanáticos. 
Juntos, seguiremos celebrando y disfrutando del legado de Resident Evil.</p>

        
        
        </section>
        <!-- END OF SECTIONS -->

        
        <!-- JS SCRIPTS -->
        <script src="./assets/js/scroll.js"></script>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </body>
</html>
