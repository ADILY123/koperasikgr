<?php
include('db_conn.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    

    $query = "SELECT * FROM inventory WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
   
        echo "Product not found";
        exit();
    }
} else {
 
    echo "Product ID not provided";
    exit();
}
$Nama = $product['Nama'];
$Hbe = $product['Harga Beli'];
$HJu = $product['Harga Jual'];
$keuntungan = $HJu - $Hbe;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Product Details</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Roboto', sans-serif;
    }
    .container {
        margin-top: 50px;
    }
    .card {
        width: 400px;
        margin: 0 auto;
    }
    .card-header {
        background-color: #007bff;
        color: #fff;
    }
</style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Product Details</h5>
        </div>
        <div class="card-body">
        <?php

echo "<a href='../inventory.php'>Back To Inventory</a>";
?>
            <?php if (isset($product)): ?>
                <p><strong>Image:</strong><?php echo  $product['Image']; ?></p>
                <p><strong>Name:</strong> <?php echo $product['Nama']; ?></p>
                <p><strong>Selling Price:</strong> <?php echo $product['Harga Jual']; ?></p>
                <p><strong>Buying Price:</strong> <?php echo $product['Harga Beli']; ?></p>
                <p><Strong>Profit:</Strong> <?php echo $keuntungan; ?></p>
                <p><strong>Stock:</strong> <?php echo $product['Stock']; ?></p>
                <p><strong>Buy Date:</strong> <?php echo $product['Tanggal Pembelian']; ?></p>
                <p><strong>Exp Date:</strong> <?php echo $product['EXP Date']; ?></p>
                
                
               
            <?php else: ?>
                <p>Product details not available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
