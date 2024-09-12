<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['id'])) {
    header("Location: loginandregister.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
</head>

<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cartData = json_decode(file_get_contents('php://input'), true);

     // Print the raw cartData for debugging (as HTML)
     echo "<h2>Raw cartData (from JSON)</h2><pre>" . print_r($cartData, true) . "</pre>";

    if (!empty($cartData)) {
        // Initialize variables for order details and total price
        $orderDetails = [];
        $totalPrice = 0;

        // Loop through the cart and build the order details and calculate the total price
        foreach ($cartData as $product) {
            $productName = $product['product_name'];
            $quantity = $product['quantity'];
            $price = $product['price'];

            // Add optional details (size, sugar, milk) only if they exist
            $size = isset($product['size']) ? $product['size'] : '';
            $sugar = isset($product['sugar']) ? $product['sugar'] : '';
            $milk = isset($product['milk']) ? $product['milk'] : '';

            // Build product detail string
            if (!empty($size) || !empty($sugar) || !empty($milk)) {
                // If product has additional details (like coffee)
                $productDetails = "$quantity x $productName (Size: $size, Sugar: $sugar, Milk: $milk)";
            } else {
                // For simpler products (like pies/snacks)
                $productDetails = "$quantity x $productName";
            }

            // Add product details to the order details array
            $orderDetails[] = $productDetails;

            // Add the price to the total price
            $totalPrice += $price;
        }

        // Join all the product details into a single string
        $orderDetailsString = implode(', ', $orderDetails);

        // Get the current date and time for the order
        $orderDate = date('Y-m-d H:i:s');

        // Assuming `user_id` is stored in the session
        $userId = $_SESSION['id'];

        // Insert the order into the database
        $query = "INSERT INTO orders (user_id, order_details, order_date, total_amount, status)
                  VALUES ('$userId', '$orderDetailsString', '$orderDate', '$totalPrice', 'In Progress')";

        if (mysqli_query($conn, $query)) {
            echo "Order saved successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
</body>
</html>