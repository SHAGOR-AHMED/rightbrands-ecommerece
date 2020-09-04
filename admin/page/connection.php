<?php

//mysql_connect("10.34.46.6","right-brands","N;}9=wnDzB{B") or die(mysql_error());


mysql_connect("localhost","root","") or die(mysql_error());

mysql_select_db("right_brands") or die(mysql_error());
mysql_query('SET CHARACTER SET utf8');
mysql_query("SET SESSION collation_connection ='utf8_general_ci'"); 


function MakeCBOEx($query,$name="spCombo",$sel="",$tabindex="",$Style="",$Extra="",$Caption="")	{
		$rs=mysql_query($query);
		print "\n<select name=\"$name\" TabIndex=\"$tabindex\" $Style $Extra>\n";
		print "\n\t<option>$Caption</option>\n";
		while(list($id,$val)=mysql_fetch_row($rs))	{
			if (strcmp($id,$sel)==0 && $sel != "")
				print "\t<option value=\"".trim(stripslashes($id))."\" selected >".trim(stripslashes($val))."&nbsp;</option>\n";
			else
				print "\t<option value=\"".trim(stripslashes($id))."\" >".trim(stripslashes($val))."&nbsp;</option>\n";
		}
		print "</select>\n";
	}
?>