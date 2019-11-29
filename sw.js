;
//asignar un nombre y versión al cache
const CACHE_NAME = 'v1_cache_biweb',
  urlsToCache = [
    './',
    'https://fonts.googleapis.com/css?family=Raleway:400,700',
    'https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwJYtWqZPAA.woff2',
    'https://use.fontawesome.com/releases/v5.0.7/css/all.css',
    'https://use.fontawesome.com/releases/v5.0.6/webfonts/fa-brands-400.woff2',
    //'./style.css',
    './script.js',
    './usuario/Biblioteca.php',
    './usuario/buscar_autor.php',
    './usuario/buscar_titulo.php',
    './usuario/buscar_categoria.php',
    './usuario/historial.php',
    './usuario/InicioU.php',
    './usuario/PerfilUser.php',
    './PHP/cierre.php',
    './Bibliografia/bibliografia.php',
    './Index.php',
    './About.php',
    './Ingresar.php',
    './Registrar.php',
    './Imagenes/Logo.png',
    './Imagenes/twitter.webp',
    './Imagenes/youtube.webp',
    './Imagenes/Instagram.webp',
    './Imagenes/facebook.wix_mp',
    './Imagenes/website.png',
    './CSS/fonts.css',
    './CSS/main.css',
    './CSS/nuevo-menu.css',
    './CSS/Estilos.css',
    './CSS/estilos2.css',
    './js/nuevo-menu.js',
    './js/mostrarformulario.js',
    './js/main.js',
    './js/indexmain.js',
    './js/main-tarjeta.js',
    './js/jquery-1.11.2.min.js',
    './js/jquery-1.7.2.min.js',
    './js/jquery-3.0.0.min.js',
    './js/jquery-3.3.1.min.js',
    './assets/icons/book.ico'
  ]

//durante la fase de instalación, generalmente se almacena en caché los activos estáticos
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache)
          .then(() => self.skipWaiting())
      })
      .catch(err => console.log('Falló registro de cache', err))
  )
})
/*
//una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
  const cacheWhitelist = [CACHE_NAME]

  e.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            //Eliminamos lo que ya no se necesita en cache
            if (cacheWhitelist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName)
            }
          })
        )
      })
      // Le indica al SW activar el cache actual
      .then(() => self.clients.claim())
  )
})

//cuando el navegador recupera una url
self.addEventListener('fetch', e => {
  //Responder ya sea con el objeto en caché o continuar y buscar la url real
  e.respondWith(
    caches.match(e.request)
      .then(res => {
        if (res) {
          //recuperar del cache
          return res
        }
        //recuperar de la petición a la url
        return fetch(e.request)
      })
  )
})*/

self.addEventListener('activate', event => {   // Escuchamos al evento 'activate'
  event.waitUntil(self.clients.claim());        // El SW se registra como el worker activo para el cliente actual 

  event.waitUntil(
    caches.keys().then(cacheNames => {          // Toma las caches existentes

      return Promise.all(
        cacheNames.map(cacheName => {           // Recorremos las caches exitentes
          if (CACHE_NAME !== cacheName) {     // Si la caché del recorrido no es la caché actual...  
            return caches.delete(cacheName);    // La borramos, así conservamos únicamente la más reciente
          }
        })
      );

    })
  );
});



self.addEventListener('fetch', event => {                   // Escuchamos al evento 'fetch',
                                                            //  este se ejecuta siempre que se hace una solicitud HTTP (se pide o envía algo por Internet)
  event.respondWith(
    caches.open(CACHE_NAME).then(cache => {               // Abrimos la caché (en este momento ya contiene los archivos que decidimos cachear)
      return fetch(event.request).then(fetchResponse => {   // event.request es la solicitud al recurso. Contiene la URL y el método utilizado

        if(event.request.method === 'GET'){                 // Si el método es GET, quiere decir que estamos intentando traer datos,   
          cache.put(event.request, fetchResponse.clone());  //entonces interceptamos la respuesta y la agregamos a MI_CACHE
        }

        return fetchResponse;                     // Después dejamos que la solicitud siga su curso

      }).catch( _ => {                            // .catch se ejecutará cuando no se pueda hacer un 'fetch', en otras palabras,
                                                  //   cuando no se pueda completar una solicitud HTTP a Internet (offline)

        return cache.match(event.request)         // cache.match intenterá encontrar un archivo que cumpla con las características del recurso solicitado
          .then(cacheResponse => cacheResponse);  // Y después enviamos ese archivo encontrado en caché como respuesta.

      })

    })

  );

});