<?php
foreach ($_POST['user'] as $user => $value){ 
                    $user= $_POST['user'][$user];
                    $bfname = $_POST["bfname"][$user];
                    $blname = $_POST["blname"][$user];
                    $bemail = $_POST["bemail"][$user];
                    $bphone = $_POST["bphone"][$user];
                    $baddress = $_POST["baddress"][$user];
                    
                    $up=$con->query("INSERT INTO ipartner SET insurance_id='$cid' , partner_id='$uid'");
                }

if($tr){
                foreach ($_POST['user'] as $user => $value){ 
                    $user= $_POST['user'][$user];
                    $bfname = $_POST["bfname"][$user];
                    $blname = $_POST["blname"][$user];
                    $bemail = $_POST["bemail"][$user];
                    $bphone = $_POST["bphone"][$user];
                    $baddress = $_POST["baddress"][$user];
                    
                    //Updating the beneficiary table
                $bn=$con->query("INSERT INTO beneficiary SET policy='$pol_no', firstname='$bfname', lastname='$blname', email='$bemail', phone_no='$bphone', address='$baddress'");
                }
                
                if($bn){
                    $e="Your policy has been successfully submitted. An email has been sent to you."; 
                    echo  " <script>alert('$e');window.location='viewC.php?policy=$pol_no' </script>";
                    //echo  " <script>alert('$e'); window.location='index.php?insurance_user&comp=$company'</script>";
                }else{
                    $e="Unable to process the beneficiry information"; 
                    echo  " <script>alert('$e'); window.location='policy.php?prd=$prd'</script>";  
                    }

