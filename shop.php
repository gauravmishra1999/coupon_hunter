<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedCouponType = isset($_GET['couponType']) ? $_GET['couponType'] : 'all';  

if ($selectedCouponType === 'all') {
    $sql = "SELECT * FROM coupons";
} else {
    $sql = "SELECT * FROM coupons WHERE coupon_type = '$selectedCouponType'";
}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Display Coupons</title>
</head>
<body style="background-color: #F4F472;">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Coupon Hunter</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about_us.php">About Us</a>
              </li>
             
            </ul>
          </div>
        
        </div>
      </nav>

<div class="container mt-5">
    <h1 class="mb-4">Coupon List</h1>

    <form method="GET">
        <div class="mb-3">
            <label for="couponType">Select Coupon Type:</label>
            <select id="couponType" name="couponType">
                <option value="all" <?= ($selectedCouponType === 'all') ? 'selected' : '' ?>>All</option>
                <option value="clothing" <?= ($selectedCouponType === 'clothing') ? 'selected' : '' ?>>Clothing</option>
                <option value="music" <?= ($selectedCouponType === 'music') ? 'selected' : '' ?>>Music</option>
                <option value="academics" <?= ($selectedCouponType === 'academics') ? 'selected' : '' ?>>Academics</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Coupon Code</th>
            <th scope="col">Coupon Type</th>
            <th scope="col">Coupon Image</th>
            <th scope="col">Buy</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <th scope="row"><?= $row["id"] ?></th>
                    <td><?= $row["coupon_code"] ?></td>
                    <td><?= $row["coupon_type"] ?></td>
                    <td>
                        <img src="<?= $row["coupon_img"] ?>" alt="Coupon Image" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>
                        <a href="coupon_details.php?id=<?= $row["id"] ?>" class="btn btn-success">Buy</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5'>No coupons available</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
$conn->close();
?>
