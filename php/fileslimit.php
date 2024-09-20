<script type= "text/javascript" src="./jquery.js"></script>
<script type="text/javascript">
$("#image").on("change", function() {
    if ($("#image")[0].files.length > 4) {
        alert("You can select only 2 images");
    }
});

</script>