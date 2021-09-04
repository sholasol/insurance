<?php 
//$usr=$con->query("SELECT count(distinct user_id) AS customer, count(policy) AS policy, sum(premium) AS premium FROM transaction WHERE insurance_id='$i_id' AND  status !='Renewed'");
$p=0;
$pr=0;
$cs=0;
$usr=$con->query("SELECT * FROM users, transaction WHERE users.user_id = transaction.user_id AND transaction.insurance_id='$i_id' AND transaction.status !='Terminated' GROUP BY users.user_id");

while($ru=$usr->fetch_array()){
    $id=$ru['user_id'];

    $cnt=$con->query("SELECT count(transaction_id) AS customer,  sum(premium) AS premium, count(policy) AS policy FROM transaction WHERE user_id='$id' AND insurance_id='$i_id' AND status !='Renewed'");
    $ro=$cnt->fetch_array();
    $pol=$ro['policy'];
    $pr +=$ro['premium'];
    $p += $pol;
    $cs +=$ro['customer'];
}
//$ru=$usr->fetch_array();

$cus=$con->query("SELECT count(policy) AS policy FROM transaction WHERE insurance_id='$i_id' AND status ='Terminated'");
$rr=$cus->fetch_array();
 $nub = $rr['policy'];
 
 $cust=$con->query("SELECT count(distinct user_id) AS user FROM transaction WHERE insurance_id='$i_id' AND DATEDIFF(end_date, CURDATE()) BETWEEN 0 AND 60");
$rx=$cust->fetch_array();
 $nubb = $rx['user'];
?>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel info-box panel-white bodRad">
            <div class="panel-body">
                <div class="info-box-stats">
                    <a href="manageC.php"> <p class="counter"><?php echo number_format($cs); ?></p></a>
                    <span class="info-box-title">
                        Customers |
                        <a href="manageC.php">Active Customers: <?php echo number_format($cs); ?></a>
                    </span>
                </div>
                <div class="info-box-icon">
                    <i class="icon-users"></i>
                </div>
                <div class="info-box-progress">
                    <div class="progress progress-xs progress-squared bs-n">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                </div>
                
                
                <hr/>
                <div class="info-box-stats">
                    <p class="counter"><?php  echo number_format($nubb); ?></p>
                    <span class="info-box-title">
                        <a href="expiring.php">Customers with Expiring Policies:  <?php  echo number_format($nubb); ?></a>
                    </span>
                </div>
                <div class="info-box-icon">
                    <i class="icon-list"></i>
                </div>
                
                
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    
    <div class="col-lg-3 col-md-6">
        <div class="panel info-box panel-white bodRad">
            <div class="panel-body">
                <div class="info-box-stats">
                    <a href="manageC.php"> <p><span class="counter"><?php echo number_format($p); ?></span></p></a>
                    <span class="info-box-title">
                        Policy |
                        <a href="manageC.php">Active Policy: <?php echo number_format($p); ?></a>
                    </span>
                </div>
                <div class="info-box-icon">
                    <i class="icon-briefcase"></i>
                </div>
                <div class="info-box-progress">
                    <div class="progress progress-xs progress-squared bs-n">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                </div>
                
                
                <hr/>
                
                <div class="info-box-stats">
                    <a href="expire.php"><p><span class="counter"><?php  echo number_format($nub); ?></span></p></a>
                    <span class="info-box-title">
                        Policy |
                        <a href="expire.php">Inactive Policies: <?php  echo number_format($nub); ?></a>
                    </span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-exclamation-circle"></i>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    <div class="col-lg-3 col-md-6">
        <div class="panel info-box panel-white bodRad">
            <div class="panel-body">
                <div class="info-box-stats">
                    <p><small>=N=</small> <span class="counter"><?php echo number_format($pr); ?></span></p>
                    <span class="info-box-title">Total Premium (<?php echo date('Y'); ?>)</span>
                </div>
                <div class="info-box-icon">
                    <i class="icon-basket"></i>
                </div>
                <div class="info-box-progress">
                    <div class="progress progress-xs progress-squared bs-n">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                </div>
                
                
                <hr/>
                
                <div class="info-box-stats">
                    <a href="report.php"> <p><span class="counter">0 <?php // echo number_format($ru['premium']); ?></span></p></a>
                    <span class="info-box-title">Report</span>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-bar-chart"></i>
                </div>
            </div>
        </div>
    </div>
    <?php 
    $cl=$con->query("SELECT count(claim_id) AS claim FROM  claims WHERE  insurance_id='$i_id' AND status !='Approved'");
    $ro=$cl->fetch_array();
    $clm=$ro['claim'];
    
    $cll=$con->query("SELECT count(claim_id) AS claim FROM  claims WHERE  insurance_id='$i_id' AND status ='Pending'");
    $ro1=$cll->fetch_array();
    $clm2=$ro1['claim'];
    ?>
    <div class="col-lg-3 col-md-6">
        <div class="panel info-box panel-white bodRad">
            <div class="panel-body">
                <div class="info-box-stats">
                    <a href="claim.php"> <p class="counter"><?php echo $clm; ?></p></a>
                    <span class="info-box-title">
                        Claims |
                        <a href="claim.php">Processing Claims:  <?php echo $clm; ?></a>
                    </span>
                </div>
                <div class="info-box-icon">
                    <i class="icon-credit-card"></i>
                </div>
                <div class="info-box-progress">
                    <div class="progress progress-xs progress-squared bs-n">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                </div>
                
                
                <hr/>
                <div class="info-box-stats">
                    <p class="counter"><?php echo $clm2; ?></p>
                    <span class="info-box-title">
                        Customer |
                        <a href="">Pending Claims: <?php echo $clm2; ?></a>
                    </span>
                </div>
                <div class="info-box-icon">
                    <i class="icon-check"></i>
                </div>
            </div>
        </div>
    </div>   
    
</div><!-- Row -->