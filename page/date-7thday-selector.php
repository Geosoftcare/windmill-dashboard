<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var date = new Date();
            date.setDate(date.getDate() + 7);

            console.log(date);
        });
    </script>
</head>
<style>
    body {
        font-size: 33px;
    }
</style>

<body>

    <input type="date" name="txtCurDate" id="selectDate" />
    <input value="" type="text" name="elem" id="elem" />

    <?php

    $date = '2024-05-02';
    $newDate = date("Y-m-d", strtotime($date . "+7 day"));
    echo $newDate; // print 23.12.2015


    ?>



</body>

</html>