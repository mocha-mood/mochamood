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

// SQL query to select all data from the product table
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

$products = array();

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch all data from the result and store it in an array
    while($row = $result->fetch_assoc()) {
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
