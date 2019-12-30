<?php session_start(); ?>
<?php 


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Project</title>
  <meta name="keywords" content="Inventory Manageme System, web based inventoey, management system .">
  <meta name="description" content="Inventory, stock Management, sell Transactions.">

  <link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div id="content-wrapper">
   <section class="slider slider--bg">
    <div id="myCarousel" class="carousel container slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="item active">
          <div class="carousel-content">
            <div class="">
              <div class="text-center">
                <img class= "carousel-person-image" src="assets/images/inv1.png" alt="">
                <h4>Stock Management</h4>
                <h6></h6>
                <p>Kepping Record of all Stocks without Hassle. </p>
           <!--     <div class="rating">

                  <ul>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                  </ul>
                </div> -->
              </div>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="carousel-content">
            <div class="">
              <div class="text-center">
                <img class="carousel-person-image" src="assets/images/inv5.jpg" alt="">
                <h4>Sells Management</h4>
                <h6></h6>
                <p>Sells Management with all records saved to the database for accounting and future retrieval</p>
               <!-- <div class="rating">
                  <ul>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                  </ul>
                </div>-->
              </div>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="carousel-content">
            <div class="">
              <div class="text-center">
                <img class="carousel-person-image" src="assets/images/inv2.png" alt="">
                <h4>Transactions View/Update</h4>
                <h6>Save and Edit Record via an interactive interface</h6>
                <p></p>

                <!--
                <div class="rating">
                  <ul>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                    <li><i class="material-icons">star</i></li>
                  </ul>
                </div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <div class="">
    <?php include("navbar2.php");?>
  </div>


  <section class="portfolio">
    <div class="container">
      <div class="page-section">

       <!--
        <div class="portfolio__button-group">
          <a class="button button--default" data-filter="all" href="index.php">Home</a>
          <a class="button button--default" data-filter=".category-a" href="add_item.php">Stock Management</a>
          <a class="button button--default" data-filter=".category-b" href="#">Sells Management</a>
          <a class="button button--default" data-filter=".category-c" href="viewItems.php">View/ Update Transactions</a>
          <a class="button button--default" data-filter=".category-d" href="invoice.php">Invoice</a>
          <a class="button button--default" data-filter=".category-d" href="logout.php">Logout</a>
        </div>
      -->
        <div class="row gutters-40">
          <div class="col-md-4">
            <div class="portfolio__single-section mix category-a category-b category-c" data-order="1">
              <img class="portfolio__single-section__image img-responsive" src="assets/images/inv1.png" alt="">
              <div class="portfolio__single-section__overlay">
                <div class="overlay-content">
                  <h4>STOCK</h4>
                  <p>Add Items</p>
                </div>
                <div class="portfolio__single-section__search-icon">
                  <a href="add_item.php"><img src="assets/images/search-icon.png" alt=""></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="portfolio__single-section mix category-a category-c" data-order="2">
              <img class="portfolio__single-section__image img-responsive" src="assets/images/inv5.jpg" alt="">
              <div class="portfolio__single-section__overlay">
                <div class="overlay-content">
                  <h4>SELLS MANAGEMENT</h4>
                  <p>Sells Items</p>
                </div>
                <div class="portfolio__single-section__search-icon">
                  <a href="sellForm.php"><img src="assets/images/search-icon.png" alt=""></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="portfolio__single-section mix category-c" data-order="3">
              <img class="portfolio__single-section__image img-responsive" src="assets/images/inv2.png" alt="">
              <div class="portfolio__single-section__overlay">
                <div class="overlay-content">
                  <h4>TRANSACTIONS</h4>
                  <p>View and Delete Records</p>
                </div>
                <div class="portfolio__single-section__search-icon">
                  <a href="viewItems.php"><img src="assets/images/search-icon.png" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--
        <div class="row gutters-40">
          <div class="col-md-4">
            <div class="portfolio__single-section mix category-b category-d" data-order="4">
              <img class="portfolio__single-section__image img-responsive" src="assets/images/inv_receipt.jpg" alt="">
              <div class="portfolio__single-section__overlay">
                <div class="overlay-content">
                  <h4>INVOICES</h4>
                  <p>View and Print Invoices</p>
                </div>
                <div class="portfolio__single-section__search-icon">
                  <a href="#"><img src="assets/images/search-icon.png" alt=""></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="portfolio__single-section mix category-b category-d" data-order="5">
              <img class="portfolio__single-section__image img-responsive" src="assets/images/portfolio-5.png" alt="">

              <div class="portfolio__single-section__overlay">
                <div class="overlay-content">
                  <h4>Category</h4>
                  <p>Manage Category</p>
                </div>
                <div class="portfolio__single-section__search-icon">
                  <a href="#"><img src="assets/images/search-icon.png" alt=""></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="portfolio__single-section mix category-d" data-order="6">
              <img class="portfolio__single-section__image img-responsive" src="assets/images/portfolio-6.png" alt="">
              <div class="portfolio__single-section__overlay">
                <div class="overlay-content">
                  <h4>Brand</h4>
                  <p>Manage Brands</p>
                </div>
                <div class="portfolio__single-section__search-icon">
                  <a href="#"><img src="assets/images/search-icon.png" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 -->
  <?php include("footer1.php"); ?>

  
</div>

  <script src="assets/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/mixitup.js"></script>

  <script>
    
  </script>
</body>
</html>  
