<?php session_start(); ?>
<?php 
//include("navbar1.php");
    //connect to db crud and select all records from 'items' table
    $mysqli = new mysqli('localhost', 'root', '', 'webims') or die(mysqli_error($mysqli).mysql_errno());

if(isset($_POST['save'])){
    $catName = $_POST['catName'];
    $parentCat = $_POST['parentCat'];
    $catId = $_POST['catId'];
    $_SESSION['catName'] = $_POST['catName'];
//Create an SQL query
    $sql = "INSERT INTO category(catName, parentCat, catId) VALUES('$catName', '$parentCat', '$catId')";
//Run the Query
    $catResult = $mysqli->query($sql) or die($mysqli->error.__LINE__);
//Creating a Session variable for the message
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
// redirect user to the page (add_category.php)
    header("location: add_category.php");
}


    ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WEBIMS: Add Category</title>
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
     <?php
        if(isset($_SESSION['message'])):?>
        <div class="alert-<?=$_SESSION['msg_type']?>">
        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']); 
        ?>
        </div>
<?php endif; ?>
    

    <br><br>
    <h3 style="text-align: center; color: #a4a4a4"><u>Add Category</u></h3>
    <div class="row justify-content-center">
        <form action="add_category.php" method = "POST">
        <input type="hidden" name="id" value='<?php echo $id ?>' >  
        <div class="form-group">
        <label>Category Name</label>
        <input type="text" name="catName" class="form-control"
          placeholder = "Enter Category Name">
        </div>
        <div class="form-group">
        <label>Parent Category</label>
        <input type="text" name="parentCat" class="form-control"
          placeholder="Enter Parent Category">
        </div>
        <div class="form-group">
        <label>Category ID</label>
        <input type="text" name="catId" class="form-control"
          placeholder = "Enter Category ID Number">
        </div>
        
        
        <div class="form-group">
        <label></label>
        <input type="hidden" name="totalCost" class="form-control"
         >
        </div>
        <div class="form-group">
        

        
        
        <button type="submit" class= "btn btn-primary" name="save"><i class="fa fa-save"></i> Save</button>
        
        </div>
        </form>
    </div>
</form>
 </div>
 </div>
</body>
</html>
