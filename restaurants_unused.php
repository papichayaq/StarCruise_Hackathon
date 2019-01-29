<html>
<head>
  <script src="js/css.js"></script>
  <script type="text/javascript" src="js/nouislider.min.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/restaurants.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/nouislider/nouislider.min.css" />
</head>
<body>
  <?php include_once("navbar.php"); ?>
  <div id="wrapper" class="container" style="width:70%;">
    <section class="col-lg-12 col-xs-12 col-sm-12 col-md-12 page-header">
      <div class="row">
    		<form class="form-horizontal col-lg-4 col-md-12 col-sm-12 col-xs-12" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;">
  				<input id="searchbox" name="searchbox" type="text" class="form-control" placeholder="Search by name..." autocomplete="off"/>
    		</form>
        <form id="filter1" class="btn-group col-lg-4 col-md-6 col-sm-6 col-xs-6" data-toggle="buttons">
          <label class="btn btn-success">
            <input type="checkbox" name="foodprefs[]" value="01"><span id="long">Thai</span><span id="short">&#x1F1F9;&#x1F1ED;</span>
          </label>
          <label class="btn btn-warning">
            <input type="checkbox" name="foodprefs[]" value="02"><span id="long">Japanese</span><span id="short">&#x1F1EF;&#x1F1F5;</span>
          </label>
          <label class="btn btn-danger">
            <input type="checkbox" name="foodprefs[]" value="03"><span id="long">Chinese</span><span id="short">&#x1F1E8;&#x1F1F3;</span>
          </label>
          <label class="btn btn-primary">
            <input type="checkbox" name="foodprefs[]" value="04"><span id="long">European</span><span id="short">&#x1F1EA;&#x1F1FA;</span>
          </label>
        </form>
        <form id="filter2" class="btn-group col-lg-4 col-md-6 col-sm-6 col-xs-6" data-toggle="buttons">
          <label class="btn btn-default">
            <input type="checkbox" name="foodprefs[]" value="11"><span id="long">Single Dish</span><span id="short">&#x1F35A;</span>
          </label>
          <label class="btn btn-default">
            <input type="checkbox" name="foodprefs[]" value="12"><span id="long">Set Menu</span><span id="short">&#x1F371;</span>
          </label>
          <label class="btn btn-default">
            <input type="checkbox" name="foodprefs[]" value="13"><span id="long">Buffet</span><span id="short">&#x1F374;</span>
          </label>
        </form>
    	</div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div id="slider"></div>
        </div>
      </div>
    </section>
     <section class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
       <div class="populated">
         <?php
           include_once("dbconnect.php");
           mysqli_query($con, "CREATE TABLE IF NOT EXISTS restaurant (
             RestaurantID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
             Name varchar(255) NOT NULL UNIQUE,
             MinPrice int NOT NULL,
             MaxPrice int,
             Location varchar(255) NOT NULL,
             Type varchar(255) NOT NULL,
             OpenTime double NOT NULL,
             CloseTime double NOT NULL,
             Promotion varchar(255),
             Description text);
           ");
           include_once('restaurants-top-search.php');
         ?>
       </div>
       <div class="tablesearch">
       </div>
 	   </section>
  </div>
  <script type="text/javascript" src="js/shared-trigger.js"></script>
  <script type="text/javascript" src="js/slider.js"></script>
  <script type="text/javascript" src="js/triggers.js"></script>
</body>
</html>
