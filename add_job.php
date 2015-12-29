<?php
include("include/database.php");
include("session.php");
$id=$_REQUEST['sub_po_id'];

	if(isset($_REQUEST['c_add']))
	{
 	 $pi=$_POST['pi_no'];
	 $ack=$_POST['ack'];
	 $etd=$_POST['etd'];
	 $et_old=$_POST['etd_old'];
	 $eta=$_POST['eta'];
	 $shl=$_POST['sh_line'];	
     $ocn=$_POST['fright'];	 
	 $inv=$_POST['inv'];
	 $bl=$_POST['bl_no'];
	 $dhl=$_POST['dan'];
	 $payd=$_POST['pdd'];
     $payr=$_POST['prd'];
	 $month=$_POST['sm'];
	 $vessel=$_POST['vn'];
	 $pamt=$_POST['amt'];
	 $cn_job=$_POST['cancel_job'];
	 
	  $query="update sub_po set `pi_no`='".$pi."',`job`='".$cn_job."', `ack`='".$ack."', `etd`='".$etd."',`etd_old`='".$et_old."', `eta`='".$eta."', `ship_line`='".$shl."',`ocean_frght`='".$ocn."',`invoice`='".$inv."', `bl_no`='".$bl."', `dhl_awb_no`='".$dhl."',`payment_due`='".$payd."', `payment_recieve`='".$payr."',`pay_amt`='".$pamt."', `ship_month`='".$month."', `vessel_nm`='".$vessel."' where sub_po_id='$id'";
	
	 $res=mysql_query($query);

	 if($res)
	 {
	 header("location:view_job.php");
	 }
	 else
	 {
	 header("location:add_job.php");
	 }
	 }
	
	 
$UPDT="SELECT * FROM sub_po where sub_po_id='$id'";
	$exe=mysql_query($UPDT);
	$numrow=mysql_fetch_array($exe);	 
?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

<script type="text/javascript" > 
$(document).ready(function()
{
    /*
    * binding onChange event here
    * you can replace .change with .blur
    */
    $('#etd').change(UpdateInfo);
    $('#eta').change(UpdateInfo);
	$('#prd').change(asignformula);
	

});
function asignformula()
{
var num=<?php echo $numrow['tot_val'];?>;
var qnt=<?php echo $numrow['qnt'];?>;
var unit_price=<?php echo $numrow['unt_pr'];?>;
var credit_note=<?php echo $numrow['c_note'];?>;
if(credit_note!=0)
{
var new_amt=(unit_price-credit_note)*qnt;
$('#amt').val(new_amt);
}
else
{
$('#amt').val(num);
}
}
function UpdateInfo()
{
     var etd = $('#etd').val();
	 var eta = $('#eta').val();
     var terms = $('#terms').val();
	
	 if(terms == 'DP AT Sight')
	 {

     $('#pdd').val(eta);
	 }
	 else if(terms == 'TT 100% ADVANCE' || terms == 'AGAINST DOCUMENT')
	  {
     $('#pdd').val(etd);
	 }
	 else
	 {	
	  var num = parseInt($('#terms').val().match(/\d+/)[0], 10);
	 var dmy = etd.split("/");
var joindate = new Date(parseInt(dmy[2], 10),parseInt(dmy[1], 10) - 1,parseInt(dmy[0], 10));
joindate.setDate(joindate.getDate() + num);
     $('#pdd').val(("0" + joindate.getDate()).slice(-2) + "/" +("0" + (joindate.getMonth() + 1)).slice(-2) + "/" + joindate.getFullYear());
	 }
   }
  
</script>
</head>

<body>
<div id="container">
<div id="sub-header">	
   <?php
	include("header.php");
	
	?> 
	<br/>
		<div class="quotation"><center>Add Job</center></div>
         <div>
        <form name="form1" action="" method="post">
        <table class="q_clients">
		      <tr><td class="l_form">Cancel Job:</td><td><input type="checkbox" value="1" name="cancel_job" id="cancel_job" <?php if($numrow['job']==1) echo 'checked="checked"';?> ></td></tr>
              <tr><td class="l_form">PI NO:</td><td><input id="pi_no " class="q_in" type="text" name="pi_no" value="<?php echo $numrow['pi_no'];?>" tabindex="1" /></td></tr>
             <tr><td class="l_form">ACK COPY RECEIVED:</td><td><input id="ack" class="q_in" type="text" name="ack" value="<?php echo $numrow['ack'];?>" tabindex="2" /></td></tr>
			 
			 <tr><td class="l_form">Actual Departure Date:</td><td> <input type="text" id="etd" class="q_in" name="etd" value="<?php echo $numrow['etd'];?>"  tabindex="3"   /></td></tr>
			 <input type="hidden" value="<?php echo $numrow['pay_term'];?>" name="terms" id="terms" />
			 <tr><td class="l_form">ETD:</td><td> <input type="text" id="etd_old" class="q_in" name="etd_old" value="<?php echo $numrow['etd_old'];?>"  tabindex="4"   /></td></tr>
             <tr><td class="l_form">ETA:</td><td><input type="text" id="eta" class="q_in" name="eta"value="<?php echo $numrow['eta'];?>"tabindex="5"   /></td></tr>
		     <tr><td class="l_form">SHIPPING LINE:</td><td><input id="sh_line" class="q_in" type="text" name="sh_line"value="<?php echo $numrow['ship_line'];?>"tabindex="6" /></td></tr>
			 <tr><td class="l_form">OCEAN FREIGHT:</td><td><input id="fright" class="q_in" value="<?php echo $numrow['ocean_frght'];?>" type="text" name="fright"tabindex="7" /></td></tr>
				<tr><td class="l_form">INVOICE NO</td><td><input id="inv" class="q_in" value="<?php echo $numrow['invoice'];?>" type="text" name="inv"tabindex="8" /></td></tr>
			      </table>
                
                <table class="q_clients2">
		        <tr><td class="l_form">BL NO:</td><td><input id=" bl_no" class="q_in" value="<?php echo $numrow['bl_no'];?>" type="text" name="bl_no"tabindex="9" /></td></tr>
              				
                <tr><td class="l_form">DHL AWB NO:</td><td><input id="dan" class="q_in" value="<?php echo $numrow['dhl_awb_no'];?>" type="text" name="dan"tabindex="10" /></td></tr>
				
				<!--Code for calculate Due date from payment terms -->
				 
	 <tr><td class="l_form">PMT DUE DT:</td><td><input id="pdd" class="q_in" value="<?php echo $numrow['payment_due'];?>" type="text" name="pdd"tabindex="11" /></td></tr>
	<tr><td class="l_form">PMT RCV DT:</td><td><input id="prd" class="q_in" value="<?php echo $numrow['payment_recieve'];?>" type="text" name="prd"tabindex="12" /></td></tr>
	<tr><td class="l_form">PMT RCV AMT:</td><td><input id="amt" class="q_in" value="<?php echo $numrow['pay_amt'];?>" type="text" name="amt"tabindex="13" /></td></tr>
              <tr><td class="l_form">Shipment Month</td><td> 
			  <select name="sm" id="sm" tabindex="14">
			  
			  <option value="0">Month</option>
	<option value="JANUARY" <?php IF($numrow['ship_month']=='JANUARY') echo 'selected=selected' ;?> >JANUARY</option>
	<option value="FEBRUARY"<?php if($numrow['ship_month']=='FEBRUARY')echo 'selected=selected';?> >FEBRUARY</option>
	<option value="MARCH"<?php if($numrow['ship_month']=='MARCH') echo 'selected=selected' ;?>>MARCH</option>
	<option value="APRIL"<?php if($numrow['ship_month']=='APRIL') echo 'selected=selected' ;?>>APRIL</option>
	<option value="MAY"<?php if($numrow['ship_month']=='MAY') echo 'selected=selected';?>>MAY</option>
	<option value="JUNE"<?php if($numrow['ship_month']=='JUNE') echo 'selected=selected';?>>JUNE</option>
	<option value="JULY"<?php if($numrow['ship_month']=='JULY') echo 'selected=selected';?>>JULY</option>
	<option value="AUGUST"<?php if($numrow['ship_month']=='AUGUST') echo 'selected=selected';?>>AUGUST</option>
	<option value="SEPTEMBER"<?php if($numrow['ship_month']=='SEPTEMBER') echo 'selected=selected';?>>SEPTEMBER</option>
	<option value="OCTOMBER"<?php if($numrow['ship_month']=='OCTOMBER') echo 'selected=selected';?>>OCTOMBER</option>
	<option value="NOVEMBER" <?php if($numrow['ship_month']=='NOVEMBER') echo 'selected=selected';?>>NOVEMBER</option>
	<option value="DECEMBER"<?php if($numrow['ship_month']=='DECEMBER') echo 'selected=selected';?>>DECEMBER</option>
	</select>
			  </td></tr>
              <tr><td class="l_form">Vessel Name</td><td><input id="vn" class="q_in" value="<?php echo $numrow['vessel_nm'];?>" type="text" name="vn"tabindex="15" /></td></tr>
                </table>
        <div class="addclients_b">
         <input name="c_add" id="submitButtonOne" class="formbutton" value="Add/Update" type="submit"  tabindex="16" />
     	<a href="view_job.php"><input name="can" class="formbutton" value="Cancel" type="button" tabindex="17" /></a>
        </div>
        
        </form>
    </div>
    </div>
        
    
    	<div class="clear"></div>
     </div>
    </div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
