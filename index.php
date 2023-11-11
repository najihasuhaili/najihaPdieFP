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
  width: 50%
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
</style>
</head>
<body>
    <img src="images/marakpmb.png"  >
    <br>
    <br>
    <br>
    <br>
    <div class="container">
<h1>WELCOME TO KPMB BOOKSTORE</h1>
</div>
    <div class="container">
    <button class= "btn btn1"><a href="stdsignup.php">STUDENT</a></button>
    <button class= "btn btn1"><a href="adminlogin.php">STAFF/ADMIN</a></button>
</div>

</body>
</html>


