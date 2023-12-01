<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql = "select * from `crud` where id=$id";
$result (mysqli_query($con,$sql));
$row = mysqli_fetch_assoc($result);
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $mobile=$row['mobile'];

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
};

$sql = "update `crud` set id=$id,name='$name',email='$email',mobile=$mobile where id=$id";

$result = mysqli_query ($con,$sql);

if($result){
  echo 'data updated succsessfully';
 //header('location:display.php');
}else {
  die (mysqli_error($con));
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>my crud</title>
</head>

<body>
  <h1>Hello, world!</h1>

  <div class="container">
    <form method="post">

      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter your name"
        value= <?php echo "$name"?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter your email"
        value= <?php echo "$email"?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Mobile Number</label>
        <input type="number" class="form-control" name="mobile" placeholder="Enter your mobile number"
        value= <?php echo "$mobile"?>>
      </div>


      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>
</body>

</html>