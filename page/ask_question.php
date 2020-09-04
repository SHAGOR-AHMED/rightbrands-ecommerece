<div class="bg">
  <div class="row">
  <div class="col-sm-12">
  	<h2 class="title text-center">Send <strong>Message</strong></h2>
  </div>
    <div class="col-sm-8">
      <div class="contact-form">
        <br/>
        <div class="status alert alert-success" style="display: none"></div>
		<?php
			if(isset($_SESSION['msg'])){
				echo '<i>'.$_SESSION['msg'].'</i>';
				unset ($_SESSION['msg']);
			}
		?>
        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
          <div class="form-group col-md-12">
			<label>Name:</label>
            <input type="text" name="name" class="form-control" required placeholder="Name">
          </div>
          <div class="form-group col-md-12">
			<label>Phone:</label>
            <input type="text" name="phone" class="form-control" required placeholder="Phone Number">
          </div>
		  <div class="form-group col-md-12">
			<label>Email:</label>
            <input type="email" name="email" class="form-control" required placeholder="Should be a valid Email !">
          </div>
          <div class="form-group col-md-12">
			<label>Message:</label>
            <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Your Message Here"></textarea>
          </div>
          <div class="form-group col-md-12">
            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Send Message">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
  if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$mail = $_POST['email'];
	$msg = $_POST['message'];
	
	$sql="insert into `question` (`name`,date,`phone`,`email`,`message`) values ('".$name."',now(),'".$phone."','".$mail."','".$msg."')";

	/* echo '<pre>';
	print_r($sql);
	echo '</pre>';
	exit(); */
	$rst = mysql_query($sql);
	if($rst){
	  $_SESSION['msg'] = "Message Send Successfully !";
	  header('Location:index.php?page_id=10');
	}else{
	 $_SESSION['msg'] = "Failed to Send !";
	 header('Location:index.php?page_id=10');
	}
  }
?>
