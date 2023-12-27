<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>crud opertaion</title>.
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>
<body>

<div class="container" enctype="multipart/form-data">
    <div class="btn btn-primary"><a href="user.php" style="color:white;text-decoration:off;">ADD USER</a>  </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">SrNo</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
    <?php

    include("connect.php");
    $sql = "select * from `crud`";

    $result = mysqli_query($con,$sql);

    while($row = mysqli_fetch_array($result))
    {
        $image = $row['image'] ;       
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $password = $row['password'];

        echo "
<tr>";

echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />';

echo "


    <td>$id</td>
    <td>$name</td>
    <td>$email</td>
    <td>$mobile</td>
    <td>$password</td>
    <td>
        <button class='btn btn-primary text-white'><a href='update.php?updateid=$id class='text-light'>Update</a></button>
        <button  class='btn btn-danger '><a href='delete.php?deleteid=$id class='text-light'>Delete</a></button>
    </td>
</tr>";

       
    }
    ?>


    
    <!-- <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>
</div>
    
</body>
</html>