<?php
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['order_id']) && isset($_POST['update_status'])) {
        $orderId = $_POST['order_id'];
        $newStatus = $_POST['update_status'];

        $query = "UPDATE orders SET status = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $newStatus, $orderId);

        if ($stmt->execute()) {
            header("Location: barista.php");
            exit;
        } else {
            echo "Error updating order status.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>