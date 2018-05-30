var cacheName = "v1";
const RUNTIME = 'runtime';
var cacheFiles = [
'./',
'./ico/favicon.ico',
//'./font/fontawesome/fontawesome-webfont.eot',
//'./font/fontawesome/fontawesome-webfont.svg',

//'./font/fontawesome/fontawesome-webfont.woff',
//'./font/fontawesome/FontAwesome.otf',
'./css/bootstrap-responsive.css',
'./css/bootstrap.css',
'./css/cards.css',
//'./css/font-awesome.css',
'./css/headerfix.css',
'./css/overwrite.css',
'./css/style.css',
'./css/media/Coin.png',
'https://code.jquery.com/jquery-1.12.4.js',
'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
'https://cdn.jsdelivr.net/npm/vue',
'./js/app.js',
'./js/market.js',
'./js/script.js',
'./images/banner2.jpg',
'./images/gold.png',
'./images/opengoldpack.png',

'./images/icons/icon-128x128.png'

]

self.addEventListener('install',function (e) {
	console.log("[ServiceWorker] installed");
	e.waitUntil(
		caches.open(cacheName).then(function(cache){
			console.log("[ServiceWorker] Caching cacheFiles");
			return cache.addAll(cacheFiles);
		})
	)
})
self.addEventListener('activate',function (e) {
	console.log("[ServiceWorker] Activated");
	const currentCaches = [cacheName, RUNTIME];
	e.waitUntil(

    	// Get all the cache keys (cacheName)
		caches.keys().then(function(cacheNames) {
			return Promise.all(cacheNames.map(function(thisCacheName) {

				// If a cached item is saved under a previous cacheName
				if (thisCacheName !== cacheName) {

					// Delete that cached file
					console.log('[ServiceWorker] Removing Cached Files from Cache - ', thisCacheName);
					return caches.delete(thisCacheName);
				}
			}));
		})
	); // end e.waitUnti
})
/*self.addEventListener('fetch',function (e) {
	//console.log("[ServiceWorker] Fetching",e.request.url);
	// e.respondWidth Responds to the fetch event
	e.respondWith(

		// Check in cache for the request being made
		caches.match(e.request)


			.then(function(response) {

				// If the request is in the cache
				if ( response ) {
					//console.log("[ServiceWorker] Found in Cache", e.request.url, response);
					// Return the cached version
					return response;
				}

				// If the request is NOT in the cache, fetch and cache

				var requestClone = e.request.clone();
				fetch(requestClone)
					.then(function(response) {

						if ( !response ) {
							console.log("[ServiceWorker] No response from fetch ")
							return response;
						}

						var responseClone = response.clone();

						//  Open the cache
						caches.open(cacheName).then(function(cache) {

							// Put the fetched response in the cache
							cache.put(e.request, responseClone);
							console.log('[ServiceWorker] New Data Cached', e.request.url);

							// Return the response
							return response;
			
				        }); // end caches.open

					})
					.catch(function(err) {
					    console.log("extra: "+event.request + " err: "+err);
						return caches.match(event.request);
						
					});


			}) // end caches.match(e.request)
	); // end e.respondWith
})*/
self.addEventListener('fetch', event => {
  // Skip cross-origin requests, like those for Google Analytics.
  //if(event.request.url.method === ‘POST’){
      if(event.request.method==="POST" && (event.request.url==="https://jordytack.be/login"||"https://jordytack.be/logout"||"https://jordytack.be/register")){
          //return caches.delete(cacheName);
          caches.keys().then(function(names) {
            for (let name of names)
                caches.delete(name);
            });
      }
      else if ((event.request.url==="https://jordytack.be/market"||event.request.url==="https://jordytack.be/openpack")|| event.request.method==="PUT"){
          
      }
   else {
  if (event.request.url.startsWith(self.location.origin)) {
    event.respondWith(
      caches.match(event.request).then(cachedResponse => {
        if (cachedResponse) {
          return cachedResponse;
        }

        return caches.open(RUNTIME).then(cache => {
          return fetch(event.request).then(response => {
            // Put a copy of the response in the runtime cache.
            return cache.put(event.request, response.clone()).then(() => {
              return response;
            });
          });
        });
      })
    );
  }
  }
});