<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WEBIMS: Registration-Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="style5.css">

    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
        body{
            background-color: #673ab7;
            color: #fff;
            font-weight: bold;
        }
    </style>
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
   
//unnecessary codes

   //
    //using sql query to select * from items.
   //$result = $mysqli->query("SELECT * FROM items") or die($mysqli->error);
    //pre_r($result);
    //pre_r($result->fetch_assoc());
  
    ?>

    <!--
    <div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Purchase Date</th>
                <th>Total Cost</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>    -->

<!--
        <?php
         //   while ($row = $result->fetch_assoc()):
        ?>
        <tr>
         //   <td><?php  // echo $row['id'];?></td>
            <td><?php //echo $row['productName'];?></td>
            <td><?php //echo $row['category'];?></td>
            <td><?php //echo $row['unitPrice'];?></td>
            <td><?php //echo $row['quantity'];?></td>
            <td><?php //echo $row['purchaseDate'];?></td>
            <td><?php //echo $row['totalCost'];?></td>
            <td>
                <a href="add_item.php?edit=<?php // echo $row['id']; ?>"
                    class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
                <a href="process.php?delete=<?php //echo $row['id']; ?>"
                    class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>

            </td>
        </tr>
        <?php //endwhile; ?>
    </table>
    </div>

    */

    //our good php codes here -->
    <?php
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        }
    ?>
    <br><br>
    <h3 style="text-align: center; color:#fff;"><u>User Registration Form</u></h3><br>
    <div class="row justify-content-center">
        <form action="process.php" method = "POST">
        <input type="hidden" name="id" value='<?php echo $id ?>' >  
        <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="productName" class="form-control"
         value ="<?php echo $productName; ?>" placeholder = "Enter Full Name">
        </div>
        <div class="form-group">
        <label>Address</label>
        <input type="text" name="category" class="form-control"
         value = "<?php echo $category;?>" placeholder="Enter Address">
        </div>
        <div class="form-group">
        <label>Phone Number</label>
        <input type="number" name="unitPrice" class="form-control"
         value ="<?php echo $unitPrice; ?>" placeholder = "Enter Phone Number">
        </div>
        <div class="form-group">
        <label>Username</label>
        <input type="text" name="quantity" class="form-control"
         value ="<?php echo $quantity; ?>" placeholder = "Enter Username">
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="password" name="purchaseDate" class="form-control"
         value ="<?php echo $dateOfBirth; ?>">
        </div>
        <div class="form-group">
        <label></label>
        <input type="hidden" name="totalCost" class="form-control"
         value ="<?php echo $totalCost; ?>" ">
        </div>
        <div class="form-group">
        <?php 
            if($update==true):
                ?>
            <button type="submit" class="btn btn-info" name="reg">Register</button>

        
        <?php
            else:
        ?>
        <button type="submit" class= "btn btn-primary" name="save"><i class="fa fa-save"></i> Register</button>
        <?php endif; ?>
        </div>
        </form>
    </div>
</form>
 </div>
 </div>
</body>
</html>
