<html>
<head>
  <script src="js/css.js"></script>
  <script type='text/javascript' src='js/jquery.mousewheel.min.js'></script>
  <script type="text/javascript" src="js/jquery.nicescroll.js"></script>
</head>
<body>
  <?php include_once("navbar.php"); ?>
  <div id="recommend" class="modal"></div>
  <link rel="stylesheet" type="text/css" href="assets/css/index.css" />

  <div class="container container-table text-center">
    <div class="row vertical-center-row">
      <button class="random_eat_button">
        <div id="random_label">Where to eat?</div>
      </button>
    </div>
  </div>

  <div id="bottombar-wrapper" class="navbar-fixed-bottom">
    <div id="bottombar">
      <?php
        include_once("dbconnect.php");
        $result = mysqli_query($con, "select * from review order by ReviewID desc limit 5");
        while ($rev = mysqli_fetch_assoc($result)) { ?>
          <a href=view-review.php?id=<?php echo $rev['ReviewID'] ?>>
            <div class="text">
              <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12" id="img-container">
                  <img class="thumbnail" id="latest-review-img" src=<?php echo getrevimage($con, $rev) ?> onerror="imgerror(this);" />
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12" id="img-caption">
                  <h3 class="hidden-md hidden-sm hidden-xs"><?php echo $rev['Title'] ?></h3>
                  <h3>@<?php echo mysqli_fetch_assoc(mysqli_query($con, 'select * from restaurant where RestaurantID = ' . $rev['RestaurantID'] . ' LIMIT 1'))['Name'] ?></h3>
                  <p>By <?php echo mysqli_fetch_assoc(mysqli_query($con, 'select * from user where UserID = ' . $rev['UserID'] . ' LIMIT 1'))['Username'] ?></p>
                  <p><?php echo $rev['ReviewDate'] ?></p>
                </div>
              </div>
            </div>
          </a>
        <?php } ?>
    </div>
  </div>

</body>
<script src="js/index.js"></script>
</html>
