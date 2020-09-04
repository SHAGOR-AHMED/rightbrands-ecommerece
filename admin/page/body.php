<br />
<?php //error_reporting(0); ?>
<table class="mytable" cellspacing="1" width="100%" border="1" align="center">

  <tr>
    <th width="4%">Order ID</th>
    <th width="11%">Date</th>
    <th width="14%">Buyer Name</th>
    <th width="24%">Address</th>
    <th width="11%">Phone</th>
    <th width="15%">Email</th>
    <th width="17%">payment method</th>
    <th width="17%">customer_message</th>
    <th width="10%">Amount</th>
    <th width="9%">Details</th>
  </tr>
  <?php
 	$sql1="SELECT * FROM `order` WHERE status='1' ORDER BY 1 DESC";
	$query1=mysql_query($sql1);
  	while($abc1=mysql_fetch_row($query1)){
		
		$sql2="SELECT * FROM `customer` WHERE customer_id=$abc1[2]";
		$query2=mysql_query($sql2);
		$abc2=mysql_fetch_assoc($query2);
		extract($abc2);
  ?>	
  <tr>
    <td><?php echo $abc1[0];?></td>
    <td><?php echo date("d M, Y, g:i A",strtotime($abc1[1]));?></td>
    <td><?php echo $customer_name;?></td>
    <td><?php echo $customer_address;?></td>
    <td><?php echo $customer_phone;?></td>
    <td><?php echo $customer_user;?></td>
    <td><?php echo $customer_method;?></td>
    <td><?php echo $customer_message;?></td>
    <td><?php echo $abc1[3];?></td>
     <td><a href="home.php?area=page&&action=view_order&&orderid=<?php echo $abc1[0];?>">VIEW</a></td>
  </tr>
  <?php
  }
  ?>
  </table>
  <br />