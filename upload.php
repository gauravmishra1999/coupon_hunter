<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Upload Coupon</title>
</head>
<body style="background-color: #F4F472;">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    <div style="height: 450px; width: 500px; margin-left: auto; margin-right: auto; margin-top: 2%; background-color: white; padding: 25px; border-radius: 15px;">
        <form method="POST" action="upload_action.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="couponCode" class="form-label">Coupon Code</label>
                <input type="text" class="form-control" name="couponCode" pattern="[a-zA-Z0-9]+" id="couponCode">
            </div>
            
            <label for="couponType">Coupon Type:</label><br><br>
            <select id="couponType" name="couponType">
                <option value="clothing">Clothing</option>
                <option value="music">Music</option>
                <option value="academics">Academics</option>
            </select><br><br>

            <div class="mb-3">
                <label for="couponImage" class="form-label">Upload your Coupon (jpg, png)</label>
                <input class="form-control" type="file" accept="image/png, image/jpeg" name="couponImage" id="couponImage">
            </div><br><br>
            <button id="submitbtn" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
