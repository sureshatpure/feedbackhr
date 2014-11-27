<!DOCTYPE html>
<?php
//echo"<pre>";print_r($_POST);echo"</pre>";
$hdn_grid_row_data_pm = json_decode($_POST['hdn_grid_row_data_pm'],TRUE);
//echo"<pre>";print_r($hdn_grid_row_data_pm);echo"</pre>";
if(isset( $_POST['saverecord']))
{
$ip_address =$_SERVER['REMOTE_ADDR'];

   $date = date('Y-m-d');
  $transactionId      = $_POST['transactionId'];
  $customerFeedbak    = $_POST['customerFeedbak'];
  $answer         = $customerFeedbak;
  if($answer==1){$status = 'SATISFIED';} else{$status = 'DISSATISFIED';};
  $dissatisfactionReason  = $_POST['dissatisfactionReason'];
  $customer_group = $_POST['customer_group'];
  $contactName       = $_POST['contactName'];
  $contactNo       = $_POST['contactName'];
  $customerEmail       = $_POST['contactName'];
  $customerComments       = str_replace("'"," ", $_POST['customerComments']);


  $itemgroup       = $_POST['itemgroup'];
  $collector       = $_POST['collector'];

  $reason_quality       = $_POST['reason_quality'];
  $reason_price_diff       = $_POST['reason_price_diff'];
  $reason_service       = $_POST['reason_service'];
  $reason_notcont_by_exe       = $_POST['reason_notcont_by_exe'];
  $reason_norequirement       = $_POST['reason_norequirement'];
  $others       = $_POST['others'];
  
  
 
    include_once("db/config.php");
   // $conn = pg_connect("host=localhost port=5432 dbname=puredata user=postgres password=postgres123");
        if (!$conn)
        {
          die ("Not able to connect to PostGres --> " . pg_last_error($conn));
        }
        else{
          //echo "Connected sucessfully";


        } 
      //  $feedback = array();

        foreach($hdn_grid_row_data_pm as $key=>$val)
              {
                $feedback[$key]['fbk_customerfeedbak'] =$customerFeedbak;
                $feedback[$key]['fbk_custgroupname'] = $val['customer_group'];
            /*    $feedback[$key]['fbk_contactname'] = $contactName;
                $feedback[$key]['fbk_contactNo'] = $contactNo;
                $feedback[$key]['fbk_contactEmail'] = $customerEmail;*/
                $feedback[$key]['fbk_customerComments'] = $customerComments;
                $feedback[$key]['fbk_itemgroup'] = $val['itemgroup'];
                $feedback[$key]['fbk_collector'] = $val['collector'];
                $feedback[$key]['fbk_customercomments'] = $val['contact_mailid']; 
                $feedback[$key]['fbk_reason_quality'] = $val['reason_quality'];
                $feedback[$key]['fbk_reason_price_diff'] = $val['reason_price_diff'];
                $feedback[$key]['fbk_reason_service'] = $val['reason_service'];
                $feedback[$key]['fbk_reason_notcont_by_exe'] = $val['reason_notcont_by_exe'];
                $feedback[$key]['fbk_reason_norequirement'] = $val['reason_norequirement'];
                $feedback[$key]['fbk_others'] = $val['others'];
                $feedback[$key]['fbk_ipaddress'] = $ip_address;
                $feedback[$key]['fbk_created_date'] = $date;


      /*  $sql = "INSERT INTO unbilled_customers_feedback (fbk_customerfeedbak,fbk_custgroupname,fbk_contactname,fbk_contactNo,fbk_contactEmail,fbk_customercomments,fbk_itemgroup,fbk_collector,
                          fbk_reason_leakage,fbk_reason_price_diff,fbk_reason_service,fbk_others,fbk_ipaddress,fbk_created_date ) 
                  VALUES($customerFeedbak,
                         '".$val[customer_group]."',
                         '".$contactName."',
                         '".$contactNo."',
                         '".$customerEmail."',
                         '".$customerComments."',
                         '".$val[itemgroup]."',
                         '".$val[collector]."',
                         '".$val[reason_leakage]."',
                         '".$val[reason_price_diff]."',
                         '".$val[reason_service]."',
                         '".$val[others]."',
                         '".$ip_address."',
                         '".$date."'
                    )"; */

  $sql = "INSERT INTO unbilled_customers_feedback (fbk_customerfeedbak,fbk_custgroupname,fbk_customercomments,fbk_itemgroup,fbk_collector,
                          fbk_reason_quality,fbk_reason_price_diff,fbk_reason_service,fbk_reason_notcont_by_exe,fbk_reason_norequirement,fbk_others,fbk_ipaddress,fbk_created_date ) 
                  VALUES($customerFeedbak,
                         '".$val[customer_group]."',
                         '".$customerComments."',
                         '".$val[itemgroup]."',
                         '".$val[collector]."',
                         '".$val[reason_quality]."',
                         '".$val[reason_price_diff]."',
                         '".$val[reason_service]."',
                          '".$val[reason_notcont_by_exe]."',
                         '".$val[reason_norequirement]."',
                         '".$val[others]."',
                         '".$ip_address."',
                         '".$date."'
                    )"; 
            


            //echo  $sql; die;
            $result = pg_query($conn, $sql);
             
             }
             
     
      
     
      
    

             
          /*$sql = "INSERT INTO unbilled_customers_feedback (
                    fbk_customerfeedbak,
                    fbk_custgroupname,
                    fbk_contactname,
                    fbk_itemgroup,
                    fbk_collector,
                    fbk_customercomments,
                    fbk_reason_leakage,
                    fbk_reason_price_diff,
                    fbk_reason_service,
                    fbk_others,
                    fbk_ipaddress,
                   fbk_created_date 
                      ) 
              values (
                   $customerFeedbak,$customer_group,$contactName,$customer_comments,$itemgroup,
                  $collector,$contactNo,$customerEmail,$reason_leakage,$reason_price_diff,$reason_service,$others,$ip_address,$date)"; 
  echo"sql query outp ut".$sql; die;
    $result = pg_query($conn, $sql);*/
    if (!$result) 
    {
        $message ="There was an error encountered ";
    }
    else
    {
      $message="Data Received. Thank you for your valuable feedback";  
    }

}
else
{
  $message="Please submit your data";
}


?>
<html>
    <head>
        <title>Pon Pure Chem (P) Ltd.</title>
        <meta name="apple-mobile-web-app-capable" content="yes" />        
    <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/_all.css">
        <script type="text/javascript" src="js/jquery-1.10.0.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.icheck.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    </head>
    <body>
        
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div>
                            <img src="images/logo.png" alt="Pon Pure Chem (P) Ltd.">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <div id="content">
            <div class="container containerContent">
                <div class="row">
                    <div class="span12">
                        <h1 class="brand">Pon Pure Chem (P) Ltd.</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="span12">
                      <?php if (isset($_POST['submit'])) { ?>
                        <div class="alert alert-success" style="margin-bottom: 0; text-align:center;">
                      <?php }else { ?>
                        <div class="alert alert-important" style="margin-bottom: 0; text-align:center;">
                      <?php } ?>    
                             <?php echo $message; ?>
                        </div>
                    </div>
                </div> <!-- End of row -->
                </div> <!-- End of content -->
            </div><!-- Container -->
            <div id="footer">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div  style="text-align: center;width: 100%;">
                                <span>Copyright &COPY; 2013 All Rights Reserved</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
