<?php session_start(); ?>
<?php 
//Creatting a database connection
$mysqli = new mysqli("localhost", "root", "", "webims") or die($mysqli->error.__LINE__);


	
//Checking if Btn is clicked
if(isset($_POST['submit'])){
	
	$sql = "SELECT * FROM items";
        $rs = $mysqli->query($sql) or die($mysqli->error.__LINE__);
        $row = mysqli_fetch_assoc($rs);
				$quantity = $_POST['quantity'];

        		$productName = $row['productName'];
        		$remQty = $row['quantity']-$quantity;

        		 mysqli_query($mysqli, "UPDATE items SET quantity  = '$remQty' WHERE
        			productName = '$productName'");

if(isset($productName)){
        		$sql2 = "SELECT * FROM items WHERE productName = '$productName'";
        		$query2 = mysqli_query($mysqli, $sql2);
        		if(mysqli_num_rows($query2)==1){
        		$unitPrice = $row['unitPrice'];
        		$_SESSION['price'] = $unitPrice;
        		}
	



	$price = $_POST['price'];
	$invoiceId = rand(100000, 5000000);
	$date1 = date("d, F, Y");
	$customerName = $_POST['customerName'];
	$customerAddress = $_POST['customerAddress'];
	$mobile = $_POST['mobile'];
	$item = $_POST['item'];
	$quantity = $_POST['quantity'];

	$description = $_POST['description'];
	$cashPay = $_POST['cashPay'];
	$payMethod = $_POST['payMethod'];
	//$submit = $_POST['submit'];
	$subTotal = $price*$quantity;
	//$tax = $_POST['tax'];
	$discount = $_POST['discount'];
	//$total1 = intval($subTotal);
	$total = intval($subTotal-$discount);

	$balance = $total-$cashPay;

	//Creating SESSION variables for Invoice Printing
	$_SESSION['customerName'] = $customerName;
	$_SESSION['customerAddress'] = $customerAddress;
	$_SESSION['mobile'] = $mobile;
	$_SESSION['invoiceId'] = $invoiceId;
	$_SESSION['date1'] = $date1;
	$_SESSION['quantity'] = $quantity;
	$_SESSION['description'] = $description;
	$_SESSION['price'] = $price;
	$_SESSION['subTotal'] = $subTotal;
	$_SESSION['discount'] = $discount;
	$_SESSION['total'] = $total;
	$_SESSION['item'] = $item;
	$_SESSION['payMethod'] = $payMethod;
	$_SESSION['cashPaid'] = $cashPay;
	$_SESSION['balance'] = $balance;


	//$remQty = $row['quantity']-$quantity;



	//Create an SQL Query
	$sql = "INSERT INTO sells(invoiceId, date1, name, address, phone, item, qty, price, description, discount, cashPaid, payMethod, subTotal, total, balance) 
	VALUES('$invoiceId', '$date1', '$customerName', '$customerAddress', '$mobile', '$item', '$quantity', '$price', '$description', '$discount', '$cashPay', '$payMethod', '$subTotal', '$total', '$balance')";
	$query1 = mysqli_query($mysqli, $sql); 
	//$query = $mysqli->query($sql);
	
		//exit();
	header("location: invoice.php");
	
}
//

}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Sell Form</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style type="text/css">
	:root{
		--main : #aadaec;
		--color : #444;
	}
	.container{
			background-color: #f4f4f4;
		
			text-align: center;
			width: 35%;
			margin-top: 10px;
			padding-top: 0px;
			padding-bottom: 40px;
			padding-left: 20px;
			padding-right: 20px;
			border-radius: 8px;
			color: #ffcc00;

		}
	input, button{
		box-sizing: border-box;
		text-align: center;
		font-family: verdan, sans-serif;
		font-size: 14px;
		font-weight: bold;
	

	}
	body{
	display: flex;
	position: relative;
	justify-content: center;
	align-items: center;
	height: 100vh; 
	width: 100vw;
}
hr{
	border-width: 2px;
	border-bottom: 20px;
	border-color: #ffcc00;
	padding-bottom: 10px;
}
h4{
	padding-top: 10px;
	padding-bottom: 7px;
	color:#fff;
}

body:before, body:after{
	content: "";
	box-shadow: 0 0 20px 0 var(--main);
	position: absolute;
	background-color: #0069d9;
	overflow: hidden;

}

body:before{
	width: 300px;
	height: 300px;
	left:-150px;
	bottom: -150px;
	border-radius: 50%;
	background-color: var(--main);
}

body:after{
	width: 600px;
	height: 600px;
	left: 1000px;
	bottom: 450px;
	border-radius: 50%;
	background-color: var(--main);

}
.logText{
	background-color: var(--main);
	border-radius: 45px;
	margin-top: 15px;
}
.btn{
	font-weight: 600;
	color: #fff;
}
</style>

</head>
<body>

	<div class="">
		
		<h3></h3>
	</div>
	<div class="container">

	<div class="logText">
		<h4>Sell Form</h4>
	</div>
	<hr />
	<form action="sellForm.php" method="POST">
		<div class="row">
			<div  class="col-sm-6">
				<span class = "form-control" name="date" value="<?php echo date("d, F, Y");  ?>"><?php echo date("d, F, Y");  ?></span>.
			</div>
			<div class="col-sm-6">
				<input type="text" class = "form-control" name="customerName" placeholder="Customer's Name">
			</div>

		</div>
		<br>
			<input type="text" class = "form-control" name="customerAddress" placeholder="Enter Customer's Address"><br>
		<div class="row">
			<div  class="col-sm-6">
				<input type="number" class = "form-control" name="mobile" placeholder="Phone Number">
			</div>
		<br>
	
			<div  class="col-sm-6">
				<select  class = "form-control" name="item";>
					<option value="pick">Select Item</option> 
	 <?php 
        $sql = "SELECT * FROM items";
        $rs = $mysqli->query($sql) or die($mysqli->error.__LINE__);
        while($row = mysqli_fetch_assoc($rs)){
        //foreach ($row as $key => $value)
         
        	# code...
        
         ?>

        	
                 <option value="<?php print_r($row['productName'].'-'.'N'.$row['unitPrice']);?>"><?php print_r($row['productName'].'-'.'N'.$row['unitPrice']); ?></option>
            <?php } ?>
				</select>
				
				<!--<input type="text" class = "form-control" name="item" placeholder="Select Item">-->
			</div>
		</div><br>
		<div class="row">
			<div  class="col-sm-6">
				<input type="number" class = "form-control" name="quantity" placeholder="Enter Quantity">
			</div>
		<br>
			<div  class="col-sm-6">
				<input type="number" class="form-control" name="price" placeholder="Price" />
				
			</div>
		</div>
			<br>
			<input type="text" class = "form-control" name="description" placeholder="Description of Goods"><br>
			<input type="number" class = "form-control" name="discount" placeholder="Discount(NGN)"><br>
			
		<div class="row">
			<div  class="col-sm-6">	
				<input type="number" class = "form-control" name="cashPay" placeholder="Cash Paid In NGN">
			</div><br>
			<div  class="col-sm-6">	

				<select type="text" class = "form-control" name="payMethod" >
					<OPTION>Payment Method</OPTION>
					<option value="Cash">Cash</option>
					<option value="Bank Transfer">Bank Transfer</option>
					<option value="POS">POS</option>
				</select>
			</div>
		</div>
						
		<br>
			<button class="btn btn-warning form-control" name="submit">Submit</button>
	</form>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</div>
</body>
</html>