<?php
    include'db_con.php';

    $note=false;
    $note2=false;
    $note3=false;
    if (isset($_POST['submit'])) {
        $Send_from=$_GET['id'];
        $send_to=$_POST['buyer1'];
        $amt=$_POST['buyingamt'];

        $sql="select * from seller where id=$Seller";
        $query=mysqli_query($con,$sql);
        $sql1=mysqli_fetch_array($query);

        $sql2="select * from users where id=$buyer";
        $query1=mysqli_query($con,$sql2);
        $sql3=mysqli_fetch_array($query1);


        if ($amt<=0) {
            $note=true;
        }

        else if($amt> $sql1['plants']){
            $note2=true;
        }
        else{
            $updatedBal=$sql1['plants']-$amt;
            $set="update users set balance=$updatedplants where id=$seller";
            mysqli_query($con,$set);

            $updatedBal=$sql3['balance']+$amt;
            $set="update users set balance=$updatedplants where id=$buyer";
            mysqli_query($con,$set);

            $insert="insert into history(seler1,buyer1,buyingamt) values('{$sql1['name']}','{$sql3['name']}','{$amt}')";
            $query_insert=mysqli_query($con,$insert);

            if($query_insert){
            //note3 upar ja k false ho rha h
                $note3=true;
            }

            $updatedBal=0;
            $amt=0;

            $sel_to="select * from users where id=$buyer";
            $set2=mysqli_query($con,$sel_to);
            
            if (!$set2) {
               
                echo "error:".mysqli_error($set2);
            }
            $sql5=mysqli_fetch_assoc($set2);
        }
    } 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>plant Exchange</title>

    <link rel="stylesheet" href="bank_style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <style>

.navbar{
    background: rgb(224, 255, 200);
}

        .trans__from {
            width: 700px;
            height: 600px;
            background:  linear-gradient(90deg, rgba(124,246,118,1) 4%, rgba(237,242,235,1) 68%);
            margin-top: 20px;
            margin: 20px 20px 20px 20px;
            border: 1px rgb(15, 115, 112);
            border-radius: 20px;
            
        }

        .trans__to {
            width: 700px;
            height: 600px;
            background:linear-gradient(90deg, rgba(124,246,118,1) 4%, rgba(237,242,235,1) 68%);
            margin-top: 20px;
            margin: 20px 20px 20px 20px;
            border: 1px rgb(15, 115, 112);
            border-radius: 20px;
        }

        .to_from {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding: 10px 10px 20px 10px;
            margin-top: 20px;

        }

        .from {
            margin: 10px 10px 10px 10px;
            padding: 10px 10px 10px 10px;
            
        }

        .to {
            margin: 10px 10px 10px 10px;
            padding: 10px 10px 10px 10px;
        }

        .btn-form {
            background-color: #036737;
            color: white;
            border: 1px solid black;
            font-size: large;
            padding: 15px 10px;
            cursor: pointer;
            align-items: center;
            text-decoration: none;
            width: 40%;
            font-weight: 500;

        }

        .btn-form:hover {
            background-color: #036737;
            color: white;
            transition: all .3s ease-in-out;
        }
        .btn__grp{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        h2 u{
            color: #036737;
            font-weight: 700;
            font-size: 35px;
        }
        label{
            font-size: larger;
            font-weight: 700;
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
            $sel="select * from users";
            $result=mysqli_query($con, $sel);
    ?>

    <!-- preloader -->
    <div id="loading"></div>

    <header>
        
    
        <br>

        <div class="container ">
            <div align="center">
                <div class="tr_head create_title">
                    <h1 style="color:#036737;"><b>Buy Plant</b></h1>
                </div>
            </div>

        </div>

        <?php
            if ($note==true) {
                echo'<br><br>';
                echo "<h1 align='center' style='color:red;'>Please! Enter proper Amount of plants..</h1>";
            }
            if ($note2==true) {
                echo'<br><br>';
                echo "<h1 align='center' style='color:red;'>You Have Insufficient Amount of plants !!</h1>";
            }
            if ($note3==true) {
                echo'<br><br>';
                echo "<h1 align='center' style='color:rgb(15, 115, 112);'>Congrats!! Buying Successful</h1>";
                echo"<br>";
                echo "<h1 align='center' style='color:rgb(15, 115, 112);'>{$sql5['name']}'s Remaining Plants:{$sql5['balance']} </h1>";
                echo"<br>";
                echo"<div align='center'><a href='history.php' ><button class='btn btn-primary'>Check History</button></a></div>";
            }
        ?>

        <div class="to_from">
            <div class="trans__from">
                <div class="from">
                    <h2><u>Seller:</u></h2> <br><br><br><br>
                    <div class="from__form">

                        <?php
                            include'db_con.php';

                            $get_id= $_GET['id']; //get id from url

                            $sender_sql="select * from seller where id=$get_id";
                            $sender=mysqli_query($con,$seller_sql);

                            if (!$sender) {
                                
                                echo "error:".mysqli_error($seller);
                            }
                            $sender_info=mysqli_fetch_assoc($seller);

                        ?>

                        <!-- <form method="GET"> -->
                            <label for="id">SELLER ID</label><br>
                            <input type="number" name="id" class="form-control" value="<?php echo $seller_info['id']; ?>" disabled><br>
                            <label for="name">SELLER NAME</label><br>
                            <input type="text" name="id" class="form-control" value="<?php echo $seller_info['name']; ?>" disabled> <br>
                            <label for="email">SELLER EMAIL</label><br>
                            <input type="email" name="id" class="form-control" value="<?php echo $seller_info['email']; ?>" disabled> <br>
                            <label for="balance">SELLER AVAILABLE PLANTS</label><br>
                            <input type="number" name="id" class="form-control" value="<?php echo $seller_info['plants']; ?>" disabled> <br>

                        <!-- </form> -->
                    </div>
                </div>
            </div>
            <div class="trans__to">
                <div class="to">
                    <h2><u>Buyer:</u></h2>

                    <div class="to__from"><br><br><br><br><br>

                        <?php
                            $receiver_sql="select * from users where id!=$get_id";
                            $receiver=mysqli_query($con,$buyer_sql);

                            if (!$receiver) {
                                
                                echo "error:".mysqli_error($buyer);
                            }

                        ?>


                        <form method="POST" >
                            <label for="receiver">BUYER</label><br>
                            <select name="receiver" class="form-control" required> 
                            <option value=""disabled selected>Select Buyer</option>
                         <?php
                                while($receiver_info=mysqli_fetch_assoc($buyer)){

                         ?>
                                    
                                
                                    <option value="<?php echo $buyer_info['id'] ?>" >
                                        <?php echo $buyer_info['id']; ?> : <?php echo $buyer_info['name']; ?> 
                                    </option>


                                <?php
                                    }
                                ?>

                            </select><br>
                            <label for="buyingamt">no. of plant</label><br>
                            <input type="number" name="buyingamt" class="form-control"
                                placeholder="Enter number of plant you want to buy" required> <br>

                            <div class="btn__grp">
                                <input type="submit" value="Buy" name="submit" class="form-control btn-form">
                                <input type="reset" value="Reset" name="reset" class="form-control btn-form">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="text-center">
            <a href="transaction.php"><button class="btn btn-outline-secondary btn-lg">Back</button></a>&nbsp;
            <a href="index.php#container_main"><button class="btn btn-info btn-lg">Home</button></a>
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
