<?php
if (isset($_GET['success']) && $_GET['success'] == 1 && isset($_GET['total_price'])) {
    $totalPrice = $_GET['total_price'];
    echo "<div class='alert alert-success' role='alert'>Checkout successful! Total Price: $totalPrice</div>";
}
?>
<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) 

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Transaksi | Koperasi</title>
        <link href="css/styles0.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="Home2.php">Koperasi</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="home2.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Inventory
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="inventory.php">See Inventory</a>
                                    <a class="nav-link" href="additem.php">Add Items</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="logout.php">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['user_name']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

                    <div class="table-responsive">

<div class="container">
        <h1 class="asdf">Transaksi</h1>
        <?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        $totalPrice = isset($_GET['total_price']) ? $_GET['total_price'] : 'Unknown';
        echo "<p class='success'>Your order was successful! Total price: $totalPrice></p>";
    }
    ?>
<?php
include "db_conn.php";

$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='container'>";
    echo "<h1 class='item-name'>Point of Sale (POS)</h1>";
    echo "<input type='text' id='searchInput' class='form-control' placeholder='Search for items...'><br>";
    echo "<form id='checkout  zForm' action='process_checkout.php' method='post'>";
    echo "<div class='grid-container'></br>";
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nama = $row['Nama'];
        $harga_jual = $row['Harga Jual'];
        $stock = $row['Stock'];
        $image = $row['Image'];

        $imagePath = "uploads/$image";
        if (!file_exists($imagePath) || empty($image)) {
            $imagePath = "uploads/"; // Default image
        }

        echo "<div class='grid-item'>";
        echo "<img src='$image' alt='$nama' class='item-image'>";
        echo "<h5 class='item-name'>$nama</h5>";
        echo "<p class='item-price'>Rp $harga_jual</p>";
        echo "<p class='item-stock'>Stock: $stock</p>";
        echo "<input type='number' class='form-control quantity' name='quantity[$id]' min='0' max='$stock' value='0' data-id='$id' data-name='$nama' data-price='$harga_jual'>";
        echo "<p>Total Price: Rp <span class='item-total'>0</span></p>";
        echo "</div>";
    }
    echo "</div>";
    echo "<h3>Total Price: Rp <span id='grandTotal'>0</span></h3>";
    echo "<button type='submit' class='btn btn-primary'>Checkout</button>";
    echo "</form>";

    // Receipt Table
    echo "<h2>Receipt</h2>";
    echo "<table class='table table-bordered' id='receiptTable'>";
    echo "<thead><tr><th>Item</th><th>Quantity</th><th>Total Price</th></tr></thead>";
    echo "<tbody></tbody>";
    echo "</table>";

    echo "</div>";
} else {
    echo "<p class='text-muted'>No items available.</p>";
}
?>

<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
.container {
    margin-top: 20px;
}

.grid-container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.grid-item {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    width: calc(25% - 20px);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.item-image {
    max-width: 50%;
    height: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.item-name {
    font-size: 18px;
    margin: 10px 0;
    color: black;
}

.item-price, .item-stock {
    font-size: 16px;
    color: #555;
}

.quantity {
    width: 100%;
    margin-top: 10px;
}

.item-total {
    font-size: 16px;
    font-weight: bold;
    margin-top: 5px;
}
</style>

<script>
$(document).ready(function() {
    function updateTotalPrice() {
        let grandTotal = 0;
        $('#checkoutForm .quantity').each(function() {
            const quantity = parseInt($(this).val());
            const price = parseFloat($(this).data('price'));
            const total = quantity * price;
            $(this).closest('.grid-item').find('.item-total').text(total.toFixed(2));
            grandTotal += total;
        });
        $('#grandTotal').text(grandTotal.toFixed(2));
    }
    function updateReceipt() {
    const receiptTableBody = $('#receiptTable tbody');
    receiptTableBody.empty();

    $('#checkoutForm .quantity').each(function() {
        const quantity = parseInt($(this).val());
        if (quantity > 0) {
            const itemName = $(this).data('name');
            const total = parseFloat($(this).closest('.grid-item').find('.item-total').text());
            const newRow = <tr><td>${itemName}</td><td>${quantity}</td><td>Rp ${total.toFixed(2)}</td></tr>;
            receiptTableBody.append(newRow);
        }
    });
}

    $('.quantity').on('input', function() {
        updateTotalPrice();
        updateReceipt();
    });

    updateTotalPrice();
    updateReceipt();

    // Search functionality
    $('#searchInput').on('keyup', function() {
        const value = $(this).val().toLowerCase();
        $('.grid-item').filter(function() {
            $(this).toggle($(this).find('.item-name').text().toLowerCase().indexOf(value) > -1);
        });
    });
});
</script>



</div>


 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('input[name="quantity[]"]').on('input', function() {
                var price = parseFloat($(this).closest('tr').find('td:nth-child(3)').text());
                var quantity = parseFloat($(this).val());
                var total = price * quantity;
                $(this).closest('tr').find('.total').text(total.toFixed(2));
            });
        });
    </script>



                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

       
