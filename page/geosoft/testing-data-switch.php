<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sn</th>
                <th>Status</th>
                <th>Location</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('dbconnection-string.php');
            $i = 0;
            $query2 = "SELECT * FROM weekly_test WHERE cons_no = '1232' ORDER BY currentDate DESC";
            $results2 = $conn->query($query2);
            if ($results2) {
                $currentDate = false;
                while ($row2 = $results2->fetch_assoc()) {
                    $i++;
                    if ($row2['currentDate'] != $currentDate) {
            ?>
                        <tr>
                            <td colspan='4'><?php echo $row2['currentDate']; ?></td>
                        </tr>
                    <?php $currentDate = $row2['currentDate'];
                    }
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row2['col_name']; ?> - <?php echo $row2['currentDate']; ?></td>
                        <td><?php echo $row2['col_money']; ?></td>
                        <td><?php echo $row2['currentDate']; ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>



</body>

</html>