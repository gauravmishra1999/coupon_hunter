<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $couponId = $_GET['id'];

    // Retrieve coupon details based on the ID
    $sql = "SELECT * FROM coupons WHERE id = $couponId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $couponCode = $row["coupon_code"];
        $couponType = $row["coupon_type"];
        $couponImage = $row["coupon_img"];
    } else {
        $couponCode = $couponType = $couponImage = "Coupon not found";
    }
} else {
    $couponCode = $couponType = $couponImage = "Invalid request";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Coupon Details</title>
</head>
<body style="background-color: #F4F472;">

<div class="container mt-5">
    <h1 class="mb-4">Coupon Details</h1>

    <div class="card" style="width: 18rem;">
        <img src="<?= $couponImage ?>" class="card-img-top" alt="Coupon Image">
        <div class="card-body">
            <h5 class="card-title">Coupon Code: <?= $couponCode ?></h5>
            <p class="card-text">Coupon Type: <?= $couponType ?></p>
            
            <a href="#" class="btn btn-primary">Buy Now</a>
        </div>
    </div>

</div>

</body>
</html>

<?php
$conn->close();
?>
