<?php

include("connect.php");

$id = $_GET["updateid"];

$sql = "SELECT * FROM `crud` WHERE id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['submit'])) {
    $abc = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $password = $_POST['password'];

    // Check if the file was successfully uploaded
    $file = file_get_contents($_FILES["image"]["tmp_name"]);

    // Update query with prepared statement
    $query = "UPDATE `crud` SET image=?, name=?, email=?, mobile=?, password=? WHERE id=?";
    
    $stmt = mysqli_prepare($con, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssssi", $file, $name, $email, $mobile, $password, $abc);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("updation done in Database")</script>';
        header("location:display.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<body>
    <div class="container">
    
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="image" aria-describedby="emailHelp" autocomplete="off" value="<?php ?>">
    </div>
    

    <div class="mb-3">
        <label for="name" class="form-label">NAME</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="name" aria-describedby="emailHelp" autocomplete="off" value="<?php echo $row['name']; ?>">
    </div>  
    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email" aria-describedby="emailHelp" autocomplete="off" value="<?php echo $row['email']; ?>">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">PHONE</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact number" aria-describedby="emailHelp" autocomplete="off" value="<?php echo $row['mobile']; ?>">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input type="text" class="form-control" id="password" name="password" placeholder="password" aria-describedby="emailHelp" autocomplete="off" value="<?php echo $row['password']; ?>">
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Update</button>


        </form>
    </div>

    <!-- In the PHP POST method, data from HTML FORM is submitted/collected
     using a super global variable $_POST. This method sends the encoded
      information embedded in the body of the HTTP request and hence the 
      data is not visible in the page URL unlike the GET Method. -->


    </body>

    <script>  
 $(document).ready(function(){  
      $('form').submit(function(e){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                e.preventDefault(); // Prevent form submission if validation fails
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     e.preventDefault(); // Prevent form submission if validation fails
                }  
           }  
      });  
 });  
 </script>

</html>
