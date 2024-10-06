<?php
include "db_conn.php";
$id =$_GET['id'];
if (isset($_POST['submit'])) {
    # code...
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender =$_POST['gender'];

    $sql= "UPDATE `crud` SET `first_name`=' $first_name ',`last_name`=' $last_name ',`email`='$email ',`gender`=' $gender ' WHERE id=$id";

    $result= mysqli_query($conn,$sql);

    if ($result) {
        # code...
        header("location: index.php?msg=Data updated successfully");
    }else{
        echo "failed: ".mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- font awesome cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>

</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:#00ff5573">
        PHP CRUD Application
    </nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>
    </div>
    
    <?php
    
    $sql = "SELECT * FROM crud WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
          <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">First Name :</label>
                    <input type="text" class="form-control" name="first_name" placeholder="first name" 
                    value="<?php echo $row['first_name']?>">
                </div>
                
                 <div class="col">
                    <label class="form-label">Last Name :</label>
                    <input type="text" class="form-control" name="last_name" placeholder="last name" 
                     value="<?php echo $row['last_name']?>">
                </div>
            </div>
             <div class="mb-3">
                    <label class="form-label">Email :</label>
                    <input type="email" class="form-control" name="email" placeholder="abc@gmail.com"
                     value="<?php echo $row['email']?>">
            </div>
            <div class="form-group mb-3">
                <label>Gender :</label>&nbsp;
                <input type="radio" class="form-check-input" name="gender" id="male" value="male"
                 <?php echo ($row['gender']=='male')?"checked":"";?>>
                <label for="male" class="form-input-label">Male</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="gender" id="female" value="female"
                <?php echo ($row['gender']=='female')?"checked":"";?>>
                <label for="female" class="form-input-label">Female</label>
            </div> 
            
            <div>
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
          </form>
    </div>


    <!-- bootstrap5 bundle js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>