<?php
/*
include "index.php";
$q = intval($_GET['q']);

$sql="SELECT * FROM plan_setup WHERE plan_id = '".$q."'";
$result = mysqli_query($con,$sql);
$row=$result->fetch_array();
$pre=$row['premium'];
$sum=$row['sum_assured'];
$no = $result->num_rows;

if($no > 0){
echo"
<div class='form-group col-md-6'>
 <label for='exampleInputProductId'>Premium</label>
 <input type='text' name='premium' id='premium' class='form-control' value='$pre' />
 </div>
 <div class='form-group col-md-6'>
     <label for='exampleInputProductId'>Sum Assured</label>
     <input type='text' name='assured' id='assured' class='form-control' value='$sum' />
 </div>
";
}else{
    echo "Premium and Sum assured has not been setup for this product"; 
}

*/


function random_num($size) {
    $length = $size;
    $key = '';
    $keys = range(0, 5);

	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}
        return  $key;
}
$policy= 'AI/'.random_num(5);
echo $policy;

//echo 'AI/'.random_num(5);
?>