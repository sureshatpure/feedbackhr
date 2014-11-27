<!DOCTYPE html>
<?php

//echo"<pre>";print_r($_POST);echo"</pre>"; 


if(isset( $_POST['saverecord']))
{
      $feedbackQuestion1=$_POST["feedbackQuestion1"]; 
      $customerFeedbak1=$_POST["customerFeedbak1"];
      $feedbackQuestion2=$_POST["feedbackQuestion2"];
      $customerFeedbak2=$_POST["customerFeedbak2"];
      $feedbackQuestion3=$_POST["feedbackQuestion3"];
      $customerFeedbak3=$_POST["customerFeedbak3"];
      $feedbackQuestion4=$_POST["feedbackQuestion4"];
      $customerFeedbak4=$_POST["customerFeedbak4"];
      $feedbackQuestion5=$_POST["feedbackQuestion5"];
      $customerFeedbak5=$_POST["customerFeedbak5"];
      $feedbackQuestion6=$_POST["feedbackQuestion6"];
      $customerFeedbak6=$_POST["customerFeedbak6"];
      $feedbackQuestion7=$_POST["feedbackQuestion7"];
      $customerFeedbak7=$_POST["customerFeedbak7"];
      $feedbackQuestion8=$_POST["feedbackQuestion8"];
      $customerFeedbak8=$_POST["customerFeedbak8"];
      $feedbackQuestion9=$_POST["feedbackQuestion9"];
      $customerFeedbak9=$_POST["customerFeedbak9"];
      $feedbackQuestion10=$_POST["feedbackQuestion10"];
      $customerFeedbak10=$_POST["customerFeedbak10"];
      $feedbackQuestion11=$_POST["feedbackQuestion11"];
      $customerFeedbak11=$_POST["customerFeedbak11"];
     
      
      $feedbackQuestion12=$_POST["feedbackQuestion12"];
      $customerComments=$_POST["customerComments"];
      $_POST["saverecord"];
      $custid=$_POST["hdncustid"];

    $ip_address =$_SERVER['REMOTE_ADDR'];
    $date = date('Y-m-d:H:i:s'); 
    $custid      = $_POST['hdncustid'];
    $customerComments       = str_replace("'"," ", $_POST['customerComments']);

   include_once("db/config.php");
   // $conn = pg_connect("host=localhost port=5432 dbname=puredata user=postgres password=postgres123");
        if (!$conn)
        {
          die ("Not able to connect to PostGres --> " . pg_last_error($conn));
        }
        else
        {
          //echo "Connected sucessfully";

          $sql = "INSERT INTO customer_yearly_feedback (cust_yf_customerid,cust_yf_qn_1_id,cust_yf_feedback_reason_1,cust_yf_qn_2_id,cust_yf_feedback_reason_2,cust_yf_qn_3_id,cust_yf_feedback_reason_3,cust_yf_qn_4_id,cust_yf_feedback_reason_4,cust_yf_qn_5_id,cust_yf_feedback_reason_5,cust_yf_qn_6_id,cust_yf_feedback_reason_6,cust_yf_qn_7_id,cust_yf_feedback_reason_7,cust_yf_qn_8_id,cust_yf_feedback_reason_8,cust_yf_qn_9_id,cust_yf_feedback_reason_9,cust_yf_qn_10_id,cust_yf_feedback_reason_10,cust_yf_qn_11_id,cust_yf_feedback_reason_11,cust_yf_qn_12_id,cust_yf_customercomments,cust_yf_ipaddress,cust_yf_created_date) 
                  VALUES($custid,
                           $feedbackQuestion1,
                        '".$customerFeedbak1."',
                           $feedbackQuestion2,
                        '".$customerFeedbak2."',
                          $feedbackQuestion3,
                        '".$customerFeedbak3."',
                          $feedbackQuestion4,
                        '".$customerFeedbak4."',
                           $feedbackQuestion5,
                        '".$customerFeedbak5."',
                           $feedbackQuestion6,
                        '".$customerFeedbak6."',
                           $feedbackQuestion7,
                        '".$customerFeedbak7."',
                           $feedbackQuestion8,
                        '".$customerFeedbak8."',
                           $feedbackQuestion9,
                        '".$customerFeedbak9."',
                           $feedbackQuestion10,
                        '".$customerFeedbak10."',
                           $feedbackQuestion11,
                        '".$customerFeedbak11."',
                           $feedbackQuestion12,
                        '".$customerComments."',
                         '".$ip_address."',
                         '".$date."' )"; 
        //echo  $sql; die;
         $result = pg_query($conn, $sql);

        } 
        

    if (!$result) 
    {
        $message ="There was an error encountered ";
    }
    else
    {
      $message="Data Received. Thanks for spending your precious time in taking this survey for our Company's Continous Improvement Initiative Initiative to <strong> SERVE YOU BETTER</strong>";  
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
                        <div class="alert alert-important" style="margin-bottom: 0; text-align:center; height:94px;">
                      <?php } ?>    
                             <?php echo $message; ?>
                             <p class="thanks" style="float:left; padding-top:30px;">Thanks & Regards </p>
                             <br>
                             <p class="sal" style="float:left; padding-top:30px;">P. Thillai Natarajan, Head – Human Resources, Pure Chemicals Group, <a href="mailto:thillai@pure-chemical.com">thillai@pure-chemical.com</a></p>
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