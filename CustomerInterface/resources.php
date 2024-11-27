
<?php
// Database connection
$servername = "localhost";
$username = "root";     // Default username for XAMPP
$password = "";         // Default password is empty for root in XAMPP
$dbname = "grading, packaging, and transport management system";  // Make sure this is your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch resources
$sql = "SELECT product_name, quantity FROM resources";
$result = $conn->query($sql);

$resources_html = "";
if ($result->num_rows > 0) {
    // Loop through the fetched data
    while ($row = $result->fetch_assoc()) {
        $resources_html .= "
            <tr>
                <td>" . $row['product_name'] . "</td>
                <td>" . $row['quantity'] . "</td>
            </tr>
        ";
    }
} else {
    $resources_html = "<tr><td colspan='2'>No resources found</td></tr>";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Resources</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 40px;
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
        }

        .header {
            background-color: #B2FBA5;
            color:#3EAF76;
            padding: 1rem 2rem;
            text-align: center;
        }


      

        .resources-list {
            list-style-type: none;
            padding: 0;
            margin-top: 30px;
        }

        .resources-list li {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1.1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .resources-list li:hover {
            background-color: #f1f1f1;
        }

        .resources-list li .resource-name {
            font-weight: bold;
            color: #3EAF76;
        }

        .back-button {
            background-color: #3EAF76;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #329a5b;
        }

    </style>
</head>
<body>

    
        <!-- Header Section with Image -->
        <div class="header">
            <h1>Resources</h1>
         
        </div>
        <div class="container">
        <!-- Title Section -->
        

        <!-- Resources List -->
        <ul class="resources-list">
            <li>
                <span class="resource-name">Apples</span>
                <span>Quantity: 150</span>
            </li>
            <li>
                <span class="resource-name">Grain</span>
                <span>Quantity: 200kg</span>
            </li>
            <li>
                <span class="resource-name">Rice</span>
                <span>Quantity: 100kg</span>
            </li>
            <li>
                <span class="resource-name">Bananas</span>
                <span>Quantity: 120</span>
            </li>
            <li>
                <span class="resource-name">Potatoes</span>
                <span>Quantity: 300kg</span>
            </li>
            <li>
                <span class="resource-name">Tomatoes</span>
                <span>Quantity: 250kg</span>
            </li>
            <li>
                <span class="resource-name">Carrots</span>
                <span>Quantity: 180kg</span>
            </li>
            <li>
                <span class="resource-name">Lettuce</span>
                <span>Quantity: 100 heads</span>
            </li>
            <li>
                <span class="resource-name">Onions</span>
                <span>Quantity: 150kg</span>
            </li>
            <li>
                <span class="resource-name">Oranges</span>
                <span>Quantity: 200</span>
            </li>
            <li>
                <span class="resource-name">Strawberries</span>
                <span>Quantity: 50kg</span>
            </li>
            <li>
                <span class="resource-name">Spinach</span>
                <span>Quantity: 80kg</span>
            </li>
            <li>
                <span class="resource-name">Eggplant</span>
                <span>Quantity: 120kg</span>
            </li>
            <li>
                <span class="resource-name">Cabbage</span>
                <span>Quantity: 90kg</span>
            </li>
            <li>
                <span class="resource-name">Mangoes</span>
                <span>Quantity: 150</span>
            </li>
        </ul>

        <a href="my-products.html" class="back-button">Back to My Products</a>
    </div>

</body>
</html>
