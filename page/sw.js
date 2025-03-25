const cacheName = "offline-cache-v1";
const cacheUrls = [
  "./index",
  "./about-us",
  "./contact",
  "./cookiesandyou",
  "./dbconnections",
  "./features",
  "./get-in-touch",
  "./help-center",
  "./pricing",
  "./privacy-policy",
  "./terms-and-conditions",
  "./site-review-panel",
  "img/1.png",
  "img/2.png",
  "img/3.png",
  "img/4.png",
  "img/5.png",
  "img/doodle-video.png",
  "img/seofm-video.png",
  "img/GDPR-compliant.png",
  "img/cyber-essentialsplus.png"];

// Installing the Service Worker
self.addEventListener("install", async (event) => {
  try {
    const cache = await caches.open(cacheName);
    await cache.addAll(cacheUrls);
  } catch (error) {
    console.error("Service Worker installation failed:", error);
  }
});

// Fetching resources
self.addEventListener("fetch", (event) => {
  event.respondWith(
    (async () => {
      const cache = await caches.open(cacheName);

      try {
        const cachedResponse = await cache.match(event.request);
        if (cachedResponse) {
          console.log("cachedResponse: ", event.request.url);
          return cachedResponse;
        }

        const fetchResponse = await fetch(event.request);
        if (fetchResponse) {
          console.log("fetchResponse: ", event.request.url);
          await cache.put(event.request, fetchResponse.clone());
          return fetchResponse;
        }
      } catch (error) {
        console.log("Fetch failed: ", error);
        const cachedResponse = await cache.match("index.php");
        return cachedResponse;
      }
    })()
  );
});
