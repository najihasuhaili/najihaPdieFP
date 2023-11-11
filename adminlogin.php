<!-- Memanggil fail header -->
<?php include('header.php'); ?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
}

.container {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  margin: 0 auto;
  max-width: 400px;
}

h2 {
  text-align: center;
  color: #333;
}

form {
  margin: 0;
}

input[type="text"], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type="submit"] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 10px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

p {
  text-align: center;
  margin-top: 10px;
  color: #333;
}

</style>
</head>
<body>

<div class="container">
  <h2>ADMIN/STAFF LOG IN</h2>
  <form action='' method='POST' autofocus>
    Name: <input type='text' name='adminName'><br>
    Id: <input type='text' name='adminId'><br>
    <input type='submit' value='Log In'>
  </form>
</div>

<?php
# menyemak kewujudan data POST
if (!empty($_POST))
{
	#memanggil fail connection
	include ('connection.php');

	#mengambil data POST
	$adminName=$_POST['adminName'];
	$adminId=$_POST['adminId'];

	# arahan SQL untuk mencari data dari jadual pelanggan
	$arahan_sql_cari="select * from admin where adminName='$adminName' and adminId='$adminId' limit 1 ";

	#melaksanakan proses carian 
	$laksana_arahan=mysqli_query($condb,$arahan_sql_cari);

	# jika terdapat 1 baris rekod ditemui
	if(mysqli_num_rows($laksana_arahan)==1)
	{
		# login berjaya
		# pembolehubah $rekod mengambil data yang ditemui semasa proses mencari
		$rekod=mysqli_fetch_array($laksana_arahan);

		#mengumpulkan kepada pembolehubah sessions
		$_SESSION['adminName']=$rekod['adminName'];
		$_SESSION['adminId']=$rekod['adminId'];

		# mengarahkan fail index.php dibuka
		echo "<script>window.location.href='courseadmin.php';</script>";
	}
	else
	{
		# login gagal. kembali ke laman sebelumnya
		echo "<script>alert('Failed to log in.'); window.location.href='index.php';</script>";
	}
}
?>
</body>
</html>
