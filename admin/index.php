<?php
require_once('config/cd.php');
$query ="select * from user";
$query2 ="select * from flat";
$query4 ="select * from appointment";
$result = mysqli_query($con,$query);
$result2 = mysqli_query($con,$query2);
$result4 = mysqli_query($con,$query4);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Handlee&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="index.css">

</head>
<body >
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">User Info</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr >
                                <td>User Id</td>
                                <td>Use Name</td>
                                <td>User Number</td>
                                <td>User Address</td>
                                <td>Operation</td>
                            </tr>
                            <tr >
                            <?php
                                while($row= mysqli_fetch_assoc($result))
                                {
                                ?>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['phone_number']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td>
                
                                    <button class="btn btn-danger"><a href="delete.php?id3='<?php echo $row['user_id']; ?>'"  class="text-light">Delete</a></button>

                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Rented Flat Information</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr >
                                <td>Flat Id</td>
                                <td>Owner Id</td>
                                <td>Name</td>
                                <td>Area</td>
                                <td>Size</td>
                                <td>BHK</td>
                                <td>Owner Address</td>
                                <td>Price</td>
                                <td>Status</td>
                                <td>Operation</td>
                            </tr>
                            <tr >
                            <?php
                                while($row= mysqli_fetch_assoc($result2))
                                {
                                ?>
                                
                                <td><?php echo $row['flat_id']; ?></td>
                                <td><?php echo $row['owner_id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['area']; ?></td>
                                <td><?php echo $row['size']; ?></td>
                                <td><?php echo $row['BHK']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td>
                                    <button class="btn btn-primary"><a href="update.php?id2=<?php echo $row['flat_id']; ?>" class="text-light">Update</a></button>
                                    <button class="btn btn-danger"><a href="delete.php?id2=<?php echo $row['flat_id']; ?>" class="text-light">Delete</a></button>

                                </td>
                                
                            </tr>
                            <?php
                                }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Wish List</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr >
                                <td>Cart Id</td>
                                <td>Flat Id</td>
                                <td>Time</td>
                                <td>Date</td>
                                <td>Operation</td>
                                
                            </tr>
                            
                            <?php
                                $query3 ="select * from cart";
                                $result3 = mysqli_query($con,$query3);
                                while($row= mysqli_fetch_assoc($result3))
                                {
                                ?>
                                <tr >
                                <td><?php echo $row['cart_id']; ?></td>
                                <td><?php echo $row['flat_id']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td>
                                    
                                    <button class="btn btn-danger"><a href="delete.php?id=<?php echo $row['cart_id']; ?>" class="text-light">Delete</a></button>

                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Agent Info</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr >
                                <td>Agent Id</td>
                                <td>Agent Name</td>
                                <td>Agent Status</td>
                                <td>Agent Location</td>
                                <td>Assigned Appointment Id</td>
                                <td>Operation</td>
                                
                            </tr>
                            
                            <?php
                                $query5 ="select * from agent";
                                $result5 = mysqli_query($con,$query5);
                                while($row= mysqli_fetch_assoc($result5))
                                {
                                ?>
                                <tr >
                                <td><?php echo $row['agent_id']; ?></td>
                                <td><?php echo $row['agent_name']; ?></td>
                                <td><?php echo $row['agent_status']; ?></td>
                                <td><?php echo $row['agent_location']; ?></td>
                                <td><?php echo $row['assigned_appointment_id']; ?></td>
                                <td>
                                    <button class="btn btn-primary"><a href="update4.php?id3=<?php echo $row['agent_id']; ?>" class="text-light">Assign</a></button>
                                    <button class="btn btn-danger"><a href="delete.php?id5=<?php echo $row['agent_id']; ?>" class="text-light">Delete</a></button>

                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Appointment</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr >
                                <td>Appointment Id</td>
                                <td>User Id</td>
                                <td>Owner Id</td>
                                <td>Flat Id</td>
                                <td>Time</td>
                                <td>Date</td>
                                <td>Agent</td>
                                <td>Appointment Status</td>
                                <td>Operation</td>
                            </tr>
                            <tr >
                            <?php
                                while($row= mysqli_fetch_assoc($result4))
                                {
                                ?>
                                <td><?php echo $row['appointment_id']; ?></td>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['owner_id']; ?></td>
                                <td><?php echo $row['flat_id']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['agent_id']; ?></td>
                                <td><?php echo $row['appointment_status']; ?></td>
                                <td>
                                    
                                    <button class="btn btn-primary"><a href="update2.php?id3=<?php echo $row['user_id']; ?>" class="text-light">Assign</a></button>
                                    <button class="btn btn-primary"><a href="update3.php?id3=<?php echo $row['user_id']; ?>" class="text-light">Update</a></button>
                                    <button class="btn btn-danger"><a href="delete.php?id4='<?php echo $row['user_id']; ?>'"  class="text-light">Delete</a></button>

                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>