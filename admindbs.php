<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 30%
}
a{
  text-align: center;
}
body{
  margin: 0;
  padding: 0;
}
.container{
  text-align: center;
  margin-top: 50px;
}
.btn{
  border: 1px solid #3498db;
  background: none;
  padding: 10px 20px;
  font-size: 20px;
  font-family: "montserrat";
  cursor: pointer;
  margin: 10px;
  transition: 0.8s;
  position: relative;
  overflow: hidden;
}
.btn1{
  color: #3498db;
}
.btn1:hover{
  color: #fff;
}
.btn::before{
  content: "";
  position: absolute;
  left: 0;
  width: 100%;
  height: 0%;
  background: #3498db;
  z-index: -1;
  transition: 0.8s;
}
.btn1::before{
  top: 0;
  border-radius: 0 0 50% 50%;
}
.btn1:hover::before{
  height: 180%;
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
    <img src="images/marakpmb.png"  >
    <br>
    <br>
    <br>
    <ul>
  <li><a class="active" href="adminDbsBookOrder.php">DBS Book Order</a></li>
  <li><a href="adminDbsBookList.php">DBS Book List</a></li>
  <li><a href="courseadmin.php">Course</a></li>
  <li><a href="index.php">Log out</a></li>
</ul>
    <div class="container">
<h1>WELCOME TO KPMB BOOKSTORE</h1>
</div>
    <div class="container">
    <button class= "btn btn1"><a href="adminDbsBookList.php"> DBS BOOK LIST</a></button>
    <button class= "btn btn1"><a href="adminDbsBookOrder.php">DBS BOOK ORDER</a></button>
</div>
</body>
</html>


