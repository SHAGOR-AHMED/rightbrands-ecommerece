<br />
<table class="mytable" cellspacing="1" width="100%" border="1" align="center">
	<tr>
		<th>SN</th>
		<th>Title</th>
		<th>Description</th>
		<th>Main Image</th>
		<th>Discount Image</th>
		<th>Action</th>
	</tr>
	<?php
		$query=mysql_query("SELECT * FROM slider");
		while($abc=mysql_fetch_assoc($query)){
			extract($abc);
		?>
		<tr>
			<td><?php echo $slider_id; ?></td>
			<td><?php echo $slider_title; ?></td>
			<td><?php echo $slider_desc; ?></td>
			<td><img width="50px"  height="50px" src="image/slider/<?php echo $image; ?>" /></td>
			<td><img width="50px"  height="50px" src="image/slider/<?php echo $discount_image; ?>" /></td>
			<td><a href="home.php?area=page&&action=slider_edit&&edit_id=<?php echo $slider_id; ?>">Edit</a></td>
		</tr>
		<?php } ?>
		
</table><br />