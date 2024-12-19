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
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['review', 'complain'],
          <?php
          $sql = "SELECT review_complain, count(review_complain) as number FROM testimonial2 GROUP BY review_complain";
          $fire = mysqli_query($con, $sql);
           while($result= mysqli_fetch_assoc($fire)) {
            echo"['".$result['review_complain']."', ".$result['number']."],";
           }
          ?>
        ]);

        var options = {
          title: 'Review VS Complain'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	
	<style>
		
	h2 {
            background-color:rgb(111, 244, 149); /* Green background */
            color: black;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

	    /* Create a container for the chart with background and padding */
	.chart-container {
            background-color:rgb(187, 245, 168); /* White background for the chart container */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
    }
	#piechart {
		margin: 0 auto;
            width: 100%;
            height: 500px; /* Set a fixed height for the chart */
			
	}	
	</style>
</head>
<body>
	
	<h2>Testimonial Table</h2>
	
	<div class="chart-container">
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
	  <th scope="col">Review_Complain</th>
      
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
			$review_complain=$row['review_complain'];
			echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
	  <td>'.$testimonialtext.'</td>
	  <td>'.$review_complain.'</td>
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
	<div id="piechart" style="width: 900px; height: 500px;"></div>	
	</div>
	</div>
		
</body>
</html>