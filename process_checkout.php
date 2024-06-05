<?php
include "db_conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity'])) {
    // Retrieve form data
    $quantities = $_POST['quantity'];
    
    // Calculate total price and update inventory
    $totalPrice = 0;
    foreach ($quantities as $id => $quantity) {
        // Retrieve item details from the database
        $sql = "SELECT `id`, `Harga Jual`, `Stock` FROM `inventory` WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        // Validate quantity against available stock
        if ($quantity > $row['Stock']) {
            // If quantity exceeds stock, redirect back to checkout page with error message
            header("Location: checkout.php?error=1");
            exit();
        }
        
        // Calculate total price
        $itemPrice = $row['Harga Jual'] * $quantity;
        $totalPrice += $itemPrice;
        
        // Update inventory stock
        $updatedStock = $row['Stock'] - $quantity;
        $sql = "UPDATE `inventory` SET `Stock` = ? WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $updatedStock, $id);
        $stmt->execute();
    }
    
    // Process payment and order completion (assuming this part)
    
    // Redirect back to the checkout page with a success message and total price
    header("Location: checkout.php?success=1&total_price=" . $totalPrice);
    exit();
} else {
    // Redirect to the checkout page if the form is not submitted properly
    header("Location: checkout.php");
    exit();
}
?>