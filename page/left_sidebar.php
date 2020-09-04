<div class="left-sidebar">
  <h2>Category</h2>
  <div class="panel-group category-products" id="accordian"><!--category-productsr-->
    <?php 
	$sql="SELECT * FROM category";
	$query=mysql_query($sql);
	while($Category=mysql_fetch_row($query)){ ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $Category[1]?>"> <span class="badge pull-right"><i class="fa fa-plus"></i></span> <?php echo $Category[1]?> </a></h4>
      </div>
      <div id="<?php echo $Category[1]?>" class="panel-collapse collapse">
        <div class="panel-body">
          <ul>
            <?php 
            $sql1="SELECT * FROM  subcategory WHERE subcat_catid='".$Category[0]."'";
            $query1=mysql_query($sql1);
            while($SubCategory=mysql_fetch_row($query1)){
            ?>
            <li><a href="index.php?page_id=1&&id=<?php echo $SubCategory[0]?>"><?php echo $SubCategory[2]?> </a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <!--/category-products-->
  <div class="shipping text-center"><!--shipping--> 
    <?php
		$sql="SELECT * FROM `new_mobile` order by `id` desc";
		$query=mysql_query($sql);
		$mobile=mysql_fetch_assoc($query);
	?>
	<?php echo $mobile['title'].'<br>';?>
	<img class="img-responsive" src="admin/image_upload/new_mobile/<?php echo $mobile['photo'];?>" alt="" />
  </div>
  <!--/shipping-->
  <div class="shipping text-center"><!--shipping--> 
    <?php
		$sql="SELECT * FROM `new_cosmetic` order by `id` desc";
		$query=mysql_query($sql);
		$cosmetic=mysql_fetch_assoc($query);
	?>
	<?php echo $cosmetic['title'].'<br>';?>
	<img class="img-responsive" src="admin/image_upload/new_cosmetic/<?php echo $cosmetic['photo'];?>" alt="" />
  </div>
  <!--/shipping--> 
 <div class="shipping text-center" style="float:left; margin-top:8px;">
 </div>
</div>