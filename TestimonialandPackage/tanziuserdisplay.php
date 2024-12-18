<?php
include 'tanziuserconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8mb4">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>tanziuserdisplay</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	
	
</head>
<body>
	
	<h2>Testimonial Table</h2>
	

	<div class="container">
		<button class="btn btn-primary my-5"><a href="tanziuser.php"
		class="text-light">Add</a>
		
		</button>
		<table class="table">
  <thead>
    <tr>
	<th scope="col">Sl_no</th>
      <th scope="col">Name</th>
      <th scope="col">Testimonial</th>
      
    </tr>
  </thead>
  <tbody>
	<?php
	$sql= "Select * from `testimonial2`";
	$result = mysqli_query($con, $sql);
	if ($result){
		while($row= mysqli_fetch_assoc($result)){
			
			$id=$row['id'];
			$name=$row['name'];
			$testimonialtext=$row['testimonialtext'];
			echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
	  <td>'.$testimonialtext.'</td>
	  <td> 
	<button class="btn btn-primary" ><a class="text-light" href="tanziuserupdate.php? updateid='.$id.'">Update</a></button>
	<button class= "btn btn-danger"><a class="text-light" href="tanziuserdelete.php? deleteid='.$id.'">Delete</a></button>
	</td>
    </tr>';
		}
	}

	?>
	
    <!--<tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>-->
  </tbody>
</table>
		
		 
	</div>

		
</body>
</html>