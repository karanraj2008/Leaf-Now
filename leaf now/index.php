<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leafNow</title>
    <link rel="stylesheet" href="#">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>

.navbar{
    background: rgb(224, 255, 200);
}


body{
    background: linear-gradient(90deg, rgba(124,246,118,1) 4%, rgba(237,242,235,1) 68%);
}

.mainBody{
    margin:2% 5% 0 5%;
}

.header-text button{
    margin-top: 20px;
    margin-bottom: 60px;
}
.line1{
    width: 15px;
    height: 15px;
    background: #036737;;
    display: inline-block;
}
.line2{
    width: 80px;
    height: 1px;
    background: #036737;
    display: inline-block;
}
.line3{
    width: 60px;
    height: 1px;
    background: #036737;
    display: inline-block;
}
.line{
    line-height: 8px;
}

.mainBody .btn{
    min-width: 200px;
    margin-bottom: 10px;
}


</style>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <img src="plant.png" placeholder="a plant" style=" max-height: 60px;padding-left: 2%;">
        <a class="navbar-brand" href="index.php"><h2 style="color:rgb(5, 67, 5);" ><b>Leaf Now</b></h2></a> 
    </nav>


      
<!--header name print , logout and signin button-->
    <div style="position: fixed;right: 300px;top: 10px;">
    <?php  if (isset($_SESSION['username'])) : ?>
    	<h3><strong><?php echo $_SESSION['username']; ?></strong>
     <a href="index.php?logout='1'" style="color: red;"><button type="button" class="btn btn-success btn-lg" style=" min-width: 100px; width: 50px;">logout</button></a> </h3>
    <?php endif ?>
      <a href="login.php" ><button type="button" class="btn btn-success btn-lg" style=" min-width: 200px; width: 50px; position: fixed;right: 65px;top: 10px;">Login/register</button></a>
    </div>





<div class="mainBody">
  <img src="plant2.png" placeholder="aplant" style="float: right; max-height:800px;">

  <div class="header-text">
    <h1 style="padding-top: 10px; padding-bottom:10px; color: #036737;"><b>All the flowers</br>of all the tomorrow<br>are in the seed of today </b></h1>
    <span class="square"></span>
    <p></p>
    
    <div class="line">
        <span class="line1"></span><br><br>
        <span class="line2"></span><br><br>
        <span class="line3"></span>
    </div>
    <div>
    <a href="transaction.php"><button type="button" class="btn btn-success btn-lg">Buy</button></a>
    <br>
    <a href="seller.php"><button type="button" class="btn btn-success btn-lg" >Sell</button></a>
    <br>
    <a href="donate.html"><button type="button" class="btn btn-success btn-lg">Donate</button></a>
    </div>
</div>
 
</body>
</html>