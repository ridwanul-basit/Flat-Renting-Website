<script type= "text/javascript" src="./jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on("click","#appointment",function(e){
       e.preventDefault();
       $('#exampleModal').modal('show')
    });
    $(document).on("click","#edit",function(e){
       e.preventDefault();
       $('#exampleModal1').modal('show')
    });
    $(document).on("click",".btn-danger",function(e){
    e.preventDefault();
    var id = $(this).data("delete");
    if(confirm("Do you really want to delete this record?")){
        window.open("profilequery.php?id="+id);

    }
})
}
);


</script>