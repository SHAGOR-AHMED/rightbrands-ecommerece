<br />
<?php
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
	}
	//select data from friends table
	$sql = "select * from `blog` order by `id` desc";
	$data = mysql_query($sql);
	if(!$data){
		die('Data query failed:' . mysql_error());
	}
?>
<?php
	while($row = mysql_fetch_assoc($data)){ ?>
	<ul>
		<center><li bgcolor="#fff" align="center"><img src="admin/image_upload/blog_image/<?php echo $row['photo']; ?>" height="250px" width="500px" /></li></center>
		<li bgcolor="#fff"><?php echo '<font color="#ED7D22">'.'<h2>'.$row['blog_title'].'</h2>'.'</font>'; ?></li>
		<li bgcolor="#fff"><?php echo '<font color="#000000">'.$row['blog_details'].'</font>'; ?></li>
	</ul>
<?php } ?>
<script>
	function chk() {
		var con = confirm('Are you sure ?');
		if (con) {
			return true;
		} else {
			return false;
		}
	}
</script>