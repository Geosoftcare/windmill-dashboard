<footer class="footer">
    <div class="container footer--flex">
        <div class="footer-start">
            <p><?php echo date("Y"); ?> © Geosoft Care Dashboard</p>
        </div>
    </div>
</footer>
</div>
</div>


<script>
    async function registerServiceWorker() {
        if ("serviceWorker" in navigator) {
            try {
                const registration = await navigator.serviceWorker.register(
                    "sw.js"
                );
                console.log(
                    "Service Worker registered with scope:",
                    registration.scope
                );
            } catch (error) {
                console.error("Service Worker registration failed:", error);
            }
        }
    }

    registerServiceWorker();
</script>


<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
</body>

</html>