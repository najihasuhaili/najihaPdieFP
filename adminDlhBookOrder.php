<!-- Memanggil fail header -->
<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <title>Document</title>
</head>
<style>
        /* Custom CSS for button width */
        .custom-button {
            width: 200px; /* Set your desired width here */
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
<body>
<ul>
  <li><a class="active" href="adminDlhBookOrder.php">DLH Book Order</a></li>
  <li><a href="adminDlhBookList.php">DLH Book List</a></li>
  <li><a href="courseadmin.php">Course</a></li>
  <li><a href="index.php">Log out</a></li>
</ul>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Num</th>
                <th scope="col">Student ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Books Ordered</th>
                <th scope="col">Status</th>
                <th scope="col">Change Status</th>
            </tr>
        </thead>
        <tbody>

        <?php
        # memanggil fail connection.php dari folder luaran
        include('connection.php');

        if (isset($_POST['changeStatus'])) {
            $studentId = $_POST['studentId'];
            $newStatus = $_POST['newStatus'];

            # arahan SQL untuk mengemaskini status dalam jadual dcsorder
            $updateSql = "UPDATE dlhorder SET status='$newStatus' WHERE studentId='$studentId'";

            if (mysqli_query($condb, $updateSql)) {
                echo "<script>alert('Status changed successfully.');</script>";
            } else {
                echo "<script>alert('Failed to change status.');</script>";
            }
        }
        $arahan_sql = "SELECT * FROM dlhorder";
        $laksana_arahan = mysqli_query($condb, $arahan_sql);
        $bil = 0;

        if ($laksana_arahan){
            while ($rekod = mysqli_fetch_array($laksana_arahan)) {
                # Memaparkan data pelanggan satu demi satu
                $studentId = $rekod['studentId'];
                $studentName = $rekod['studentName'];
                $bookName = $rekod['bookName'];
                $status = $rekod['status'];
                echo "
                <tr>
                <td>" . ++$bil . "</td>
                <td>" . $studentId . "</td>
                <td>" . $studentName . "</td>
                <td>" . $bookName . "</td>
                <td>" . $status . "</td>
                <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='studentId' value='" . $studentId . "'>
                        <select name='newStatus'>
                            <option value='Pending' " . ($status === 'Pending' ? 'selected' : '') . ">Pending</option>
                            <option value='Available' " . ($status === 'Available' ? 'selected' : '') . ">Available</option>
                            <option value='Picked up' " . ($status === 'Picked up' ? 'selected' : '') . ">Picked Up</option>
                            </select>
                            <input type='submit' name='changeStatus' value='Change'>
                        </form>
                    </td>
                </tr>";
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
