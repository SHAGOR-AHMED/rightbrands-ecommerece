<?php
//echo @$_GET['id'];
@$id=$_GET['id'];
?>
<!--features_items-->
<div class="features_items">
<h2 class="title text-center">Regular Items</h2>
<?php 
if($id){
	$query=mysql_query("SELECT * FROM product WHERE prod_subcatid='$id' LIMIT 0,12");
}else{ 
	$query=mysql_query("SELECT * FROM product ORDER BY RAND() LIMIT 0,12");		// RAND() for randon selection
}
while($abc=mysql_fetch_row($query)){
	$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$abc[0]."'");
	$img = mysql_fetch_row($imgquery);
	?>
	  <div class="col-sm-4">
		<div class="product-image-wrapper">
		  <div class="single-products">
			<div class="productinfo text-center"> <img height="268px" width="349px" src="admin/image/product/<?php echo $img[0];?>" alt="" />
			  <h2><?php echo $abc[4]." TK";?></h2>
			  <p><?php echo $abc[3];?></p>
			  <a href="index.php?page_id=3&&details_id=<?php echo $abc[0];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Show Details </a> </div>
			<div class="product-overlay">
			  <div class="overlay-content">
				<h2><?php echo $abc[4]." TK";?></h2>
				<p><?php echo $abc[3];?></p>
				<a href="index.php?page_id=3&&details_id=<?php echo $abc[0];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>  Show Details </a> </div>
			</div>
		  </div>
		</div>
	  </div>
<?php } ?>
</div>
<!--features_items--> 
<!--Item Scroll Start-->
<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">Discount items</h2>
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
		<div class="item active">
			<?php 
				$query=mysql_query("SELECT * FROM product WHERE status = '2' ORDER BY RAND() LIMIT 0,3");		// RAND() for randon selection
				while($abc=mysql_fetch_row($query)){
					$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$abc[0]."'");
					$img2 = mysql_fetch_row($imgquery);
				?>
				<div class="col-sm-4">
				  <div class="product-image-wrapper">
					<div class="single-products">
					  <div class="productinfo text-center"> <img width="268px" height="134px" src="admin/image/product/<?php echo $img2[0];?>" alt="" />
						<h2><?php echo $abc[4]." TK";?></h2>
						<p><?php echo $abc[3];?></p>
						<a href="index.php?page_id=3&&details_id=<?php echo $abc[0];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Show Details </a> </div>
					</div>
				  </div>
				</div> 
			<?php } ?>
        </div>
      <div class="item">
     <?php 
		$query=mysql_query("SELECT * FROM product WHERE status = '2' ORDER BY RAND() LIMIT 3,3");		// RAND() for randon selection
		while($abc=mysql_fetch_row($query)){
			$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$abc[0]."'");
			$img3 = mysql_fetch_row($imgquery);
			?>
			<div class="col-sm-4">
			  <div class="product-image-wrapper">
				<div class="single-products">
				  <div class="productinfo text-center"> <img width="268px" height="134px" src="admin/image/product/<?php echo $img3[0];?>" alt="" />
					<h2><?php echo $abc[4]." TK";?></h2>
					<p><?php echo $abc[3];?></p>
					<a href="index.php?page_id=3&&details_id=<?php echo $abc[0];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Show Details </a> </div>
				</div>
			  </div>
			</div>
    <?php } ?>        
      </div>
        <div class="item">
        <?php 
			$query=mysql_query("SELECT * FROM product WHERE status = '2' ORDER BY RAND() LIMIT 6,3");		// RAND() for randon selection
			while($abc=mysql_fetch_row($query)){
				$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$abc[0]."'");
				$img4 = mysql_fetch_row($imgquery);
				?>
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center"> <img width="268px" height="134px" src="admin/image/product/<?php echo $img4[0];?>" alt="" />
                        <h2><?php echo $abc[4]." TK";?></h2>
                        <p><?php echo $abc[3];?></p>
                        <a href="index.php?page_id=3&&details_id=<?php echo $abc[0];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Show Details </a> </div>
                    </div>
                  </div>
                </div>
        <?php } ?>        
        </div>        
        <div class="item">
        <?php 
			$query=mysql_query("SELECT * FROM product WHERE status = '2' ORDER BY RAND() LIMIT 6,3");		// RAND() for randon selection
			while($abc=mysql_fetch_row($query)){
				$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$abc[0]."'");
				$img4 = mysql_fetch_row($imgquery);
				?>
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center"> <img width="268px" height="134px" src="admin/image/product/<?php echo $img4[0];?>" alt="" />
                        <h2><?php echo $abc[4]." TK";?></h2>
                        <p><?php echo $abc[3];?></p>
                        <a href="index.php?page_id=3&&details_id=<?php echo $abc[0];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Show Details </a> </div>
                    </div>
                  </div>
                </div>
        <?php } ?>        
        </div>       
    </div>
    <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev"> <i class="fa fa-angle-left"></i> </a> <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next"> <i class="fa fa-angle-right"></i> </a> </div>
</div>