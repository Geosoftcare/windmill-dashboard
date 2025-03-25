<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Highlight Today's Date</title>
    <style>
        .highlight {
            background-color: green;
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 10px;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
        </tr>
    </table>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let today = new Date().getDate(); // Get today's date (1-31)
            let cells = document.querySelectorAll("td");

            cells.forEach(cell => {
                if (parseInt(cell.innerText) === today) {
                    cell.classList.add("highlight");
                }
            });
        });
    </script>

</body>

</html>