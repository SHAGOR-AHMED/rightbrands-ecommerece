<?php
include("connection.php"); 
//print "aaaaaaaaaaaaaaaaaa";
	$action=$_POST["func"];
	$srcText=$_POST["src"];
	
	switch($action)
	{
		case "DIS":
				 print $combo=MakeCBOEx("select subcat_id,subcategory from subcategory WHERE subcat_catid='".$srcText."'","subcategory","","","","","Select Sub Categoty");
						
	}
?> 

