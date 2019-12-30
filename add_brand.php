<?php session_start(); ?>
<?php 
    
    //connect to db crud and select all records from 'items' table
    $mysqli = new mysqli('localhost', 'root', '', 'webims') or die(mysqli_error($mysqli).mysql_errno());

if(isset($_POST['save'])){
    $brandName = $_POST['brandName'];
    $brandCat = $_POST['brandCat']; 
       
    

//Create an SQL query
    $sql = "INSERT INTO brands(brandName, brandCat) VALUES('$brandName', '$brandCat')";
//Run the Query
    $catResult = $mysqli->query($sql) or die($mysqli->error.__LINE__);

    if($catResult){
//Creating a Session variable for the message
    $_SESSION['message'] = "Record has been saved!";
   // $_SESSION['msg_type'] = "success";
// redirect user to the page (add_category.php)
    header("location: add_brand.php");
    }
}


    ?>
    


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WEBIMS: Add Brand</title>
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
        <div class="alert-sucess">
        <?php 
            echo $_SESSION['message'];
            unset($_SESSION['message']); 
        ?>
        </div>
<?php endif; ?>

    <br><br>
    <h3 style="text-align: center; color: #a4a4a4"><u>Add A Brand</u></h3>
    <div class="row justify-content-center">
        <form action="add_brand.php" method = "POST">
        <input type="hidden" name="id" value='<?php echo $id ?>' >  
        <div class="form-group">

        <label>Brand Name</label>
        <input type="text" name="brandName" class="form-control"
          placeholder = "Enter Brand Name">
        </div>
        <div class="form-group">
        <label>Category</label>
        <select name="brandCat" class="form-control">
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
