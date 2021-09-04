<?php 
$usr=$con->query("SELECT count(distinct user_id) AS customer, count(policy) AS policy, sum(premium) AS premium FROM transaction WHERE  partner_id='$user_id'");
$ru=$usr->fetch_array();

$cus=$con->query("SELECT count(claim_id) AS claim FROM  claims WHERE  partner_id='$uid' AND claims.status !='Approved' ");
$r=$cus->fetch_array();
$pcl=$r['claim'];

$comm=$con->query("SELECT sum(commission_value) AS sum FROM commission WHERE partner_id='$uid' AND status='Pending'");
$r=$comm->fetch_array();
$sum= $r['sum'];
?>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel info-box panel-white bodRad">
            <div class="panel-body">
                <div class="info-box-stats">
                    <a href="manageC.php"><p class="counter"><?php echo number_format($ru['customer']); ?></p></a>
                    <span class="info-box-title">
                        Customers |
                        <a href="manageC.php">Active Customers: <?php echo number_format($ru['customer']); ?></a>
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
            </div>
        </div>
    </div>
    
    
    
    
    
    
    <div class="col-lg-3 col-md-6">
        <div class="panel info-box panel-white bodRad">
            <div class="panel-body">
                <div class="info-box-stats">
                    <a href="active.php"><p class="counter"><?php echo number_format($ru['policy']); ?></p></a>
                    <span class="info-box-title">
                        Plocies |
                        <a href="active.php">Active Policies: <?php echo number_format($ru['policy']); ?></a>
                    </span>
                </div>
                <div class="info-box-icon">
                    <i class="icon-briefcase"></i>
                </div>
                <div class="info-box-progress">
                    <div class="progress progress-xs progress-squared bs-n">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="col-lg-3 col-md-6">
        <div class="panel info-box panel-white bodRad">
            <div class="panel-body">
                <div class="info-box-stats">
                    <a href="commission.php">  <p>#<span class="counter"><?php echo number_format($sum); ?></span></p></a>
                    <a href="commission.php"> <span class="info-box-title">Total Commission</span></a>
                </div>
                <div class="info-box-icon">
                    <i class="fa fa-calculator"></i>
                </div>
                <div class="info-box-progress">
                    <div class="progress progress-xs progress-squared bs-n">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel info-box panel-white bodRad">
            <div class="panel-body">
                <div class="info-box-stats">
                    <a href="pclaim.php"> <p class="counter"><?php echo number_format($pcl); ?></p></a>
                    <span class="info-box-title">
                        Claims |
                        <a href="pclaim.php">Pending Claims: <?php echo number_format($pcl); ?></a>
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
            </div>
        </div>
    </div>   
    
</div><!-- Row -->