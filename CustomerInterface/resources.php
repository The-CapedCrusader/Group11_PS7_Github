<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grading, packaging, and transport management system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch resources
$sql = "SELECT product_name, quantity FROM resources";
$result = $conn->query($sql);

$resources_html = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $resources_html .= "
            <tr>
                <td>" . htmlspecialchars($row['product_name']) . "</td>
                <td>" . htmlspecialchars($row['quantity']) . "</td>
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
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            color: #333;
        }

        .top-container {
            height: 20vh;
            background: linear-gradient(135deg, #3EAF76, #8BC34A);
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            padding: 0 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 50px;
            height: auto;
            margin-right: 15px;
        }

        .logo a {
            font-size: 1.5rem;
            font-weight: 700;
            text-decoration: none;
            color: white;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-links a {
            margin: 0 15px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .resources-table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .resources-table th, .resources-table td {
            padding: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .resources-table th {
            background-color: #3EAF76;
            color: white;
            font-size: 1.2rem;
            text-transform: uppercase;
        }

        .resources-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .resources-table tr:hover {
            background-color: #eef6f3;
        }

        .back-button {
            display: block;
            margin: 20px auto;
            padding: 12px 25px;
            color: white;
            background-color: #3EAF76;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background-color: #2c945d;
            transform: translateY(-3px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .header {
            text-align: center;
            margin-top: 20px;
        }

        .header h1 {
            color: #3EAF76;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .profile .info {
            display: flex;
            align-items: center;
        }

        .profile .info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile .info a {
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
        }

        .profile .info a:hover {
            text-decoration: underline;
        }

        .profile p {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
    <title>Customer Resources</title>
</head>

<body>
    <div class="top-container">
        <div class="logo">
            <img src="asset/leaf-design.png" alt="Logo">
            <a href="#">GreenRoots</a>
        </div>
        <div class="nav-links">
            <a href="#">Dashboard</a>
            <a href="my-products.php">My Products</a>
            <a href="#">Reports</a>
            <a href="feedback.html">Feedbacks</a>
            <a href="support.html">Support</a>
        </div>
        <div class="profile">
            <div class="info">
                <img src="asset/profile.png" alt="Profile">
                <div>
                    <a href="#">Syed Wayes</a>
                    <p>Customer</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="header">
            <h1>Your Resources</h1>
        </div>
        <table class="resources-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $resources_html; ?>
            </tbody>
        </table>
        <a href="my-products.php" class="back-button">Back to My Products</a>
    </div>
</body>

</html>
