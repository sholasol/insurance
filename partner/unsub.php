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
                    
                    $ins=$con->query("DELETE FROM subscription WHERE product_id='$prd_id' AND insurance_id='$ins' AND partner_id='$uid'");
                }
                if($ins){
                    //$cnt=$con->query("SELECT count(id) AS id FROM subscription WHERE ");
                    $e="You have successfully unsubscribed from the selected products!";
                    echo  " <script>alert('$e'); window.location='manageProd.php'</script>";
                }else{
                    $e="Operation Failed!";
		echo  " <script>alert('$e'); window.location='manageProd.php'</script>";
                }
	}
	else{
		?>
		<script>
			window.alert('Please select a product');
			window.location.href='manageProd.php';
                        
                        function subscribeConfirm(){
                            var result = confirm("Are you sure you want to unsubscribe from the selected products?");
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