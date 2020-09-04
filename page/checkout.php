<?php
if(isset($_REQUEST['submit_existing']))
{
	extract($_REQUEST);
	
	$query8=mysql_query("SELECT * FROM customer WHERE customer_user='$email_existing' AND customer_password='$password_existing'") or die(mysql_error());
	
	$custiden=mysql_fetch_row($query8);
		
	if(mysql_num_rows($query8)==1){
		
		//echo '<span style="color:red">Login Successfully!</span>';	
	
	$sql8="INSERT INTO `right_brands`.`order` (
											`order_id` ,
											`order_date` ,
											`order_custid` ,
											`order_totalamount` ,
											`status`
											)
											VALUES (
													'' , 
													now(), 
													'".$custiden[0]."', 
													'".$_GET['total_amount']."', 
													1
													)";
	
		mysql_query($sql8);
		
		
		//$sql9="SELECT order_id FROM `order` ORDER BY order_id DESC";
		$sql9="SELECT * FROM `order` ORDER BY order_id DESC";
		$query9=mysql_query($sql9);
		$ord=mysql_fetch_row($query9);
		
		
		$sql10="SELECT * FROM temp_order WHERE temporder_session_id='".session_id()."'";
		$query10=mysql_query($sql10);
		while($fetchTempData=mysql_fetch_row($query10))
		{
	
		$sql11="INSERT INTO `order_detail` (
									`orderdetail_id`, 
									`orderdetail_orderid`, 
									`orderdetail_temporderprodid`, 
									`orderdetail_productquantity`, 
									`orderdetail_temporderimageid`, 
									`orderdetail_tempordersubtotal`,
									`orderdetail_customarid`
									) VALUES
											(
											'', 
											'".$ord[0]."',
											'".$fetchTempData[3]."',
											'".$fetchTempData[4]."',
											'".$fetchTempData[5]."',
											'".$fetchTempData[6]."',
											'".$ord[2]."'
											)";	
		mysql_query($sql11);
	
		}
	
		mysql_query("DELETE FROM `temp_order` WHERE temporder_session_id = '".session_id()."'");	// Deleting all temp data from temp_order rable
		
		//Email Start
		include('page/confirm_mail1.php');
		
		//Email End
		
		echo '<span style="color:red; font-size:16px;">Your order has been placed successfully!</span>';
	
	}
	
	else{	

		echo '<span style="color:red; font-size:16px;">Username or password not valid!</span>';	
	}

}


if(isset($_REQUEST['submit'])){
	
	extract($_REQUEST);
	if($password===$password_confirm){
		
		$sql="INSERT INTO customer VALUES( '', '$name', '$address', '$phone', '$email', '$customer_method', '$customer_message', '$password')";
		//print_r($sql);exit;
		mysql_query($sql);
	
		$sql1="SELECT customer_id FROM customer ORDER BY customer_id DESC";
		$query1=mysql_query($sql1);
		$cust=mysql_fetch_row($query1);
	
		$sql2="INSERT INTO `right_brands`.`order` (
													`order_id` ,
													`order_date` ,
													`order_custid` ,
													`order_totalamount` ,
													`status`
													)
													VALUES (
															'' , 
															now(), 
															'".$cust[0]."',
															'".$_GET['total_amount']."',  
															1
															)";
	
		mysql_query($sql2);
	
		$sql3="SELECT * FROM `order` ORDER BY order_id DESC";
		$query3=mysql_query($sql3);
		$ord=mysql_fetch_row($query3);
	
		$sql4="SELECT * FROM temp_order WHERE temporder_session_id='".session_id()."'";
		$query4=mysql_query($sql4);
		while($fetchTempData=mysql_fetch_row($query4)){
	
		$sql5="INSERT INTO `order_detail` (
									`orderdetail_id`, 
									`orderdetail_orderid`, 
									`orderdetail_temporderprodid`, 
									`orderdetail_productquantity`, 
									`orderdetail_temporderimageid`, 
									`orderdetail_tempordersubtotal`,
									`orderdetail_customarid`
									) VALUES
											(
											'', 
											'".$ord[0]."',
											'".$fetchTempData[3]."',
											'".$fetchTempData[4]."',
											'".$fetchTempData[5]."',
											'".$fetchTempData[6]."',
											'".$ord[2]."'
											)";	
		mysql_query($sql5);
	
		}
	
		mysql_query("DELETE FROM `temp_order` WHERE temporder_session_id = '".session_id()."'");// Deleting all temp data from temp_order table
		include('page/confirm_mail2.php');
		
		echo '<span style="color:red; font-size:16px;">Your order has been placed successfully!</span>';
		//header('location:index.php');
		
	}else{
		
		echo '<span style="color:red; font-size:16px;">Password and Confirm Password did not match!</span>';
	}
	
}

?>
<div class="step-one">
  <h2 class="title text-center">Checkout</h2>
</div>

<div style="margin-bottom:20px;" class="panel-group" id="accordian">
  <div class="panel panel-default">
    <div class="panel-heading">
		<h4 class="panel-title">Already have Rightbrands account ?&nbsp;&nbsp;
			<a data-toggle="collapse" data-parent="#accordian" href="#mens">
				<span style="font-size: 18px;font-weight:700;" class="badge">&nbsp;LOGIN&nbsp;</span>
			</a>
		</h4>
    </div>
    <div id="mens" class="panel-collapse collapse">
      <div class="panel-body"> 
        <!--login form-->
        <div class="row">
          <div class="col-sm-5 col-sm-offset-1">
            <div class="login-form">
              <form action="" method="post">
                <input type="text" name="email_existing" placeholder="Email Address" />
                <input type="password" name="password_existing" placeholder="Password">
                <button type="submit" name="submit_existing" class="btn btn-default">PLACE ORDER</button>
              </form>
            </div>
          </div>
        </div>
        <!--/login form--> 
      </div>
    </div>
  </div>
</div>

<div class="step-one">
  <h2 class="title text-center">OR fill the Information form below-</h2>
  <hr />
</div>
<div class="shopper-informations">
  <div class="row">
    <div class="col-sm-6">
      <div class="shopper-info">
        <p>Your Information</p>
        <form name="" action="" method="post">
          <input type="text" name="name" placeholder="Name *" required>
          <div style="margin-bottom:10px;">
		  <textarea name="address"  rows="6" placeholder="Address *" required></textarea><br />
		  </div>
          <input name="phone" placeholder="Phone *" required>
		  <div style="margin-bottom:10px;">
          <select name="customer_method">
          		<option>Select payment method</option>
          		<option value="bkash">bKash</option>
                <option value="cash">Cash on delivery</option>
          </select>
		  </div>
          <div style="margin-bottom:10px;">
		  <textarea name="customer_message"  rows="6" placeholder="Customer message *" required></textarea><br />
		  </div>
          <input name="email" type="email" placeholder="Email Address *" required>
          <input name="password" type="password" placeholder="Password" required>
          <input name="password_confirm" type="password" placeholder="Confirm password">
		  <button style="margin-left:0px" class="btn btn-fefault cart" name="submit" type="submit">PLACE ORDER</button>
        </form>
        </div>
    </div>
    <div class="col-sm-6 clearfix">
      <div class="bill-to">
        <p>Product Delivery Information</p>
        <div class="form-one">
			------------------------------------
			Features:<br/>
			✔ 100% Original Korean<br/>
			✔ Excellent Quality<br/>
			✔ Deoproce Worldwide Brand<br/>
			✔ Manufactured by Green Cos.<br/>
			✔ Imported by Benkorea Co.,Ltd<br/>
			------------------------------------<br/>
			To Order,<br/>
			please Inbox us :<br/>
			1. Your contact number<br/>
			2. Your address in details<br/>
			3. Product code<br/>

			[We will contact with you after getting your message]
			------------------------------------
			<br/>or Call : 01519191919
			------------------------------------
        </div>
        <div class="form-two">
          <!--<form>
            <input type="text" placeholder="Zip / Postal Code *" disabled>
            <select disabled>
              <option>-- Country --</option>
              <option>United States</option>
              <option>Bangladesh</option>
              <!--<option>UK</option>
              <option>India</option>
              <option>Pakistan</option>
              <option>Ucrane</option>
              <option>Canada</option>
              <option>Dubai</option>
            </select>
            <input type="text" placeholder="City" disabled>
            <input type="text" placeholder="Mobile Phone" disabled>
          </form>-->
        </div>
      </div>
    </div>
   <!--<div class="col-sm-4">
      <div class="order-message">
        <p>Shipping Order</p>
        <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
        <label>
          <input type="checkbox">
          Shipping to bill address</label>
      </div>
    </div>--> 
  </div>
</div>
<div class="review-payment">
  <h2>Review For Payment</h2>
</div>
<div class="table-responsive cart_info">
  <h2 class="title text-center">Cart</h2>
  <table class="table table-condensed">
    <thead style="font-weight:bold">
      <tr class="cart_menu">
        <td class="image">Item</td>
        <td class="code">Product Code</td>
        <td class="price">Price</td>
        <td class="quantity">Quantity</td>
        <td class="total">Total</td>
      </tr>
    </thead>
    <tbody>
<?php
$total=0;
$sql6="SELECT * FROM temp_order WHERE temporder_session_id = '".session_id()."'";

$query6=mysql_query($sql6);

while($new=mysql_fetch_row($query6))
	{
	
	$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$new[3]."'");
	$img5 = mysql_fetch_row($imgquery);
	
	$sql7="SELECT * FROM product WHERE prod_id = $new[3]";
	$query7=mysql_query($sql7);
	$abc3=mysql_fetch_assoc($query7);
	
	?>
      <tr>
        <td class="cart_product"><img src="admin/image/product/<?php echo $img5[0];?>" height="100" width="100" alt=""></td>
        <td class="cart_description"><h4><?php echo $abc3['prod_name'];?></h4>
         <?php echo 'Product Code :'.' '.$abc3['prod_code']; ?></td>
          
        <td class="cart_price"><p><?php echo $abc3['prod_price']." TK";?></p></td>
        <td class="cart_quantity"><div class="cart_quantity_button">
            <p><?php echo $new[4]; ?></p>
          </div></td>
        <td class="cart_total"><p class="cart_total_price"><?php echo $new[6]." TK";?></p></td>
      </tr>
      <?php
		$total=$total+$new[6];
        } // Final Loop
	  ?>
    </tbody>
  </table>
</div>
<div class="col-sm-6 pull-right">
  <table class="table table-condensed total-result">
    <tr>
      <td>Cart Sub Total</td>
      <td><?php echo $total." TK"?></td>
    </tr>
    <tr>
      <td>Tax</td>
      <td><?php echo "0 TK"?></td>
    </tr>
    <tr class="shipping-cost">
      <td>Shipping Cost</td>
      <td>Free</td>
    </tr>
    <tr>
      <td>Total</td>
      <td><span><?php echo $total." TK"?></span></td>
    </tr>
  </table>
</div>


