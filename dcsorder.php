<!-- Memanggil fail header -->
<?php include('header.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
     .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 65vh; /* This will center content vertically */
        }
        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
    </style>
</head>
<body>
<ul>
  <li><a class="active" href="dcsorder.php">Order Books</a></li>
  <li><a href="dcsTrack.php">Track Order</a></li>
  <li><a href="course.php">Course</a></li>
  <li><a href="index.php">Log out</a></li>
</ul>

<div class="container">
    <h2 class="text-center">ORDER FORM FOR DCS STUDENT</h2>
    <div class="row">
      <div class="center-content">
        <div class="col-md-8">
            <?php
             include('connection.php');
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitOrder'])) {
                $studentId = $_POST['studentId'];
                $studentName = $_POST['studentName'];
                $bookNames = $_POST['bookName'];

                # Combine selected books into a comma-separated string
                $selectedBooks = implode(', ', $bookNames);
                $status = 'Pending'; // Default status

                # Memasukkan data pesanan ke dalam pangkalan data
                $insertSql = "INSERT INTO dcsorder (studentId, studentName, bookName, status) VALUES ('$studentId', '$studentName', '$selectedBooks', '$status')";
                if (mysqli_query($condb, $insertSql)) {
                    echo "<div class='alert alert-success'>Order submitted successfully.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Failed to submit the order. Please try again.</div>";
                }
            }
            ?>
            <form action='' method='POST' class="well">
                <div class="form-group">
                    <label for="studentId">Student ID:</label>
                    <input type="text" name="studentId" class="form-control" id="studentId" placeholder="Enter Student ID">
                </div>
                <div class="form-group">
                    <label for="studentName">Student Name:</label>
                    <input type="text" name="studentName" class="form-control" id="studentName" placeholder="Enter Student Name">
                </div>
                <div class="form-group">
                    <label>Choose Books:</label>
                    <?php
                    # Memanggil fail connection.php dari folder luaran
                    include('connection.php');

                    # Arahan SQL untuk memilih semua medan dalam jadual dcslist
                    $arahan_sql = "SELECT bookName FROM dcslist";
                    $laksana_arahan = mysqli_query($condb, $arahan_sql);

                    if ($laksana_arahan) {
                        while ($rekod = mysqli_fetch_array($laksana_arahan)) {
                            $bookName = $rekod['bookName'];
                            echo '<label class="checkbox-inline"><input type="checkbox" name="bookName[]" value="' . htmlspecialchars($bookName) . '"> ' . $bookName . '</label>';
                        }
                    }
                    ?>
                </div>
<button type="submit" name="submitOrder" class="btn btn-primary">Submit Order</button>
</form>
    </div>
</body>
</html>
