<!--Memanggil fail header-->
<?PHP include('header.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <title>Document</title>
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
</head>
<body>
<ul>
  <li><a class="active" href="diaorder.php">Order Books</a></li>
  <li><a href="diaTrack.php">Track Order</a></li>
  <li><a href="course.php">Course</a></li>
  <li><a href="index.php">Log out</a></li>
</ul>

<form action="diaorder.php" method="post">
    <div class="container">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Num</th>
      <th scope="col">Code</th>
      <th scope="col">Semester</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>

<?PHP 
# memanggil fail connection.php dari folder luaran
include ('connection.php');

# arahan SQL untuk memilih semua medan dalam jadual pelanggan
$arahan_sql= "select* from dialist";
$laksana_arahan=mysqli_query($condb,$arahan_sql);
$bil=0;

if($laksana_arahan){
 while($rekod=mysqli_fetch_array($laksana_arahan)){
    # Memaparkan data pelanggan satu demi satu
    $diaCode=$rekod['diaCode'];
    $diaSem=$rekod['diaSem'];
    $bookName=$rekod['bookName'];
    $price=$rekod['price'];
    echo "
    <tr>
    <td>".++$bil."</td>
    <td>".$diaCode."</td>
    <td>".$rekod['diaSem']."</td>
    <td>".$rekod['bookName']."</td>
    <td>".$rekod['price']."</td>
</tr>";
}
}
?>
</form>
</tbody>
</table>  
</div>
</body>
</html>