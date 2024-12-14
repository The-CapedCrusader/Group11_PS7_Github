<?php
// Database connection
$servername = "localhost";
$username = "root";    
$password = "";        
$dbname = "grading, packaging, and transport management system"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch categories
$category_sql = "SELECT category, COUNT(*) AS count FROM products GROUP BY category";
$category_result = $conn->query($category_sql);

$categories_html = "";
if ($category_result && $category_result->num_rows > 0) {
    while ($category = $category_result->fetch_assoc()) {
        $categories_html .= "<div class='category'>" . htmlspecialchars($category['category']) . " (" . $category['count'] . ")</div>";
    }
} else {
    $categories_html = "<div class='category'>No categories found</div>";
}

// Fetch grading counts
$grading_counts = ['Completed' => 0, 'In Progress' => 0, 'Pending Grading' => 0];
$grading_sql = "SELECT grading_status, COUNT(*) AS count FROM products GROUP BY grading_status";
$grading_result = $conn->query($grading_sql);

if ($grading_result && $grading_result->num_rows > 0) {
    while ($grading = $grading_result->fetch_assoc()) {
        $grading_counts[$grading['grading_status']] = $grading['count'];
    }
}

// Fetch products
$product_sql = "SELECT product_id, product_name, grading_status, grading_date, transit_status FROM products";
$product_result = $conn->query($product_sql);

$products_html = "";
if ($product_result && $product_result->num_rows > 0) {
    while ($product = $product_result->fetch_assoc()) {
        $products_html .= "<tr>
                            <td>" . htmlspecialchars($product['product_name']) . "</td>
                            <td>" . htmlspecialchars($product['grading_status']) . "</td>
                            <td>" . htmlspecialchars($product['grading_date']) . "</td>
                            <td>" . htmlspecialchars($product['transit_status']) . "</td>
                           </tr>";
    }
} else {
    $products_html = "<tr><td colspan='4'>No products found</td></tr>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>My Products</title>
</head>

<body>
    <div class="top-container">
        <div class="nav">
            <div class="logo">
                <img src="asset/leaf-design.png" style="width: 40px; height: auto;">
                <a href="#">GreenRoots</a>
            </div>
            <div class="nav-links">
                <a href="index.html">Dashboard</a>
                <a href="my-products.php" class="active">My Products</a>
                <a href="resources.php">Resources</a>
                <a href="payment.html">Payment</a>
            </div>
            <div class="right-section">
                <i class='bx bx-bell'></i>
                <div class="profile">
                    <div class="info">
                    <img src="asset/profile.png">
                        <div>
                            <a href="#">Syed Wayes</a>
                            <p>Customer</p>
                        </div>
                    </div>
                    <i class='bx bx-chevron-down'></i>
                </div>
            </div>
        </div>

        <div class="products-container">
            <h1>My Products</h1>
            <p>Track the grading status and transportation details of your products below.</p>
           
            <div class="scrollable-table">
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Grading Status</th>
                            <th>Grade Date</th>
                            <th>Transit Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $products_html; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="bottom-container">
        <div class="products--dashboard">
            <!-- Product Categories -->
            <div class="categories">
                <h2>Product Categories</h2>
                <div class="category-list">
                    <?= $categories_html; ?>
                </div>
            </div>
        
            <!-- Grading Summary -->
            <div class="grading--summary">
                <h2>Grading Summary</h2>
                <div class="summary">
                    <div class="status">
                        <h3>Completed</h3>
                        <p><?= $grading_counts['Completed']; ?> products</p>
                    </div>
                    <div class="status">
                        <h3>In Progress</h3>
                        <p><?= $grading_counts['In Progress']; ?> products</p>
                    </div>
                    <div class="status">
                        <h3>Pending Grading</h3>
                        <p><?= $grading_counts['Pending Grading']; ?> products</p>
                    </div>
                </div>
            </div>
            <div class="logistics">
                <h2>Shipping and Logistics</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Status</th>
                            <th>Estimated Delivery</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Organic Apples</td>
                            <td>In Transit</td>
                            <td>2024-11-25</td>
                        </tr>
                        <tr>
                            <td>Fresh Carrots</td>
                            <td>Awaiting Shipment</td>
                            <td>N/A</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <!-- Notifications and Alerts -->
        <div class="notifications">
            <h2>Notifications and Alerts</h2>
            <div class="alert">
                <p><strong>Delay Alert:</strong> Shipping for "Fresh Carrots" delayed by 2 days.</p>
            </div>
            <div class="alert">
                <p><strong>Grading Complete:</strong> "Organic Apples" graded as "Grade A".</p>
            </div>
    
        </div>

        </div>
        
    
    </div>
    
        <style>
        
            .products--dashboard {
                padding: 2rem; 
                width: 100%; 
                height: 100%; 
                background-color: #f9f9f9; 
                border-radius: 10px; 
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
                display: flex;
                flex-direction: column; 
                justify-content: space-between; 
                
                /* From https://css.glass */
                background: rgba(255, 255, 255, 0.2);
                border-radius: 16px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(5px);
                -webkit-backdrop-filter: blur(5px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            .products--dashboard .categories,
            .products--dashboard .grading--summary,
            .products--dashboard .recent--activity,
            .products--dashboard .logistics,
            {
                margin-bottom: 2rem; 
            }
            
            /* Section Headers */
            .products--dashboard h2 {
                font-size: 1.5rem; 
                color: #3EAF76; 
                margin-bottom: 1rem; 
            }
            .scrollable-table {
                  max-height: 200px;  
                  overflow-y: auto;   
                  border: 1px solid #ddd;  
            }   

            /* Category List */
            .products--dashboard .categories .category-list {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            
            .products--dashboard .categories .category {
                padding: 0.5rem 1rem;
                background-color: #3EAF76;
                color: white;
                border-radius: 5px;
                font-size: 0.9rem;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            
            .products--dashboard .categories .category:hover {
                background-color: #2f8958;
            }
            
            /* Grading Summary */
            .products--dashboard .grading--summary .summary {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 1rem;
            }
            
            .products--dashboard .grading--summary .status {
                flex: 1 1 calc(33.333% - 1rem);
                background-color: white;
                padding: 1rem;
                border-radius: 8px;
                box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.08);
                text-align: center;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }
            
            .products--dashboard .grading--summary .status:hover {
                transform: translateY(-4px);
                box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            }
            
            .products--dashboard .grading--summary .status h3 {
                font-size: 1.25rem;
                color: #184212;
                margin-bottom: 0.5rem;
            }
            
            .products--dashboard .grading--summary .status p {
                font-size: 1rem;
                color: #666;
            }
            
            /* Recent Activity */
            .products--dashboard .recent--activity ul {
                list-style: none;
                padding: 0;
            }
            
            .products--dashboard .recent--activity ul li {
                background-color: white;
                padding: 0.75rem;
                margin-bottom: 0.5rem;
                border-radius: 5px;
                box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.08);
                font-size: 0.9rem;
                color: #333;
            }
            
            /* Shipping and Logistics */
            .products--dashboard .logistics table {
                width: 100%;
                border-collapse: collapse;
                font-size: 0.9rem;
                margin-top: 1rem;
            }
            
            .products--dashboard .logistics th, 
            .products--dashboard .logistics td {
                padding: 0.75rem;
                border: 1px solid #ddd;
            }
            
            .products--dashboard .logistics th {
                background-color: #3EAF76;
                color: white;
                text-align: left;
            }
            
            .products--dashboard .logistics tr:hover {
                background-color: #f5f5f5;
            }
            
            /* Notifications */
            .products--dashboard .notifications .alert {
                background-color: #fff3cd;
                padding: 1rem;
                border: 1px solid #ffeeba;
                border-radius: 5px;
                margin-bottom: 0.5rem;
                font-size: 0.9rem;
                color: #856404;
            }
               /* Notifications */
               .products--dashboard .notifications .alert {
                background-color: #fff3cd;
                padding: 1rem;
                border: 1px solid #ffeeba;
                border-radius: 5px;
                margin-bottom: 0.5rem;
                font-size: 0.9rem;
                color: #856404;
            }
            
            </style>
                
        
        
</div>


    
    <script src="script.js"></script>
</body>

</html>