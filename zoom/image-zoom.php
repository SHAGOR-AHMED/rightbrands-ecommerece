<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="zoom/css/reset.css">
<link rel="stylesheet" type="text/css" href="zoom/css/jquery-picZoomer.css">
    <!--This below file will need for indivisual working-->
    <!--<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>-->
    <script type="text/javascript" src="zoom/src/jquery.picZoomer.js"></script>
    <script type="text/javascript">
        $(function() {
            $('.picZoomer').picZoomer();
            $('.piclist li').on('click',function(event){
                var $pic = $(this).find('img');
                $('.picZoomer-pic').attr('src',$pic.attr('src'));
            });
        });
    </script>
    <div class="picZoomer">
        <img src="admin/image/product/<?php echo $img5[0];?>" height="320" width="320" alt="">
    </div>
    <ul class="piclist">
    <?php 
	$imgquery=mysql_query("SELECT image.image_name FROM image INNER JOIN product ON image.image_prodid = product.prod_id WHERE image.image_prodid ='".$product_detail_id."'");
	while($img6 = mysql_fetch_row($imgquery))
	{
	?>
        <li><img src="admin/image/product/<?php echo $img6[0];?>" alt=""></li>
        <?php
	}
		?>

    
    </ul>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
