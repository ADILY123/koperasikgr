<?php
$sname= "localhost";
$unmae= "root";
$password = "";
$db_name = "koperasi";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

session_start();


if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: 404.html");
    exit();
}

if (isset($_FILES["image"])) {
  
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 

   
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); 
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        
        echo "File is not an image.";
        exit(); 
    }
} else {
    
    echo "No image uploaded.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nama = validate($_POST['Addname']);
    $HBe = validate($_POST['Hbeli']);
    $HJu = validate($_POST['Hjual']);
    $Stck = validate($_POST['Stock']);
    $Bdate = validate($_POST['Date']);
    $EXPdate = validate($_POST['EXP']);
}

if (empty($Nama) || empty($HBe) || empty($HJu) || empty($Stck) || empty($Bdate) || empty($EXPdate)) {
    header("Location: additem.php?error=Please fill all required fields.");
    exit();
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `inventory` (`id`, `Nama`, `Harga Beli`, `Harga Jual`, `Stock`, `Tanggal Pembelian`, `EXP Date`, `Image`) VALUES (NULL, '$Nama', '$HBe', '$HJu', '$Stck', '$Bdate', '$EXPdate', '$target_file')";

if ($conn->query($sql) === TRUE) {
    header("Location: additem.php?success=New record created successfully");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
