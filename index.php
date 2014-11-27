<!DOCTYPE html>

<html>
    <head>
        <title>Pon Pure Group of Companies</title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/_all.css">
     

        <script type="text/javascript" src="js/jquery-1.10.0.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.icheck.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>


               <!--[if lt IE 9]>
            <script src="js/html5.js"></script>
        <![endif]-->
    </head>

<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.  
   $custid =$_GET['custid'];
    //$transactionId ="1231213";
     $duplicate =0;



        if ($custid!="")
        {
            include_once("db/config.php");
           // $conn = pg_connect("host=localhost port=5432 dbname=puredata user=postgres password=postgres123");
            if (!$conn)
            {
                die ("Not able to connect to PostGres --> " . pg_last_error($conn));
            }
            else
            {
               // $sql= "SELECT transaction_id FROM feedback WHERE custid =".$custid;
                 $sql= "SELECT * FROM unbilled_customer_alert WHERE customer_group='".$custid."'";
               //  echo $sql; die;
             //   $result = pg_query($conn, $sql);
               //echo $rows = pg_num_rows($result);


                $result = pg_query($conn, $sql);
                $rows = pg_num_rows($result);
                //$customerdetails = pg_fetch_array($result, 0, PGSQL_NUM);

                     $jTableResult = array();
                    $data = array();
                      $i=0;
                while ($row = pg_fetch_array($result)) 
                    { 
                    $jTableResult["customer_group"] = $row["customer_group"];
                    $jTableResult["itemgroup"] = $row["itemgroup"];
                    $jTableResult["collector"] = $row["collector"];
                    $jTableResult["reason_leakage"] = ""; 
                    $jTableResult["reason_price_diff"] = ""; 
                    $jTableResult["reason_service"] = ""; 
                    $jTableResult["others"] = ""; 
                    
                    
                     $data[$i] = $jTableResult;
                    $i++;
                    } 

                //print_r($customerdetails); die;
               
             $arr = "{\"cust_contact_data\":" .json_encode($data)."}";
            //return $arr;

                if ($rows>0)
                {
                    $duplicate =0;
                }
                else
                {
                 $duplicate =0;   
                }
                $cust_contact_data=$arr;
                //print_r($cust_contact_data);
            }
        }
?>
<style type="text/css">
.radioButtonLeftalign label
{
  float: left;
  padding: 10px 10px;
  width: 101px;
  margin-left: 18px;

}
.radioButtonLeftalign
{

 padding:10px 0px 10px 0px;
}


</style>

    <body>
        
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div>
                            <img src="images/logo.png" alt="Pon Pure Group of Companies.">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        <div id="content">
            <div class="container containerContent">
                    <div class="row">
                        <div class="span12">
                            <h1 class="brand">Customer Feeback Form - Pon Pure Group of Companies.</h1>
                        </div>
                    </div>
                 <?php if ($custid!=""){ ?>
                   <!-- duplicate code start -->
                 <?php if ($duplicate ==1){ ?>
                    <div class="row">
                        <div class="span12">
                            <div class="alert alert-success" style="margin-bottom: 0; text-align:center;">                                                    
                                It appears that, we have already received feedback for the Transaction Id <strong><?php echo $custid; ?></strong>
                            </div>
                        </div>
                    </div> <!-- End of row -->
                </div> <!-- End of content -->
            
                <!-- duplicate code end -->
            <?php } else { ?> 
                <div class="row">
                    <div class="span12">
                        <form action="feedbackaction.php" method="post"  autocomplete="off" name="FeedbackForm" id="FeedbackForm">
                              <div class="alert alert-success" style="margin-bottom: 0; text-align:center;">                                                    
                                <!--      Customer Group Name: <strong><?php echo $custid; ?></strong> -->
                              </div>
                               <ul>
                                 <li id="feedBackInitalQuery">
                                    <fieldset>
                                        <div class="push"></div>
                                        <h4 class="feedbackQuestion"></h4>
                                    </fieldset>
                                </li>
                                <li>
                                    <fieldset>
                                    <div id="title310" class="feedbackQuestion">
                                         Dear Prestigious Customer,<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; As a Member of Pure Chemicals Group, I want to thank you for giving us the opportunity to serve you. 
                                         Please help us by taking a couple of minutes to tell us about the Products & Services that you have received so far. 
                                         We appreciate your business and want to make sure we meet your expectations.
                                         <br>
                                          <br>The information shared by you shall be treated as Highly Confidential and shall be used only for our Continuous Improvement Initiatives.
                                          <br>
                                          <br>Hence you are requested to give your honest feedback on the below attributes.... 

                                                    

                                    </div>
                                             </fieldset>
                                </li>
                            </ul>
                                
                              <ul>
                               <li id="feedBackInitalQuery">
                                    <fieldset class="radioButtonLeftalign">
                                        <div class="push"></div>
                                        <h4 class="feedbackQuestion" >  1. As a Buyer, we are treated as a Valuable Customer by Pure Chemicals Group Companies.</h4>
                                            <label class="radio " style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak1" id="isCustomerSatisfied1" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion1" name="feedbackQuestion1" value="1">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                                    
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak1" id="isCustomerSatisfied2" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak1" id="isCustomerSatisfied3" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak1" id="isCustomerSatisfied4" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset>
                                    <fieldset class="radioButtonLeftalign">
                                       <h4 class="feedbackQuestion">  2. Pure Chemicals Group has Wide Range of Chemical Products.</h4>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak2" id="isCustomerSatisfied1" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion2" name="feedbackQuestion2" value="2">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                              
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak2" id="isCustomerSatisfied2" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak2" id="isCustomerSatisfied3" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                       
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak2" id="isCustomerSatisfied4" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset>
                                    <fieldset class="radioButtonLeftalign">
                                      
                                        <h4 class="feedbackQuestion">  3. Pure Chemicals Group Always Supplies Good Quality of Chemical Products.</h4>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak3" id="isCustomerSatisfied1" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion3" name="feedbackQuestion3" value="3">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak3" id="isCustomerSatisfied2" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak3" id="isCustomerSatisfied3" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak3" id="isCustomerSatisfied4" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset> <fieldset class="radioButtonLeftalign">
                                        
                                        <h4 class="feedbackQuestion"> 4. Pure Chemicals Group Always Supplies Chemicals as per our Specifications Required.</h4>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak4" id="isCustomerSatisfied1" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion4" name="feedbackQuestion4" value="4">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak4" id="isCustomerSatisfied2" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak4" id="isCustomerSatisfied3" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak4" id="isCustomerSatisfied4" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset> <fieldset class="radioButtonLeftalign">
                                        
                                        <h4 class="feedbackQuestion">  5. Pure Chemicals Group Deliver the Products well within the Time committed by the Sales Personnel.</h4>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak5" id="customerFeedbak5" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion5" name="feedbackQuestion5" value="5">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak5" id="isCustomerSatisfied2" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak5" id="isCustomerSatisfied3" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak5" id="isCustomerSatisfied4" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset> <fieldset class="radioButtonLeftalign">
                                        
                                        <h4 class="feedbackQuestion">  6. Pure Chemicals Group Delivers the Products with Error Free Invoices, DC & other related Statutory Documents.</h4>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak6" id="isCustomerSatisfied1" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion6" name="feedbackQuestion6" value="6">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak6" id="isCustomerSatisfied2" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak6" id="isCustomerSatisfied3" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak6" id="isCustomerSatisfied4" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset>
                                  
                                  <fieldset class="radioButtonLeftalign">
                                        
                                        <h4 class="feedbackQuestion"> 7. Pure Chemicals Group Provides us the Competent Price in the Market.</h4>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak7" id="isCustomerSatisfied1" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion7" name="feedbackQuestion7" value="7">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak7" id="isCustomerSatisfied2" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak7" id="isCustomerSatisfied3" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak7" id="isCustomerSatisfied4" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset> <fieldset class="radioButtonLeftalign">
                                        
                                        <h4 class="feedbackQuestion"> 8. Pure Chemicals Group's Sales Personnel's Behaviour towards us is Very Good.</h4>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak8" id="customerFeedbak8" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion8" name="feedbackQuestion8" value="8">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak8" id="customerFeedbak8" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak8" id="customerFeedbak8" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak8" id="customerFeedbak8" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset> 
                                    <fieldset class="radioButtonLeftalign">
                                        
                                        <h4 class="feedbackQuestion">9. Pure Chemicals Group's Sales Personnel are Well Trained on their Products to provide appropriate Services on the same.</h4>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak9" id="customerFeedbak9" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion9" name="feedbackQuestion9" value="9">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak9" id="customerFeedbak9" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak9" id="customerFeedbak9" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak9" id="customerFeedbak9" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset>
                                                                        
                                    
                                     <fieldset class="radioButtonLeftalign">
                                        
                                        <h4 class="feedbackQuestion">10. We are Highly Satisfied with the Overall Services given by Pure Chemicals Group.</h4>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak10" id="customerFeedbak10" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion10" name="feedbackQuestion10" value="10">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak10" id="customerFeedbak10" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak10" id="customerFeedbak10" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak10" id="customerFeedbak10" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset>
                                                                        <fieldset class="radioButtonLeftalign">
                                        
                                        <h4 class="feedbackQuestion">11. We will recomend the Product's & Service's of Pure Chemicals Group to Others Known to me.</h4>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak11" id="customerFeedbak11" value="Strongly Agree">
                                            <input type="hidden" id="feedbackQuestion11" name="feedbackQuestion11" value="11">
                                            <span class="radioLabel">Strongly Agree<i class="icon-ok"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak11" id="customerFeedbak11" value="Agree">
                                            <span class="radioLabel customerFeedbak">Agree<i class="icon-ok"></i></span>
                                        </label>   
                                         <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak11" id="customerFeedbak11" value="Disagree">
                                            <span class="radioLabel">Disagree<i class="icon-remove"></i></span>
                                        </label>
                                        
                                        <label class="radio" style="padding-left:30px;">
                                            <input class="customerFeedbak required" type="radio" name="customerFeedbak11" id="customerFeedbak11" value="Strongly Disagree">
                                            <span class="radioLabel customerFeedbak">Strongly Disagree<i class="icon-remove"></i></span>
                                        </label>                                    
                                    </fieldset>
                                  <fieldset>
                                        
                                        <h4 class="feedbackQuestion">12. Any other improvment area you would like us to focus, please mention it below.... </h4>
                                        <input type="hidden" id="feedbackQuestion12" name="feedbackQuestion12" value="12">
                                        <textarea rows="6" class="span10" name="customerComments" id="customerComments"></textarea>
                                    </fieldset>
                                </li>
                            </ul>
                             
                            
                             <p style="padding-left: 325px;"><input type="submit" class="btn btn-primary"  id="saverecord" name="saverecord" value="Submit Feedback"><p>
                             <input type="hidden"  id="hdncustid" name="hdncustid" value="<?=$custid;?>">
                        </form> 
                         <div class="alert alert-success" style="margin-bottom: 0; text-align:center; height:94px;">
                              <p class="thanks" style="float:left; padding-top:30px;">Thanks & Regards </p>
                             <br>
                             <p class="sal" style="float:left; padding-top:30px;">P. Thillai Natarajan, Head – Human Resources, Pure Chemicals Group, <a href="mailto:thillai@pure-chemical.com">thillai@pure-chemical.com</a></p>
                        </div>
                     </div>
                </div>
               <?php }?>   
        
           <?php } else { ?>
                    <div class="row">
                        <div class="span12">
                                <div class="alert alert-important" style="margin-bottom: 0; text-align:center;">                                                    
                                    We need Customer Id to proceed further!  
                                </div>
                            </div>
                    </div>

           <?php } ?>    
             
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
    <script>
     $(document).ready(function()
     {
      
 
     $("#saverecord").click(function ()   {
 
      var feedbackQuestion1 = $('#feedbackQuestion1').val();

      var customerFeedbak1=$("input[name='customerFeedbak1']:checked").val()
      var customerFeedbak2=$("input[name='customerFeedbak2']:checked").val()
      var customerFeedbak3=$("input[name='customerFeedbak3']:checked").val()
      var customerFeedbak4=$("input[name='customerFeedbak4']:checked").val()
      var customerFeedbak5=$("input[name='customerFeedbak5']:checked").val()
      var customerFeedbak6=$("input[name='customerFeedbak6']:checked").val()
      var customerFeedbak7=$("input[name='customerFeedbak7']:checked").val()
      var customerFeedbak8=$("input[name='customerFeedbak8']:checked").val()
      var customerFeedbak9=$("input[name='customerFeedbak9']:checked").val()
      var customerFeedbak10=$("input[name='customerFeedbak10']:checked").val()
      var customerFeedbak11=$("input[name='customerFeedbak11']:checked").val()
     // var customerFeedbak12=$("input[name='customerFeedbak12']").val()

      
      

      
            if( (customerFeedbak1==undefined) || (customerFeedbak2==undefined) || (customerFeedbak3==undefined)|| (customerFeedbak4==undefined)|| (customerFeedbak5==undefined)|| (customerFeedbak6==undefined)|| (customerFeedbak7==undefined)|| (customerFeedbak8==undefined)|| (customerFeedbak9==undefined)|| (customerFeedbak10==undefined)|| (customerFeedbak11==undefined) )
            {
            
              alert("Please select any one of the option for each question");
              return false;
            }
          else
          {
            
             $("#FeedbackForm").submit();
          }
            
        });
     
    });
</script>
</html>