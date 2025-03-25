<?php
include_once('header-contents.php');
include_once('task-data.php');
?>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };

    setTimeout(function() {
        location.reload();
    }, 12000);
</script>