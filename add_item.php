<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="style4.css">

    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!--connect form handler process.php -->
<div class="container">
    <div class="row " >
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        <?php include("navbar1.php"); ?>
    </div>
        <div class="col-sm-2"></div>
        
        
    </div>
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
    <h3 style="text-align: center; color: #a4a4a4"><u>Add Item</u></h3>
    <div class="row justify-content-center">
        <form action="process.php" method = "POST">
        <input type="hidden" name="id" value='<?php echo $id ?>' >  
        <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="productName" class="form-control"
         value ="<?php echo $productName; ?>" placeholder = "Enter A Product">
        </div>
        <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">
            <option value="pick">Select Category</option>
            <?php 
        $sql = "SELECT catName FROM category";
        $rs = $mysqli->query($sql) or die($mysqli->error.__LINE__);
        while ($row = mysqli_fetch_assoc($rs)) { ?>
                 <option value="<?php echo $row['catName'];?>"><?php echo $row['catName']; ?></option>
            <?php } ?>
        </select>
        
        </div>
        <div class="form-group">
        <label>Brand</label>
        <select name="brandName" class="form-control">
            <option value="pick">Select Brand</option>
            <?php 
        $sql = "SELECT brandName FROM brands";
        $rs = $mysqli->query($sql) or die($mysqli->error.__LINE__);
        while ($row = mysqli_fetch_assoc($rs)) { ?>
                 <option value="<?php echo $row['brandName'];?>"><?php echo $row['brandName']; ?></option>
            <?php } ?>
        </select>
        
        </div>
        <div class="form-group">
        <label>Unit Price</label>
        <input type="number" name="unitPrice" class="form-control"
         value ="<?php echo $unitPrice; ?>" placeholder = "Enter Unit Price">
        </div>
        <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control"
         value ="<?php echo $quantity; ?>" placeholder = "Enter Quantity">
        </div>
        <div class="form-group">
        <label>Purchase Date</label>
        <input type="date" name="purchaseDate" class="form-control"
         value ="<?php echo $purchaseDate; ?>" placeholder = "Enter Purchase Date">
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
            <button type="submit" class="btn btn-info" name="save">Update</button>

        
        <?php
            else:
        ?>
        <button type="submit" class= "btn btn-primary" name="save"><i class="fa fa-save"></i> Save</button>
        <?php endif; ?>
        </div>
        </form>
    </div>
</form>
 </div>
 </div>
</body>
</html>
