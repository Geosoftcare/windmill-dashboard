<?php
include_once('header-contents.php');
include_once('dbconnection-string.php');
if (isset($_GET['uryyToeSS4'])) {
    $uryyToeSS4 = $_GET['uryyToeSS4'];
}
?>

<body>
    <div>
        <input value="<?php print $uryyToeSS4; ?>" id="uryyToeSS4" hidden>
    </div>

    <div id="data-container">
        <div id="result"></div>
    </div>

    <script>
        $(document).ready(function() {
            let uryyToeSS4 = $('#uryyToeSS4').val(); // Get the hidden input value

            load_data();

            function load_data(query = '') {
                $.ajax({
                    url: "activities.php",
                    method: "post",
                    data: {
                        query: query,
                        uryyToeSS4: uryyToeSS4 // Pass the value to activities.php
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            }

            $('#search_text').keyup(function() {
                var search = $(this).val();
                load_data(search);
            });
        });
    </script>


</body>

</html>