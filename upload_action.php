<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $couponCode = $_POST["couponCode"];
    $couponType = $_POST["couponType"];

    $targetDir = "uploads/";
    $fileName = basename($_FILES["couponImage"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["couponImage"]["tmp_name"], $targetFilePath)) {
        
        $sql = "INSERT INTO coupons (coupon_code, coupon_type, coupon_img) VALUES ('$couponCode', '$couponType', '$targetFilePath')";

        if ($conn->query($sql) === TRUE) {
            echo "<body style='background-color: #F4F472;'><center><br><br><h1>Details submitted.</h1><br><br><button class='btn btn-dark btn-lg' style='padding:30px;border-radius:100px;' onclick=document.location.href='index.php'>HOME PAGE</button></center></body>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading the coupon image";
    }
}

$conn->close();
?>
</html>
