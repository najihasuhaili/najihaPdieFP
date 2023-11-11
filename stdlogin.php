<!--Memanggil fail header-->
<?PHP include('header.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f2f2f2;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h2 {
      text-align: center;
      color: #333;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      display: block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    p {
      text-align: center;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>STUDENT LOG IN</h2>
  <form action='' method='POST' autofocus>
    <label for="studentName">Student Name:</label>
    <input type='text' id="studentName" name='studentName'>
    <label for="studentId">Student ID:</label>
    <input type='text' id="studentId" name='studentId'>
    <input type='submit' value='Log In'>
  </form>
  <p>Back to <a href="stdsignup.php">Sign Up</a></p>
</div>
</body>
</html>


<?PHP
# menyemak kewujudan data POST
if (!empty($_POST))
{
	#memanggil fail connection
	include ('connection.php');

	#mengambil data POST
	$studentName=$_POST['studentName'];
	$studentId=$_POST['studentId'];

	# arahan SQL untuk mencari data dari jadual pelanggan
	$arahan_sql_cari="select*
	from studentsignup
	where studentName='$studentName' and
	studentId='$studentId'
	limit 1 ";

	#melaksanakan proses carian 
	$laksana_arahan=mysqli_query($condb,$arahan_sql_cari);

	# jika terdapat 1 baris rekod ditemui
	if(mysqli_num_rows($laksana_arahan)==1)
	{
		# login berjaya
		# pembolehubah $rekod mengambil data yang ditemui semasa proses mencari
		$rekod=mysqli_fetch_array($laksana_arahan);

		#mengumpukkan kepada pembolehubah sessions
		$_SESSION['studentName']=$rekod['studentName'];
		$_SESSION['studentId']=$rekod['studentId'];

		# mengarahkan fail index.php dibuka
		echo "<script>window.location.href='course.php';</script>";
	}
	else
	{
		# login gagal. kembali ke laman sebelumnya
		echo "<script>alert('Failed to log in. Sign Up first');
		window.location.href='stdsignup.php';</script>";
	}
}
?>
