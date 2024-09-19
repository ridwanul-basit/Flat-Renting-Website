
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type= "text/javascript" src="./jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
<?php
    if(isset($_SESSION['message'])){
?>
<script>
    var msg = "<?= $_SESSION['message'] ?? ''; ?> ";
    if(msg != ''){
Swal.fire({
  title: "Thank You",
  text: msg,
  icon: "success"
});
}
</script>
<?php 
    unset($_SESSION['message']);
}
if(isset($_SESSION['error'])){

?>
<script>
    var msg = "<?= $_SESSION['error'] ?? ''; ?> ";
    if(msg != ''){
Swal.fire({
  title: "Oops...Sorry",
  text: msg,
  icon: "error"
});
}
</script>
<?php 
    unset($_SESSION['error']);
}
if(isset($_SESSION['user_delete'])){
?>
<script>
    var msg = "<?= $_SESSION['user_delete'] ?? ''; ?> ";
    if(msg != ''){
        Swal.fire({
  position: "top-center",
  icon: "success",
  title: "User Deleted",
  showConfirmButton: false,
  timer: 2000
});
}
</script>
<?php 
    unset($_SESSION['user_delete']);
}
?>
</body>
</html>