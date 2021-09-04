<?php 
include_once "index.php";
// Subscribing to an insurance
        if(isset($_POST['rid'])){
                
                
                foreach ($_POST['rid'] as $rid => $value){ 
                    $cid= $_POST['rid'][$rid];
                    $up=$con->query("INSERT INTO ipartner SET insurance_id='$cid' , partner_id='$uid'");
                }
                if($up){
                    $e="Subscription Successfully done!";
                    echo  " <script>alert('$e'); window.location='subscription.php'</script>";
                }else{
                    $e="Subscription failed done!";
		echo  " <script>alert('$e'); window.location='subscribe.php'</script>";
                }
	}
	else{
		?>
		<script>
			window.alert('Please select an Insurance');
			window.location.href='subscribe.php';
		</script>
		<?php
	}
?>