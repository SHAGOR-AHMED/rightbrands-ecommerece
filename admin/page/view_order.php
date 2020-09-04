<?php
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$sql1="UPDATE `order` SET status = $new_status WHERE order_id = '".$_GET['orderid']."' ";
	mysql_query($sql1);
	$mess= '<span style="color:red; font-size:16px;">Update successfully!</span>';	
}
?>
<div style="margin:3%;">
  <h3 style="color:#4F6B72;">Order ID : <?php echo $_GET['orderid'];?></h3>
  <table class="mytable" cellspacing="1" width="100%" border="0" align="center">
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
$sql6="SELECT * FROM order_detail WHERE orderdetail_orderid = '".$_GET['orderid']."'";

//$sql="SELECT * FROM temp_order WHERE temporder_session_id = 'm8dhcfle9uohtvgeftvj4iqqb6'";

$query6=mysql_query($sql6);

while($new=mysql_fetch_row($query6)){
	$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$new[2]."'");
	$img5 = mysql_fetch_row($imgquery);
	
	$sql7="SELECT * FROM product WHERE prod_id = $new[2]";
	$query7=mysql_query($sql7);
	$abc3=mysql_fetch_assoc($query7);	
?>
      <tr>
        <td class="cart_product"><img src="image/product/<?php echo $img5[0];?>" height="100" width="100" alt=""></td>
        <td class="cart_description"><h4><?php echo $abc3['prod_name'];?></h4>
          <?php echo 'Product Code :'.' '.$abc3['prod_code']; ?>
        </td>
        <td class="cart_price"><p><?php echo $abc3['prod_price']." TK";?></p></td>
        <td class="cart_quantity"><div class="cart_quantity_button">
            <?php /*?><a class="cart_quantity_up" href=""> + </a>
                <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                <a class="cart_quantity_down" href=""> - </a><?php */?>
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
  <br />
  <br />
  <form action="" method="post">
  <table class="mytable" cellspacing="1" width="50%" border="0" align="center">
    <tr>
      <th width="55%">Cart Sub Total</th>
      <td width="45%"><?php echo $total." TK"?></td>
    </tr>
    <tr>
      <th>Tax</th>
      <td><?php echo "0 TK"?></td>
    </tr>
    <tr>
      <th>Shipping Cost</th>
      <td>Free</td>
    </tr>
    <tr>
      <th>Total</th>
      <td><span><?php echo $total." TK"?></span></td>
    </tr>
    <tr>
      <th>Action</th>
      <?php 
	 	$sql2=mysql_query("SELECT status FROM `order` WHERE order_id = '".$_GET['orderid']."'");
	  	$rows=mysql_fetch_assoc($sql2);
	  	extract($rows);
	  	//echo $status;
	  ?>
      <td><select name="new_status">
          <option <?php if($status == 1) echo "selected"; ?> value="1">Delevery Pending</option>
          <option <?php if($status == 2) echo "selected"; ?> value="2">Product Delevered</option>
          <option <?php if($status == 3) echo "selected"; ?> value="3">Cancel Order</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" colspan="2"><input type="submit" name="submit" value="Change" /></td>
    </tr>
    <?php echo @$mess;?>
  </table>
  </form>
</div>