<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $Nama = $_POST['Nama'];
    $Hbeli = $_POST['Hbeli'];
    $Hjual = $_POST['Hjual'];
    $Stock = $_POST['Stock'];
    $Date = $_POST['Date'];
    $EXP = $_POST['EXP'];

    // Check if a new image is uploaded
    if (isset($_FILES["Image"]) && $_FILES["Image"]["error"] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["Image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the uploaded file is an image
        $check = getimagesize($_FILES["Image"]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to the target directory
            move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);
            $Image = $target_file; // Set the image variable to the new image path
        } else {
            echo "File is not an image.";
            exit();
        }
    } else {
        // No new image uploaded, retain the current image value
        $stmt = $conn->prepare("SELECT Image FROM inventory WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($currentImage);
            $stmt->fetch();
            $Image = $currentImage; // Set the image variable to the current image path
        } else {
            echo "Item with ID $id not found.";
            exit();
        }
    }

    // Update the item details in the database
    $sql = "UPDATE inventory SET Nama=?, `Harga Beli`=?, `Harga Jual`=?, Stock=?, `Tanggal Pembelian`=?, `EXP Date`=?, Image=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssssssi", $Nama, $Hbeli, $Hjual, $Stock, $Date, $EXP, $Image, $id);

        if ($stmt->execute()) {
            header("Location: inventory.php");
            exit();
        } else {
            echo "Error updating item: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    header("Location: inventory.php");
    exit();
}
?>
