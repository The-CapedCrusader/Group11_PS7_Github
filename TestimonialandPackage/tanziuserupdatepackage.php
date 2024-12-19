<?php
include 'tanziuserconnect.php';
$id=$_GET['updateid'];
$sql= "select * from `package` where id=$id";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$packageid=$row['packageid'];
$type=$row['type'];
$date=$row['date'];
$status=$row['status'];
$grade=$row['grade'];
$action=$row['action'];

if(isset($_POST['submit'])){
	$packageid=$_POST['packageid'];
	$type=$_POST['type'];
	$date=$_POST['date'];
	$status=$_POST['status'];
	$grade=$_POST['grade'];
	$action=$_POST['action'];

	$sql= "update `package` set id=$id, packageid ='$packageid', 
	type='$type', date='$date', status='$status', grade='$grade', 
	action='$action' where id=$id";
	$result=mysqli_query($con, $sql);
	if($result){
		//echo "data inserted successfull";
		header('location:tanziuserdisplaypackage.php');

	}else{
		die(mysqli_error($con));
	}
}
?>

<!doctype html>
<html lang="en">
<head>
	<!--booRequired meta tags -->
	<meta charset="utf8mb4">

	<meta name="viewpoint" content ="witdth=device-width,
	initial-scale=1, shrink-to-fit=no">

	<!--Bootstrap CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	
	<title>tanziuserpackageupdate</title>
	<style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
    }

    .form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 2rem;
    }

    .form-section {
      background-color: #ffffff;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
    }
	.form-section h2 {
      font-size: 1.5rem;
      margin-bottom: 1.5rem;
      text-align: center;
      color: #333;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
      color: #555;
    }
	.form-control {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 1rem;
    }

    .form-control:focus {
      border-color: #007bff;
      outline: none;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
    }

    .form-submit {
      display: flex;
      justify-content: center;
      margin-top: 1.5rem;
    }
	.btn {
      padding: 0.75rem 1.5rem;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #0056b3;
    }
	</style>
</head>
<body> 
<div class="form-container">
<div class="form-section">
	<h2>Package Update</h2>
	<div class="container">
	<form method="post">
  		<div class="form-group">
    		<label>PackageID</label>
    		<input type="text" class="form-control" 
			placeholder="enter your packageid" name="packageid" value=<?php 
			echo $packageid; ?>>
    	</div>

  		<div class="form-group">
    		<label>Type</label>
    		<input type="text" class="form-control" 
			placeholder="enter the type" name="type" value=<?php 
			echo $type; ?>>
        </div>
		<div class="form-group">
    		<label>Date</label>
    		<input type="date" class="form-control" 
			placeholder="enter date" name="date" value=<?php 
			echo $date; ?>>
        </div>
		<div class="form-group">
    		<label>Status</label>
    		<input type="text" class="form-control" 
			placeholder="enter status" name="status" value=<?php 
			echo $status; ?>>
        </div>
		<div class="form-group">
    		<label>Grade</label>
    		<input type="text" class="form-control" 
			placeholder="enter grade" name="grade" value=<?php 
			echo $grade; ?>>
        </div>
		<div class="form-group">
    		<label>Action</label>
    		<input type="text" class="form-control" 
			placeholder="enter action" name="action" value=<?php 
			echo $action; ?>>
        </div>

  	<button type="submit" class="btn btn-primary" name="submit">Update</button>
	</form>
	</div>
	</div>
	</div>
</body> 
</html>