<?php
include 'tanziuserconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8mb4">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>tanziuserdisplaypackage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['students', 'contribution'],
          <?php
          $sql = "SELECT grade, count(grade) as number FROM package GROUP BY grade";
          $fire = mysqli_query($con, $sql);
           while($result= mysqli_fetch_assoc($fire)) {
            echo"['".$result['grade']."', ".$result['number']."],";
           }
          ?>
        ]);

        var options = {
          title: 'Grade VS Package'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	<style>
		
	h1 {
            background-color:rgb(111, 244, 149); /* Green background */
            color: black;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
	
	
        /* Create a container for the chart with background and padding */
    .chart-container {
            background-color:rgb(191, 227, 240); /* White background for the chart container */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
    }

        /* Ensure the chart is responsive */
    #piechart {
		margin: 0 auto;
            width: 100%;
            height: 500px; /* Set a fixed height for the chart */
			
	}		
    </style>
</head>
<body>


	<h1> Package Table</h1>
	<div class="chart-container">
	<div class="container">
		<button class="btn btn-primary my-5"><a href="tanziuserpackage.php"
		class="text-light">Add</a>
		
		</button>
		<table class="table">
  <thead>
    <tr>
	<th scope="col">Sl_no</th>
      <th scope="col">PackageID</th>
      <th scope="col">Type</th>
	  <th scope="col">Date</th>
	  <th scope="col">Status</th>
	  <th scope="col">Grade</th>
	  <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
	<?php
	$sql= "Select * from `package`";
	$result = mysqli_query($con, $sql);
	if ($result){
		while($row= mysqli_fetch_assoc($result)){
			
			$id=$row['id'];
			$packageid=$row['packageid'];
			$type=$row['type'];
			$date=$row['date'];
			$status=$row['status'];
			$grade=$row['grade'];
			$action=$row['action'];

			echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$packageid.'</td>
	  <td>'.$type.'</td>
	  <td>'.$date.'</td>
	  <td>'.$status.'</td>
	  <td>'.$grade.'</td>
	  <td>'.$action.'</td>
	  <td> 
	<button class="btn btn-primary" ><a class="text-light" href="tanziuserupdatepackage.php? updateid='.$id.'">Update</a></button>
	<button class= "btn btn-danger"><a class="text-light" href="tanziuserdeletepackage.php? deleteid='.$id.'">Delete</a></button>
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
	  $packageid=$_POST['packageid'];
	$type=$_POST['type'];
	$date=$_POST['date'];
	$status=$_POST['status'];
	$grade=$_POST['grade'];
	$action=$_POST['action'];
    </tr>
    
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>-->
  </tbody>
</table>
		
		 
	</div>

	 
	<div id="piechart" style="width: 900px; height: 500px;"></div>	
	</div>
	</div>
</body>
</html>