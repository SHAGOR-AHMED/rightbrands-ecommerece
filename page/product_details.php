<script type="text/javascript">
	function validate(){
		
	   if( document.addtocart.product_quantity.value == "" )
	   {
		 alert( "Please add Quantity!" );
		 return false;
	   }
	   return( true );
	}
</script>
<?php 
	//echo @$_GET['details_id'];
	@$product_detail_id=$_GET['details_id'];

	$query=mysql_query("SELECT * FROM product WHERE prod_id='$product_detail_id'") or die(mysql_error());
	$rows=mysql_fetch_assoc($query);
	/* echo '<pre>';
	print_r($rows);
	echo '</pre>';
	exit(); */
	extract($rows);	

	$imgquery=mysql_query("SELECT image.image_name, image.image_id FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$product_detail_id."'");
	$img5 = mysql_fetch_row($imgquery);
?>

<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
		<?php include('zoom/image-zoom.php'); ?>
    </div>
		
    <div class="col-sm-7">
		<form name="addtocart" action="" method="post" onsubmit="return(validate());">
			<div class="product-information"><!--/product-information--> 
				<img alt="" class="newarrival" src="images/product-details/new.jpg">
				<h2><?php echo $prod_name; ?></h2>
				<h3><?php echo 'Product Code :'.' '.$rows['prod_code']; ?></h3>

				<span>
					<span style="font-size:18px; margin-top:5px;"><?php echo $prod_price." TK"; ?></span>
					<span style="font-size:15px; margin-top:7px; color:red;">Quantity:
					<input type="text" name="product_quantity" id="product_quantity" />
					</span>
					<span style="font-size:15px; margin-top:7px; color:red;">Color:
					<input type="text" name="product_color">
					</span>
					<a href=""><button class="btn btn-fefault cart" name="submit" type="submit">
						<i class="fa fa-shopping-cart"></i> Add to cart</button>
					</a>
				</span>
		</form>
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b> RIGHTBRANDS</p><br/>
				<a href=""><img alt="" class="share img-responsive" src="images/product-details/right.png">&nbsp;&nbsp;&nbsp;&nbsp; +88018xxxxxx</a> 
			</div>
      <!--/product-information--> 
    </div>
</div>

  <div style="width:350px;line-height:30px;" class="recommended_items"><!--recommended_items-->
	<h3><b>Product Details:</b></h3><br>
	<?php 
		echo $rows['prod_desc'];
		//print_r(explode(".",$rows['prod_desc']));
	?>
  </div>
<?php 
	if(isset($_REQUEST['submit'])){
		
		extract($_REQUEST);
		
		$sql="INSERT INTO temp_order VALUES(
											'',
											now(),
											'".session_id()."',
											$product_detail_id,
											$product_quantity,
											$img5[1],
											$prod_price*$product_quantity					
											)";


		mysql_query($sql);
		/* print_r($sql);exit(); */
		header("location: index.php?page_id=6");
	}
?>