<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Transaction</title>

    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">


    <style>

.navbar{
    background: rgb(224, 255, 200);
}
        .table_grp{
            width:90%;
            overflow-x: auto;
        }
        .main_trans{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 10px 10px 10px 10px;
            padding: 10px 5px 5px 5px;
        }
        .trsct_btn{
            background:white;
            border:1px solid black;
            font-size: large;
            padding: 5px 10px;
            display: inline-block;
            cursor: pointer;
            align-items: center;
            font-weight:500;
        }
        .passbook_btn{
            background:#202020;
            color: white;
            border:1px solid black;
            font-size: large;
            padding: 5px 10px;
            display: inline-block;
            cursor: pointer;
            align-items: center;
            font-weight:500;
        }
        .trsct_btn:hover{
            background:#202020;
            color:white;
            transition: all .3s ease-in-out;
        }
        .passbook_btn:hover{
            background:white;
            color:#202020;
            transition: all .3s ease-in-out;
        }
       
    </style>
</head>

<body onload="load()">

<nav class="navbar navbar-expand-lg navbar-light">
        <img src="plant.png" placeholder="a plant" style=" max-height: 60px;padding-left: 2%;">
        <a class="navbar-brand" href="index.php"><h2 style="color:rgb(5, 67, 5);" ><b>Leaf Now</b></h2></a> 
    </nav>

    <?php 
        include 'db_con.php';
         
        $sel="select * from seller";
        $result=mysqli_query($con, $sel);

    ?>
    
    <!-- preloader -->
    <div id="loading"></div>

    <header>
       

        <br><br>

        <div class="main_trans">
            <div align="center">
                <div   style="color: white; background:rgb(15, 115, 112); border: 1px solid green; width:100%;">
                    <h3 style=" color: honeydew; margin: 12px 10px;"> Available Seller</h3>
                </div>
            </div>
        
            <div class="table_grp">
                <table border="1" class="table table-hover">
                    <thead class="table-white" >
                        <tr>
                            <th>Seller ID</th>
                            <th>Name</th>
                            <th>Email ID</th>
                            <th>No. of plants</th>
                            <th>Action</th>
                            <th>History</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($rs=mysqli_fetch_assoc($result)){

                        ?>

                            <tr>
                                <td><?php echo $rs['id']?></td>
                                <td><?php echo $rs['name']?></td>
                                <td><?php echo $rs['email']?></td>
                                <td><?php echo $rs['plants']?></td>
                                <td><a href="transact_p.php?id=<?php echo $rs['id'] ?>"><button class="trsct_btn" type="button">Buy</button></a></td>
                                <td><a href="passbook.php?id=<?php echo $rs['id'] ?>"><button class="passbook_btn" type="button">History</button></a></td>
                            </tr>                                

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="crt_user">
                <a href="seller.php"><button type="button" class="btn btn-outline-secondary btn-lg">Create Seller Account</button></a>
                <a href="index.php#container_main"><button type="button" class="btn btn-info btn-lg">Home</button></a>
            </div>
        </div>

    </header>
   
    

   







    <script>
        var preloader = document.getElementById('loading');

        function load() {
            setTimeout(loaded, 1000); //3 sec ka sleep    
        }
        function loaded() {
            preloader.style.display = 'none';
        }
    </script>
</body>

</html>