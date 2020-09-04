<?php
$to=$custiden[4];
$sub= "Congratulation !";//'Mail From Website Contact Page';
$meg="
<html>
<head>
<title>HTML email</title>
</head>
<body>
<br>
<p>Mail From Rightbrands.net !</p>
<br>
<br>
<table cellpadding='10' width='80%'>
  <tr>
    <td width='12%'>Order ID</td>
    <td width='4%'>:</td>
    <td width='84%'>".$ord[0]."</td>
  </tr>
  <tr>
    <td>Name</td>
    <td>:</td>
    <td>".$custiden[1]."</td>
  </tr>
  <tr>
    <td>Email </td>
    <td>:</td>
    <td>".$custiden[4]."</td>
  </tr>
  <tr>
    <td>Phone</td>
    <td>:</td>
    <td>".$custiden[3]."</td>
  </tr>
  <tr>
    <td>Address</td>
    <td>:</td>
    <td>".$custiden[2]."</td>
  </tr>
</table>
<br>
<br>
<h3>Dear sir, We will contact very soon !</h3>
</body>
</html>
";
$headers  = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: "right-brands" <arif.cse.bstu@gmail.com>' . "\r\n";
@mail($to,$sub,$meg,$headers);
?>