<?php
session_start();
include "db_conn.php";

// mengecek
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // mengpriper
    $sql = "DELETE FROM inventory WHERE id = ?";

    // mengpriper the statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {

            header("Location: inventory.php");
            exit();
        } else {

            echo "Item not found.";
        }

        $stmt->close();
    } else {

        echo "Error preparing statement.";
    }
} else {
    // No item ID provided
    echo "No item ID provided.";
}
?>
