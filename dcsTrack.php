<!-- Memanggil fail header -->
<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
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
<?php
  include('connection.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitOrder'])) {
        $studentId = $_POST['studentId'];
        $studentName = $_POST['studentName'];
        $bookNames = $_POST['bookName'];

        # Combine selected books into a comma-separated string
        $selectedBooks = implode(', ', $bookNames);
        $status = 'Pending'; // Default status
}?>

<h2 class="text-center">TRACK ORDER FORM</h2>
<div class="center-content">
<div class="col-md-6">
      <form action='' method='POST' class="well">
        <div class="form-group">
            <p>THIS TRACK FORM IS VALID FOR DCS STUDENT ONLY</p>
          <label for="searchStudentId">Search by Student ID:</label>
          <div class="input-group">
            <input type="text" name="searchStudentId" class="form-control" id="searchStudentId" placeholder="Enter Student ID">
            <span class="input-group-btn">
              <button type="submit" name="search" class="btn btn-primary">Search</button>
            </span>
          </div>
        </div>
      </form>
      <div class="well">
        <?php
        # Check if the search form is submitted
        if (isset($_POST['search'])) {
          # Get the student ID to search for
          $searchStudentId = $_POST['searchStudentId'];

          # Perform a database query to search for the student's orders
          $searchQuery = "SELECT * FROM dcsorder WHERE studentId = '$searchStudentId'";
          $searchResult = mysqli_query($condb, $searchQuery);

          # Display search results
          echo "<h3>Search Results:</h3>";
          if ($searchResult && mysqli_num_rows($searchResult) > 0) {
            while ($row = mysqli_fetch_assoc($searchResult)) {
              echo "Student ID: " . htmlspecialchars($row['studentId']) . "<br>";
              echo "Student Name: " . htmlspecialchars($row['studentName']) . "<br>";
              echo "Selected Books: " . htmlspecialchars($row['bookName']) . "<br>";
              echo "Status: " . htmlspecialchars($row['status']) . "<br>";
              echo "<hr>";
            }
          } else {
            echo "<p>No results found for Student ID: " . htmlspecialchars($searchStudentId) . "</p>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
    </div>
</body>
</html>