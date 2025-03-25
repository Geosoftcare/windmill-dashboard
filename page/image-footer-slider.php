<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<style>
    .imgBox {
        width: 100%;
        height: 130px;
        overflow: hidden;
        margin: 20px auto;
    }

    .imgContainer {
        position: relative;
        background-color: #000;
        width: 90%;
    }

    .imgBlock {
        opacity: 0.8;
        background-repeat: no-repeat;
        background-position: center;
        background-background-size: cover;
        width: 300px;
        height: 130px;
        float: left;
        transition: opacity 200ms;
    }

    .imgBlock:hover {
        opacity: 0.2;
    }

    .imgBlock:hover span {
        opacity: 1;
    }

    .imgBlock span {
        opacity: 0;
    }

    .imgBlock:nth-child(1) {
        background-image: url(./img/1.png);
    }

    .imgBlock:nth-child(2) {
        background-image: url(./img/2.png);
    }

    .imgBlock:nth-child(3) {
        background-image: url(./img/3.png);
    }

    .imgBlock:nth-child(4) {
        background-image: url(./img/4.png);
    }

    .imgBlock:nth-child(5) {
        background-image: url(./img/5.png);
    }

    a {
        text-decoration: none;
    }

    .JW {
        color: #c1c1c1;
        transition: color 100ms;
    }

    .JW:hover {
        color: #fff;
    }

    h1,
    h3 {
        font-family: Montserrat;
        margin: 0;
    }

    h1 {
        font-size: 5.5em;
        line-height: 1em;
    }

    h3 {
        margin-top: 2em;
        font-size: 1.4em;
    }

    .fine {
        font-size: 0.5em;
    }

    .bannerContainer {
        color: #7a7a7a;
        margin: 5% auto;
        width: 730px;
        text-align: center;
    }
</style>

<body>

    <div class="imgBox">
        <div class="imgContainer">
            <div class="imgBlock"><span></span></div>
            <div class="imgBlock"><span></span></div>
            <div class="imgBlock"><span></span></div>
            <div class="imgBlock"><span></span></div>
            <div class="imgBlock"><span></span></div>
            <div class="imgBlock"><span></span></div>
            <div class="imgBlock"><span></span></div>
        </div>
    </div>


    <script>
        var imgBoxWidth;
        var imgMaxMove;
        var boxCount = $(".imgContainer div").length;

        var scrollWidth = $(".imgBlock").width() * boxCount;

        $(".imgContainer").css("width", scrollWidth + "px")

        /* Remaps the values.*/

        Number.prototype.map = function(in_min, in_max, out_min, out_max) {
            return (this - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
        }


        $(".imgBox").hover(function() {
            imgBoxWidth = $(".imgBox").width();
            /*$( "span" ).text( "imgBoxWidth = " + imgBoxWidth ) /* TESTING */
            if (imgBoxWidth < scrollWidth) {
                imgMaxMove = scrollWidth - imgBoxWidth
            }

            $(".imgBlock span").css()
            // $( "span" ).append( " imgMaxMove = " + imgMaxMove ) /* TESTING */

            // $( "span" ).append( " scrollWidth = " + scrollWidth ) /* TESTING */
        })


        $(".imgBox").mousemove(function(event) {
            var pageCoords = "( " + event.pageX + " )";
            var clientCoords = "( " + event.clientX + " )";

            $(".imgContainer").css("left", -event.pageX.map(0, imgBoxWidth, 0, imgMaxMove) + "px");
        })
    </script>
</body>

</html>