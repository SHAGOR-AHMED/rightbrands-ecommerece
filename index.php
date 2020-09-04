<?php
session_start();
ob_start();
?>
<?php include('admin/page/connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Rightbrands</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="js/jquery-3.1.0.min.js"></script>
</head><!--/head-->
<body>
<div style="position:fixed; right:0px;">
	<a href="index.php?page_id=10"><img src="images/ask-question.png" height="77px" width="97px"/></a>
</div>
<div style="position:fixed; right:1px; top:435px;">
	<a href="tel:1234567890">
		<div style="width:80px; height:75px;background-image:url(images/call.png);background-repeat:no-repeat;"></div>
	</a>
</div>
	<header id="header"><!--header-->
		<!--/header-middle-->
	<?php include('page/header.php');?>
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<?php include('page/menu.php');?>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<?php 
				if(!@$_GET['page_id']){
						include_once('page/slider.php');
						}else{
							echo "<img class='img-responsive' src='images/shop/advertisement.jpg' alt='' />";
							}
			?>
		</div>
	</section><!--/slider-->

	<section id="main_body">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include('page/left_sidebar.php');?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<?php include('placeholder.php');?>
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<?php include('page/footer.php');?>
	</footer><!--/Footer-->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
