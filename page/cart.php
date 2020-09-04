<?php
	if(isset($_REQUEST['del_id'])){
		$del_id=$_REQUEST['del_id'];
		mysql_query("DELETE FROM temp_order WHERE temporder_id=$del_id") or die(mysql_error());
		echo "&nbsp;Deleted Successfully";
	}
?>

<div class="table-responsive cart_info">
  <h2 class="title text-center">Cart</h2>
  <table class="table table-condensed">
    <thead style="font-weight:bold">
      <tr class="cart_menu">
        <td class="image">Item</td>
        <td class="description">Product Code</td>
        <td class="price">Price</td>
        <td class="quantity">Quantity</td>
        <td class="total">Total</td>
        <td></td>
      </tr>
    </thead>
    <tbody>
	<?php
		$total=0;
		$sql="SELECT * FROM temp_order WHERE temporder_session_id = '".session_id()."'";
		$query=mysql_query($sql);

		while($new=mysql_fetch_row($query)){
		
			$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$new[3]."'");
			$img5 = mysql_fetch_row($imgquery);
			
			$sql3="SELECT * FROM product WHERE prod_id = $new[3]";
			$query1=mysql_query($sql3);
			$abc3=mysql_fetch_assoc($query1);
		
	?>	
	<tr>
		<td class="cart_product"><img src="admin/image/product/<?php echo $img5[0];?>" height="100" width="100" alt=""></td>		
        <td class="cart_description"><h4>
			<?php echo $abc3['prod_name'];?></h4>
			<?php echo 'Product Code :'.' '.$abc3['prod_code']; ?>
		</td>
        <td class="cart_price">
			<p><?php echo $abc3['prod_price']." TK";?></p>
		</td>
        <td class="cart_quantity">
			<div class="cart_quantity_button"> 
				<p><?php echo $new[4]; ?></p>
			</div>
        </td>
        <td class="cart_total">
			<p class="cart_total_price"><?php echo $new[6]." TK";?></p>
		</td>
        <td class="cart_delete">
			<a class="cart_quantity_delete" href="index.php?page_id=6&&del_id=<?php echo $new[0];?>"><i class="fa fa-times"></i></a>
		</td>
    </tr>
	<?php
	  $total=$total+$new[6];
        } // Final Loop
	?>
    </tbody>
  </table>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="total_area">
      <ul>
        <li>Cart Sub Total <span><?php echo $total." TK"?></span></li>
        <li>Tax <span><?php echo "0 TK"?></span></li>
        <li>Shipping Cost <span>Free</span></li>
        <li>Total <span><?php echo $total." TK"?></span></li>
      </ul>
      <a class="btn btn-default update" href="index.php">Add More Product</a>
	  <a class="btn btn-default check_out" href="index.php?page_id=5&&total_amount=<?php echo $total;?>">Check Out</a>
	</div>
  </div>
</div>