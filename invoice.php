<?php session_start(); ?>
<?php 
    //connect to db crud and select all records from 'items' table
    $mysqli = new mysqli('localhost', 'root', '', 'webims') or die(mysqli_error($mysqli).mysql_errno());




    ?>
    


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WEBIMS: Print Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    
   <!-- <link rel="stylesheet" type="text/css" href="style4.css">-->

    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

.th{
    font-weight: 600;
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}

    </style>

    
</head>
<body>
    <!-- Javascript code for printing-->    
    
<!--connect form handler process.php -->

<div class="container">
    
<div id="invoice">

    <div class="toolbar">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info" onclick="printPage();"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info" onclick="printPage()><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="index.php">
                            <img src="assets/images/barmo.png"/>
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="index.php">
                            Address:
                            </a>
                        </h2>
                        <div>53 Katsina Road, Dutsen-Reme, Funtua</div>
                        <div>081- 35 36 37 78</div>
                        <div>barmoent@gmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to" name ="customerName"><?php echo $_SESSION['customerName'];?></h2>
                        <div class="address" name="address"><?php echo $_SESSION['customerAddress'];?>.</div>
                        <div class="text" name="phone"><?php echo $_SESSION['mobile'];?></div>
                    </div>
                    <div class="col invoice-details">
                        <h2 class="invoice-id">INVOICE NO:<?php echo $_SESSION['invoiceId'];?></h2>
                        <div class="date">Date of Invoice: <?php echo $_SESSION['date1'];?></div>
                     <!--   <div class="date">Due Date: 30/10/2018</div> -->
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr class="th">
                            <th>QTY</th>
                            <th class="text-left">ITEM</th>
                            <th class="text-right">DESCRIPTION</th>
                            <th class="text-right">PRICE</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <td class="qty" name="qty"><?php echo $_SESSION['quantity']; ?></td>
                            <td class="text-left" name= "item"><h3><?php echo $_SESSION['item'];?></h3></td>
                            <td class="unit" name="description"><?php echo $_SESSION['description'];?></td>
                            <td class="qty" name="price"><?php echo $_SESSION['price'];?></td>
                            <td class="total" name="total"><?php echo $_SESSION['total'];?></td>
                        </tr>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td name ="subtotal"><?php echo $_SESSION['subTotal'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" name="discount">DISCOUNT</td>
                            <td>N<?php echo $_SESSION['discount'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" name="cashPaid">CASH PAID:</td>
                            <td>N<?php echo $_SESSION['cashPaid'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" name="balance">BALANCE: </td>
                            <td><?php echo $_SESSION['balance'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2" name="payMethod">METHOD OF PAYMENT: </td>
                            <td><?php echo $_SESSION['payMethod'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td><?php echo $_SESSION['total']; ?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thanks for your Patronage!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">Any altration on this invoice render it null and void.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
 <div>
</body>
</html>
<script type="text/javascript">
    // $('#printInvoice').click(function(){
       //     Popup($('.invoice')[0].outerHTML);
        function printPage() 
            {
                window.print();
               // return true;
            }
        //);
</script>

