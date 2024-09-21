<?php
include 'config/cd.php';


    if(isset($_GET['id3'])){
        $id=$_GET['id3'];
        $query= "SELECT * from agent where agent_id ='$id'";
        $result4=mysqli_query($con,$query);
        if($result4){
            
         $row = mysqli_fetch_assoc($result4);

        }else{
            echo("not deleted");
            // die(mysqli_error());
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Value</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Handlee&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   
</head>
<body>
    <form action="update4.php?new_id=<?php echo $id?>" method="post">
      <div class="form-group">
       <label for="assigned_appointment_id">Assigned Appointment Id</label>
       <input type="text" name="statu" class="form-control" value="<?php echo $row['assigned_appointment_id']; ?>">
       <input type="submit" class="btn btn-success" name="update_status" value="Assign">
      </div>
</form>
    
</body>
</html>

<?php
 if(isset($_POST['update_status'])){
    if(isset($_GET['new_id'])){
        $n_id= $_GET['new_id'];
    }
    $st=$_POST['statu'];
    $query="UPDATE agent SET assigned_appointment_id='$st' where agent_id='$n_id'";
    $result5= mysqli_query($con,$query);
        if($result5){ 

            header('location: index.php');
        }else{
            echo("not deleted");
            // die(mysqli_error());
        }
 }