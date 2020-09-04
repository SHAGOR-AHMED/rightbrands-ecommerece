<div class="row">
  <div class="col-sm-12">
    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#slider-carousel" data-slide-to="1"></li>
        <li data-target="#slider-carousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <?php
			$query1=mysql_query("SELECT * FROM slider WHERE slider_id = 1") or die(mysql_error());  
			$asdf1=mysql_fetch_row($query1)
			?>
          <div class="col-sm-6">
            <h1><span>R</span>IGHTBRANDS</h1>
            <h2><?php echo $asdf1[1];?></h2>
            <p><?php echo $asdf1[2];?></p>
            <button type="button" class="btn btn-default get">Get it now</button>
          </div>
          <div class="col-sm-6"><img width="484px" height="441px" src="admin/image/slider/<?php echo $asdf1[3];?>" class="girl img-responsive" alt="" /> <img width="172px" height="172px" src="admin/image/slider/<?php echo $asdf1[4];?>"  class="pricing" alt="" /> </div>
        </div>
        <div class="item">
          <?php
			$query2=mysql_query("SELECT * FROM slider WHERE slider_id = 2") or die(mysql_error());
			$asdf2=mysql_fetch_row($query2)
			?>
          <div class="col-sm-6">
            <h1><span>R</span>IGHTBRANDS</h1>
            <h2><?php echo $asdf2[1];?></h2>
            <p><?php echo $asdf2[2];?></p>
            <button type="button" class="btn btn-default get">Get it now</button>
          </div>
          <div class="col-sm-6"> <img width="484px" height="441px" src="admin/image/slider/<?php echo $asdf2[3];?>" class="girl img-responsive" alt="" /> <img width="172px" height="172px" src="admin/image/slider/<?php echo $asdf2[4];?>"  class="pricing" alt="" /> </div>
        </div>
        <div class="item">
          <?php
			$query3=mysql_query("SELECT * FROM slider WHERE slider_id = 3") or die(mysql_error());
			$asdf3=mysql_fetch_row($query3)
			?>
          <div class="col-sm-6">
            <h1><span>R</span>IGHTBRANDS</h1>
            <h2><?php echo $asdf3[1];?></h2>
            <p><?php echo $asdf3[2];?></p>
            <button type="button" class="btn btn-default get">Get it now</button>
          </div>
          <div class="col-sm-6"> <img width="484px" height="441px" src="admin/image/slider/<?php echo $asdf3[3];?>" class="girl img-responsive" alt="" /> <img width="172px" height="172px" src="admin/image/slider/<?php echo $asdf3[4];?>" class="pricing" alt="" /> </div>
        </div>
      </div>
      <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev"> <i class="fa fa-angle-left"></i> </a> <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next"> <i class="fa fa-angle-right"></i> </a> </div>
  </div>
</div>