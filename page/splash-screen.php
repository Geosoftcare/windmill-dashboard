<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web App with Splash Screen</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }

    #splash-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #282c34;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        transition: opacity 0.5s ease;
    }

    #main-content {
        padding: 20px;
    }
</style>

<body>
    <div id="splash-screen">
        <h1>Welcome to My Web App</h1>
        <p>Loading...</p>
    </div>
    <div id="main-content" style="display: none;">
        <h2>Main Content Here</h2>
        <p>This is the main content of the web app.</p>
    </div>

    <script src="script.js">
        window.addEventListener('load', function() {
            // Delay for 2 seconds (2000 milliseconds)
            setTimeout(function() {
                const splashScreen = document.getElementById('splash-screen');
                const mainContent = document.getElementById('main-content');

                // Fade out the splash screen
                splashScreen.style.opacity = '0';

                // After fade out, hide the splash screen and show main content
                setTimeout(function() {
                    splashScreen.style.display = 'none';
                    mainContent.style.display = 'block';
                }, 500); // Match this duration with CSS transition time
            }, 2000); // Adjust the duration as needed
        });
    </script>
</body>

</html>