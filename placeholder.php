<?php
	if(isset($_GET['page_id'])){
		$page = $_GET['page_id'];
		if($page==1){
			include('page/home.php');
			}elseif($page==2){
				include('page/discount_product.php');
				}elseif($page==3){
					include('page/product_details.php');
					}elseif($page==4){
						include('page/contact.php');
						}elseif($page==5){
							include('page/checkout.php');
							}elseif($page==6){
								include('page/cart.php');
								}elseif($page==7){
									include('page/login.php');
									}elseif($page==8){
										include('page/blog.php');
										}elseif($page==9){
											include('page/video.php');
											}elseif($page==10){
												include('page/ask_question.php');
												}
		}else{
			include('page/home.php');
			}
?>