<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'greenRoots'); // Replace 'your_database' with your database name

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the Products table
$result = $conn->query("SELECT * FROM Products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table th {
            background-color: #3EAF76;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #B2FBA5;
        }
    </style>
</head>
<body>
    <h1>Product Table</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Status</th>
                <th>Shipping Status</th>
                <th>Delivery Date</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['ID']}</td>
                            <td>{$row['ProductName']}</td>
                            <td>{$row['Status']}</td>
                            <td>{$row['ShippingStatus']}</td>
                            <td>{$row['DeliveryDate']}</td>
                            <td>{$row['Category']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="generate_pdf.php" id="download-report">Download Reports</a>
</body>
</html>

<?php
$conn->close();
?>