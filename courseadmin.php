<!-- Memanggil fail header -->
<?php include('header.php'); ?>

<!DOCTYPE html>
<html>
<head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }

  h2 {
    text-align: center;
    color: #333;
  }

  h4 {
    text-align: center;
    color: #666;
  }

  div.gallery {
    border: 1px solid #ccc;
    margin: 10px;
    overflow: hidden;
  }

  div.gallery:hover {
    border: 1px solid #777;
    box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.1);
  }

  div.gallery img {
    width: 100%;
    height: auto;
  }

  div.desc {
    padding: 15px;
    text-align: center;
    background-color: #f2f2f2;
  }

  * {
    box-sizing: border-box;
  }

  .responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
  }

  @media only screen and (max-width: 700px) {
    .responsive {
      width: 49.99999%;
      margin: 6px 0;
    }
  }

  @media only screen and (max-width: 500px) {
    .responsive {
      width: 100%;
    }
  }

  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }
  .logout-link {
    position: absolute;
    top: 40px; /* Adjust the top position as needed */
    right: 50px; /* Adjust the right position as needed */
    color: #333; /* Text color */
    text-decoration: none; /* Remove underline for the link */
  }
</style>
</head>
<body>
<a class="logout-link" href="index.php">Logout</a>
<h2>COURSE</h2>

<h4>Choose your course</h4>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="images/dbs.png">
      <img src="images/dbs.png" alt="DIPLOMA IN BUSINESS STUDIES" width="600" height="400">
    </a>
    <div class="desc"><a href="admindbs.php">DIPLOMA IN BUSINESS STUDIES</a></div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="images/dcs.png">
      <img src="images/dcs.png" alt="DIPLOMA IN COMPUTER SCIENCE" width="600" height="400">
    </a>
    <div class="desc"><a href="admindcs.php">DIPLOMA IN COMPUTER SCIENCE</a></div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="images/dia.png">
      <img src="images/dia.png" alt="DIPLOMA IN ACCOUNTING" width="600" height="400">
    </a>
    <div class="desc"><a href="admindia.php">DIPLOMA IN ACCOUNTING</a></div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="images/dlh.png">
      <img src="images/dlh.png" alt="DIPLOMA IN LANDSCAPE AND HORTICULTURE" width="600" height="400">
    </a>
    <div class="desc"><a href="admindlh.php">DIPLOMA IN LANDSCAPE AND HORTICULTURE</a></div>
  </div>
</div>

<div class="clearfix"></div>

<div style="padding: 20px; text-align: center;">
  <p>Explore courses and select the one that suits you best!</p>
</div>

</body>
</html>
