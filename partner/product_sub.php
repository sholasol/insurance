<?php 
include_once "index.php";
// Subscribing to an insurance
        if(isset($_POST['rid'])){
                
                
                foreach ($_POST['rid'] as $rid => $value){ 
                    $prd_id= $_POST['rid'][$rid];
                    //$ins= $_POST['ins'][$rid];
                    
                    $nm=$con->query("SELECT insurance_id FROM product_setup WHERE product_id='$prd_id'");
                    $ro=$nm->fetch_array();
                    $ins=$ro['insurance_id'];
                    
                    $chk=$con->query("SELECT count(id) AS id FROM subscription WHERE product_id='$prd_id' AND insurance_id='$ins' AND partner_id='$uid'");
                    $rx=$chk->fetch_array();
                    $count=$rx['id'];
                    if($count < 1){
                        $ins=$con->query("INSERT INTO subscription SET product_id='$prd_id', insurance_id='$ins' , partner_id='$uid', created=now()");
                    }else{}
                    
                }
                if($ins){
                    //$cnt=$con->query("SELECT count(id) AS id FROM subscription WHERE ");
                    $e="Your subscription is successful!";
                    echo  " <script>alert('$e'); window.location='manageProd.php'</script>";
                }else{
                    $e="Subscription failed done!";
		echo  " <script>alert('$e'); window.location='product.php'</script>";
                }
	}
	else{
		?>
		<script>
			window.alert('Please select a product');
			window.location.href='product.php';
                        
                        function subscribeConfirm(){
                            var result = confirm("Are you sure you want to subscribe for the selected products?");
                            if(result){
                                return true;
                            }else{
                                return false;
                            }
                        }
		</script>
		<?php
	}
?>