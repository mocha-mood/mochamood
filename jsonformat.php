<?php
$host = 'localhost';
$username = 'mochamood';
$password = 'voipulla';
$database = 'cafe';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to format the product name to match the image file name
function formatProductName($productName) {
    $replacements = [
        ' ' => '_',
        'Black coffee' => 'black-coffee',
        'Cappuccino' => 'capuccino',
        'Espresso macchiato' => 'expresso-macchiato',
        'Espresso' => 'expresso',
        'Latte' => 'latte',
        'White coffee' => 'white-coffee',
        'Large chickenpies' => 'large-chieckinpies',
        'Large meatpies' => 'large-meatpies',
        'Medium chickenpies' => 'medium-chickenpies',
        'Medium meatpies' => 'medium-meatpies'
    ];

    return strtolower(strtr($productName, $replacements)) . '.webp';
}

// SQL query to select all data from the product table
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

$products = array();

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch all data from the result and store it in an array
    while ($row = $result->fetch_assoc()) {
        $row['image'] = formatProductName($row['product_name']);
        $products[] = $row;
    }
    // Convert the array to JSON
    $json_data = json_encode($products);
    // Output the JSON data
    echo $json_data;
} else {
    echo json_encode(array("message" => "No products found."));
}

// Close the connection
$conn->close();
?>
