<?php

$timezone_offset = +6; // BD central time (gmt+6) for me
$update_date = gmdate('l  j\t\h  F, Y  H:i:s A', time()+$timezone_offset*60*60);
$update_date1 = gmdate('l  j\t\h  F, Y', time()+$timezone_offset*60*60);
?>



  <div id="header">
    <table border="0" width="100%">
      <tbody>
        <tr>
          <td rowspan="2" width="8%"><a href="home.php"><img width="100px" src="../img/logo.jpg" alt="Home"></a></td>
          <td width="43%" align="right"><strong><?php echo "Welcome ". $_SESSION['user']." !";?> | <a href="home.php?logid=logout"> Logout</a></strong></td>
        </tr>
        
      </tbody>
    </table>
  </div>