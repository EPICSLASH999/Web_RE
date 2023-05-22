//const CACHE_NAME = 'cache-1';
const CACHE_STATIC_NAME  = 'static-v1';
const CACHE_DYNAMIC_NAME = 'dynamic-v1';

const CACHE_IMMUTABLE_NAME = 'immutable-v1';


self.addEventListener('install', e => {

    const cacheProm = caches.open( CACHE_STATIC_NAME )
        .then(cache => {
            
            return cache.addAll([
                './',
                './index.php',
                './assets/css/index_indexStyle.css',
                './assets/css/root_style.css',
                './assets/css/features/navbar.css',
                './assets/css/features/login_register.css',
                './assets/css/features/scrollBar.css',
                './assets/css/features/popup.css',
                './assets/images/pages/index/background.jpg',
                './assets/images/pages/index/background_cellphone.jpg',
                './assets/js/scroll.js',
                './assets/images/manifest/main.PNG',
                './app.js',
                './manifest.json',

                './functions.php',
                './ajax.inc.php',
                'forum_main.php',
                'guide_re4_main.php',
                'guide_re4_searcher.php',
                './liveSearch.php',

                './JQuery-3.6.3/jquery-3.6.3.min.js'
            ]);
            
        });

    const cacheImmutable = caches.open( CACHE_IMMUTABLE_NAME )
        .then(cache => {
            
            return cache.addAll([
                'https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css',
                'https://unpkg.com/boxicons@latest/css/boxicons.min.css',
                //'https://unicons.iconscout.com/release/v4.0.0/css/line.css',
                //'https://fonts.googleapis.com',
                //'https://fonts.gstatic.com',
                'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
                'https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js',
                'https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js'
            ]);
            
        });

    e.waitUntil(Promise.all([cacheProm, cacheImmutable]));

});

self.addEventListener('fetch', e => {
    
    // 2- Cache with Network Fallback
    const respuesta = caches.match( e.request )
        .then( res => {

            if ( res ) return res;

            // No existe el archivo
            // tengo que ir a la web
            console.log('No existe, extrayendo:', e.request.url);

            return fetch(e.request).then(newResp => {   
                
                caches.open ( CACHE_DYNAMIC_NAME )
                    .then(cache => {
                        cache.put(e.request, newResp);
                    });
                
                return newResp.clone();
            });
        });

    e.respondWith(respuesta);

});



// Escuchar PUSH
/*
self.addEventListener('push', e =>{

    //console.log(e);

    const data = JSON.parse(e.data.text());

    console.log(data);


    const title = data.titulo;
    const options = {
        body: data.cuerpo,
        //icon: 'img/icons/icon-72x72.png'
        icon: `img/avatars/${data.usuario}.jpg`,
        badge: 'img/favicon.ico',
        image: 'https://datainfox.com/wp-content/uploads/2017/10/avengers-tower.jpg',
        vibrate: [125,75,125,275,200,275,125,75,125,275,200,600,200,600],
        openUrl: '/'
    };

    e.waitUntil(self.registration.showNotification(title,options));
});
*/
