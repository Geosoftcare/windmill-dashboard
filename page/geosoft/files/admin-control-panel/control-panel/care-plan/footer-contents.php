<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".dropdown-section").forEach(dropdown => {
            const selectAll = dropdown.querySelector(".select-all");
            const checkboxes = dropdown.querySelectorAll(".tech-option");
            const selectedText = dropdown.querySelector(".selected-text");
            const selectedItems = dropdown.querySelector(".selected-items");

            function updateSelected() {
                const selectedValues = Array.from(checkboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);
                selectedItems.innerHTML = selectedValues.map(value => `<span class="badge">${value}</span>`).join("");
            }
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener("change", updateSelected);
            });
            selectAll.addEventListener("change", function() {
                checkboxes.forEach(checkbox => checkbox.checked = selectAll.checked);
                updateSelected();
            });
        });
    });


    function getFile() {
        document.getElementById("upfile").click();
    }

    function sub(obj) {
        var file = obj.value;
        var fileName = file.split("\\");
        document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
        document.myForm.submit();
        event.preventDefault();
    }


    $("#files").change(function() {
        filename = this.files[0].name;
        console.log(filename);
    });
</script>
<script src="//code.tidio.co/zypfthde44m6lunlki6ohfmh3darewkf.js" async></script>
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/plugins/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard-main.js"></script>
</body>
<script>
    $(document).ready(function() {
        display_events();
    });
</script>

</html>