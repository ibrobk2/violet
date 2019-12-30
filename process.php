<?php
//start session
session_start();
//connect to db
$mysqli = new mysqli('localhost', 'root', '', 'webims') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$productName = '';
$category = '';
$unitPrice = '';
$quantity = '';
$purchaseDate = '';
$totalCost = '';

if(isset($_POST['save'])){
//creating variables
    $productName = $_POST['productName'];
    $category = $_POST['category']; 
    $brandName = $_POST['brandName'];
    $unitPrice = $_POST['unitPrice']; 
    $quantity = $_POST['quantity']; 
    $purchaseDate = $_POST['purchaseDate']; 
    $totalCost = $quantity*$unitPrice; 



 //Running a query 
$mysqli->query("INSERT INTO items (productName, category, brandName, unitPrice, quantity, purchaseDate, totalCost) VALUES('$productName', '$category', '$brandName', '$unitPrice', '$quantity', '$purchaseDate', '$totalCost')") or die($mysqli->error);
// setting a session message variable
$_SESSION['message'] = "Record has been saved!";
$_SESSION['msg_type'] = "success";
// redirect user to the page (add_item.php)
header("location: add_item.php");

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM items WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location: viewItems.php");
}
if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM items WHERE id=$id") or die($mysqli->error);
    if(count($result)==1){
        $row = $result->fetch_array();
        $productName = $row['productName'];
        $category = $row['category']; 
        $unitPrice = $row['unitPrice']; 
        $quantity = $row['quantity']; 
        $purchaseDate = $row['purchaseDate']; 
        $totalCost = $quantity*$unitPrice; 
    }
}
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $productName = $_POST['productName'];
    $category = $_POST['category']; 
    $unitPrice = $_POST['unitPrice']; 
    $quantity = $_POST['quantity']; 
    $purchaseDate = $_POST['purchaseDate']; 
    $totalCost = $quantity*$unitPrice; 

    $mysqli->query("UPDATE items SET productName = '$productName', category ='$category', unitPrice ='$unitPrice', quantity = '$quantity', purchaseDate = '$purchaseDate', totalCost = '$totalCost' WHERE id=$id'") or die($mysqli->error);
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    header('location: add_item.php');
}
?>
