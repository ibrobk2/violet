<?php include("navbar1.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>View Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">



    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!--connect form handler process.php -->
<div class="container">
    <?php require_once "process.php"; ?>

    <?php
        if(isset($_SESSION['message'])):?>
        <div class="alert-<?=$_SESSION['msg_type']?>">
        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']); 
        ?>
        </div>
<?php endif; ?>
    <?php 
    //connect to db crud and select all records from 'items' table
    $mysqli = new mysqli('localhost', 'root', '', 'webims') or die(mysqli_error($mysqli).mysql_errno());
    
    //using sql query to select * from items.
    $result = $mysqli->query("SELECT * FROM items") or die($mysqli->error);
    //pre_r($result);
    //pre_r($result->fetch_assoc());
  
    ?>
    <div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Brand Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Purchase Date</th>
                <th>Total Cost</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php
            while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?php echo $row['id']+20119;?></td>
            <td><?php echo $row['productName'];?></td>
            <td><?php echo $row['category'];?></td>
            <td><?php echo $row['brandName'];?></td>
            <td><?php echo $row['unitPrice'];?></td>
            <td><?php echo $row['quantity'];?></td>
            <td><?php echo $row['purchaseDate'];?></td>
            <td><?php echo $row['totalCost'];?></td>
            <td>
                <a href="viewItems.php?edit=<?php echo $row['id']; ?>"
                    class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
                <a href="viewItems.php?delete=<?php echo $row['id']; ?>"
                    class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>

            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    </div>
    <?php
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        }
    ?>
    
 </div>
 </div>
</body>
</html>
