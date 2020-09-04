
<div class="row">
	<h2 class="title text-center">Login Form</h2>
  <div class="col-sm-5 col-sm-offset-1">
    <div class="login-form"><!--login form-->
      <h2>Login to your account</h2>
      <form action="" method="post">
        <input type="email" name="umail" value="" placeholder="Email Address" />
        <input type="password" name="upass" value="" placeholder="Password" />
        <button type="submit" name="sub_login" class="btn btn-default">Login</button>
      </form>
    </div>
    <!--/login form--> 
  </div>
</div>
<table class="table table-condensed">
    <thead style="font-weight:bold">
      <tr class="cart_menu">
        <td class="image">Customer Name</td>
        <td class="code">Customer Address</td>
        <td class="price">Customer Phone</td>
        <td class="quantity">Customer Email</td>
        <td class="total">Customer Method</td>
        <td class="total">Customer ID</td>
        <td></td>
      </tr>
    </thead>
    <tbody>
		<?php
		if(isset($_POST['sub_login'])){
			$umail = $_POST['umail'];
			$upass = $_POST['upass'];
			$query8=mysql_query("SELECT * FROM customer WHERE customer_user='$umail' AND customer_password='$upass'") or die(mysql_error());
			$custiden=mysql_fetch_assoc($query8);
		}
			
		?>	
		<tr>		
			<td><?php echo $custiden['customer_name']; ?></td>
			<td><?php echo $custiden['customer_address']; ?></td>
			<td><?php echo $custiden['customer_phone']; ?></td>
			<td><?php echo $custiden['customer_user']; ?></td>
			<td><?php echo $custiden['customer_method']; ?></td>
			<td><?php echo $custiden['customer_id']; ?></td>
		</tr>
    </tbody>
</table>
<hr>
<?php
	$orderquery = "select * from order_detail";
	//$orderquery="SELECT * FROM order_detail WHERE orderdetail_orderid = '".$info['orderdetail_orderid']."'";
	$data = mysql_query($orderquery);
	$info = mysql_fetch_assoc($data);
	//echo $info['orderdetail_orderid'];
	//$_SESSION['']=$info['orderdetail_orderid'];
	//unset($_SESSION['orderid']);
	//exit();
?>

<table class="table table-condensed">
<thead style="font-weight:bold">
  <tr>
	<th>Image</th>
	<th>Product</th>
	<th>Price</th>
	<th>Quantity</th>
	<th>Total</th>
  </tr>
</thead>
<tbody>
  <?php
$total=0;

$sql6="SELECT * FROM order_detail WHERE  orderdetail_customarid = '".$custiden['customer_id']."'";

//$sql6="SELECT * FROM order_detail WHERE orderdetail_orderid ='42'";

$query6=mysql_query($sql6);

while($new=mysql_fetch_row($query6)){

$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$new[2]."'");
$img5 = mysql_fetch_row($imgquery);

$sql7="SELECT * FROM product WHERE prod_id = $new[2]";
$query7=mysql_query($sql7);
$abc3=mysql_fetch_assoc($query7);

?>
  <tr>
	<td class="cart_product"><img src="admin/image/product/<?php echo $img5[0];?>" height="100" width="100" alt=""></td>
	<td class="cart_description"><h4><?php echo $abc3['prod_name'];?></h4>
	  <?php echo 'Product Code :'.' '.$abc3['prod_code']; ?></td>
	<td class="cart_price"><p><?php echo $abc3['prod_price']." TK";?></p></td>
	<td class="cart_quantity"><div class="cart_quantity_button">
		<p><?php echo $new[3]; ?></p>
	  </div></td>
	<td class="cart_total"><p class="cart_total_price"><?php echo $new[5]." TK";?></p></td>
  </tr>
  <?php
  $total=$total+$new[5];
	  } // Final Loop
  ?>
</tbody>
</table>