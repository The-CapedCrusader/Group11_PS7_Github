<?php
require 'dompdf/vendor/autoload.php';

use Dompdf\Dompdf;

// Database connection
$conn = new mysqli('localhost', 'root', '', 'greenRoots'); // Replace 'your_database' with your actual database name

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the Products table
$result = $conn->query("SELECT * FROM Products");

// Start HTML output for the PDF
$html = '
<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #3EAF76;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Product Report</h1>
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
        <tbody>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= "
            <tr>
                <td>{$row['ID']}</td>
                <td>{$row['ProductName']}</td>
                <td>{$row['Status']}</td>
                <td>{$row['ShippingStatus']}</td>
                <td>{$row['DeliveryDate']}</td>
                <td>{$row['Category']}</td>
            </tr>";
    }
} else {
    $html .= '<tr><td colspan="6">No products found</td></tr>';
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

// Close the database connection
$conn->close();

// Initialize DOMPDF and load HTML
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML to PDF
$dompdf->render();

// Output the PDF for download
$dompdf->stream('Product_Report.pdf', ['Attachment' => true]); // 'Attachment' => true forces download
?>