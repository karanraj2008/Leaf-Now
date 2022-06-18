<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User PassBook</title>

    <link rel="stylesheet" href="bank_style.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">


    <style>

        .navbar{
             background: rgb(224, 255, 200);
        }
        .passbook {
            width: 70%;
            background: linear-gradient(90deg, rgba(124,246,118,1) 4%, rgba(237,242,235,1) 68%);
            border: 1px #036737;
            border-radius: 15px;
            padding: 20px 20px 20px 20px;
            margin-bottom: 10px;
        }
        
        .passbook div h2 strong{
            color: #202020;
            font-family:sans-serif;
        }
        .table_grp{
            overflow-x: auto;
        }

    </style>
</head>

<body onload="load()">

<!--navigation bar-->

    <nav class="navbar navbar-expand-lg navbar-light">
        <img src="plant.png" placeholder="a plant" style=" max-height: 60px;padding-left: 2%;">
        <a class="navbar-brand" href="index.php"><h2 style="color:rgb(5, 67, 5);" ><b>Leaf Now</b></h2></a> 
    </nav>





    <!-- preloader -->
    <div id="loading"></div>

    <header>




        <?php
            include'db_con.php';

            $user_id=$_GET['id'];
            $sel="select * from seller where id=$seller_id";
            $sql=mysqli_query($con,$sel);

            if (!$sql) {
                echo "error:".mysqli_error($sql);
            }
            $select=mysqli_fetch_assoc($sql);

            // this for sender 
            $sel1="select * from history where seller1='{$select['name']}'";
            $result=mysqli_query($con, $sel1);

            // now receiver
            $sel2="select * from history where buyer1='{$select['name']}'";
            $result1=mysqli_query($con, $sel2);

        
        ?>

        <br>

        <div align="center">
            <div class="mb-3" style="color: white; background:#036737; border: 1px solid green; width:70%;">
                <h3 style=" color: honeydew; margin: 12px 10px;">History</h3>
            </div>
        </div>

        <!--passbook-->
        <div class="main__pb " align="center">
            <div>
                <div class="passbook" align="left">
                    <div class="bid">
                        <h2><strong>ID:</strong><?php echo $select['id']; ?></h2>
                    </div><br>
                    <div class="bname">
                        <h2><strong>Name:</strong><?php echo $select['name']; ?></h2>
                    </div><br>
                    <div class="bemail">
                        <h2><strong>Email ID:</strong><?php echo $select['email']; ?></h2>
                    </div><br>
                    <div class="bavlbl">
                        <h2><strong>Available plants</strong><?php echo $select['plants']; ?></h2>
                    </div><br>
                    <div class="per_hist">
                        <h2><strong>Your History: </strong></h2>
                        <div class="table_grp">
                            <table border="1" class="table table-hover">
                                <thead class="table-white">
                                    <tr>
                                        <th>Tr No.</th>
                                        <th>Buyer</th>
                                        <th>Seller</th>
                                        <th>Plant sold</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>

                                <?php
                                        while($rows=mysqli_fetch_assoc($result)){
                                    ?>

                                            <tr>
                                                <td><?php echo $rows['id']; ?></td>
                                                <td><?php echo $rows['seller1']; ?></td>
                                                <td><?php echo $rows['buyer1']; ?></td>
                                                <td><?php echo $rows['buyingamt']; ?></td>
                                                <td><?php echo $rows['time']; ?></td>
                                            </tr>

                                    <?php
                                        }
                                    ?>
                                            <?php
                                        while($rows1=mysqli_fetch_assoc($result1)){
                                    ?>

                                            <tr>
                                                <td><?php echo $rows1['id']; ?></td>
                                                <td><?php echo $rows1['seller1']; ?></td>
                                                <td><?php echo $rows1['buyer1']; ?></td>
                                                <td><?php echo $rows1['buyingamt']; ?></td>
                                                <td><?php echo $rows1['time']; ?></td>
                                            </tr>

                                    <?php
                                        }
                                    ?>

                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--print aur home button-->

        <div class="text-center mb-3">
            <button class="btn btn-outline-primary btn-lg" onclick="printt()">Print</button>&nbsp;
            <a href="index.php"><button class="btn btn-info btn-lg">Home</button></a>
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
        function printt(){
            window.print();
        }
    </script>
</body>

</html>